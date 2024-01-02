<?php

namespace App\Controllers;

use App\Models\HargaModel;
use App\Models\MotorModel;
use App\Models\TransaksiModel;
use App\Libraries\Pdfgenerator;
use App\Controllers\BaseController;
use App\Libraries\MY_TCPDF as TCPDF;

class Transaksicontroller extends BaseController
{
    protected $transaksiModel;
    protected $motorModel;
    protected $hargaModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
        $this->motorModel = new MotorModel();
        $this->hargaModel = new HargaModel();
    }
    public function transaksi()
    {
        if ($keyword = $this->request->getVar('keyword')) {
            $transaksi = $this->transaksiModel->search($keyword)->findAll();
            if ($transaksi) {
                $transaksi = $this->transaksiModel->search($keyword)->findAll();
            } else {
                $transaksi = $this->transaksiModel->AllData();
            }
        } else {
            $transaksi = $this->transaksiModel->AllData();
        }

        // dd($transaksi);

        $data = [
            'title' => 'Data Transaksi',
            'transaksi' => $transaksi
        ];

        return view('customers/transaksi', $data);
    }

    public function input()
    {
        $status = 'Tersedia';
        $motor = $this->transaksiModel->AllMotors($status);
        $pelanggan = $this->transaksiModel->AllPelanggan();
        dd($motor);
        $data = [
            'title' => 'Input Transaksi',
            'motor' => $motor,
            'pelanggan' => $pelanggan
        ];

        return view('customers/inputTransaksi', $data);
    }

    public function transaksiSave()
    {
        $this->transaksiModel->save([
            'id_motor' => $this->request->getVar('id_motor'),
            'id_pelanggan' => $this->request->getVar('id_pelanggan'),
            'tgl_pinjam' => $this->request->getVar('tgl_pinjam'),
            'tgl_kembali' => $this->request->getVar('tgl_kembali'),
            'id_user' => $this->request->getVar('id_user'),
            'waktu_pinjam' => $this->request->getVar('waktu_pinjam'),
            'waktu_kembali' => $this->request->getVar('waktu_kembali'),
            'lama' => $this->request->getVar('lama'),
            'status' => $this->request->getVar('status')
        ]);

        $id = $this->transaksiModel->insertId();
        $im = $this->request->getVar('id_motor');
        $lama = $this->request->getVar('lama');
        $ip = $this->request->getVar('id_pelanggan');

        session()->setFlashdata([
            'im' => $im,
            'lama' => $lama,
            'ip' => $ip,
            'id' => $id
        ]);

        return redirect()->to('/petugas/total-biaya');
    }

    public function totalBiaya()
    {
        $im = session()->getFlashdata('im');
        $lama = session()->getFlashdata('lama');
        $ip = session()->getFlashdata('ip');
        $id = session()->getFlashdata('id');

        $motor = $this->motorModel->cariIm($im)->first();

        // dd($id);
        $biayaAwal = $motor['biaya'];
        $duration = $lama / 24;
        $biaya = $biayaAwal * $duration;

        if ($motor['status'] == 'Tersedia') {
            $this->hargaModel->insert([
                'id_motor' => $im,
                'id_pelanggan' => $ip,
                'id_transaksi' => $id,
                'waktu' => $lama,
                'biaya' => $biaya
            ]);
        }

        $this->motorModel->update($im, ['status' => 'Terpinjam']);

        return redirect()->to('/petugas/transaksi');
    }

    public function delete($id)
    {
        $transaksi = $this->transaksiModel->cari($id)->first();

        $im = $transaksi['id_motor'];
        $this->motorModel->update($im, ['status' => 'Tersedia']);
        $this->transaksiModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');

        return redirect()->to('petugas/transaksi');
    }

    public function view_pdf()
    {
        $Pdfgenerator = new Pdfgenerator();
        // title dari pdf
        $data = [
            'title' => 'Invoice Rentmo King'
        ];

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan_penjualan_toko_kita';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $html = view('customers/invoice', $data);

        // run dompdf
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function cetak()
    {

        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('King');
        $pdf->SetTitle('RENTMO KING');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, RENTMOKING');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
        $pdf->SetFont('dejavusans', '', 14, '', true);

        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();

        //view mengarah ke invoice.php
        $html = view('customers/cetak');

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

        // ---------------------------------------------------------
        $this->response->setContentType('application/pdf');
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output('invoice-rentmoking.pdf', 'I');
    }
}
