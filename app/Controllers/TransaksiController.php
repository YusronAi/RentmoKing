<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Libraries\Pdfgenerator;
use App\Libraries\MY_TCPDF AS TCPDF;

class Transaksicontroller extends BaseController
{
    protected $transaksiModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
    }
    public function transaksi()
    {
        $transaksi = $this->transaksiModel->AllData();
        $motor = $this->transaksiModel->AllMotor();

        $data = [
            'title' => 'Data Transaksi',
            'transaksi' => $transaksi,
            'motor' => $motor
        ];

        return view('customers/transaksi', $data);
    }

    public function input()
    {
        $motor = $this->transaksiModel->AllMotors();
        $pelanggan = $this->transaksiModel->AllPelanggan();
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

        return redirect()->to('/petugas/transaksi');
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
        $pdf->SetAuthor('Sobatcoding.com');
        $pdf->SetTitle('PDF Sobatcoding.com');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, sobatcoding.com');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

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
        $pdf->Output('invoice-pos-sobatcoding.pdf', 'I');

    }
}
