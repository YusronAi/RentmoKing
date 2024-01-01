<?php

namespace App\Controllers;

use App\Models\MotorModel;

class MotorController extends BaseController
{
    protected $motorModel;

    public function __construct()
    {
        $this->motorModel = new MotorModel();
    }

    public function index()
    {
        if ($keyword = $this->request->getVar('keyword')) {
            $motor = $this->motorModel->search($keyword);
            if (!empty($motor)) {
                $motor = $this->motorModel;
            }
        } else {
            $motor = $this->motorModel;
        }

        $data = [
            'title' => 'Data Motor',
            'motors' => $motor->paginate(2),
            'pager' => $this->motorModel->pager
        ];

        return view('motor/data', $data);
    }

    public function inputDataMotor()
    {
        $data = [
            'title' => 'Input Data Motor'
        ];

        return view('motor/input', $data);
    }

    public function save()
    {
        $fileFoto = $this->request->getFile('foto');
        $fileFoto->move('img');

        $namaFoto = $fileFoto->getName();
        $this->motorModel->save([
            'no_polisi' => $this->request->getVar('no_polisi'),
            'merek' => $this->request->getVar('merek'),
            'warna' => $this->request->getVar('warna'),
            'foto' => $namaFoto,
            'no_mesin' => $this->request->getVar('no_mesin'),
            'no_rangka' => $this->request->getVar('no_rangka'),
            'thn_keluar' => $this->request->getVar('thn_keluar'),
            'status' => $this->request->getVar('status'),
            'biaya' => $this->request->getVar('biaya')
        ]);

        return redirect()->to('/motor/data-motor');
    }

    public function ubah($id)
    {
        $motor = $this->motorModel->cariIm($id)->first();
        $data = [
            'title' => 'Update Data Motor',
            'motor' => $motor
        ];

        return view('motor/update', $data);
    }

    public function update($id)
    {
        $fileFoto = $this->request->getFile('foto');

        // Cek gambar apakah gamabar baru atau lama
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('foto2');
        } else {
            
        // Ambil nama gambar
        $namaFoto = $fileFoto->getName();
        // $namaGambar = $fileGambar->getRandomName();

        // Pindah file gambar
        $fileFoto->move('img');

        // Hapus gambar lama
        unlink('img/'. $this->request->getVar('foto2'));
        }

        if ($status = $this->request->getVar('status')) {
            $status = $this->request->getVar('status');
        } else {
            $status = $this->request->getVar('status1');
        }

        $this->motorModel->save([
            'id_motor' => $id,
            'no_polisi' => $this->request->getVar('no_polisi'),
            'merek' => $this->request->getVar('merek'),
            'warna' => $this->request->getVar('warna'),
            'foto' => $namaFoto,
            'no_mesin' => $this->request->getVar('no_mesin'),
            'no_rangka' => $this->request->getVar('no_rangka'),
            'thn_keluar' => $this->request->getVar('thn_keluar'),
            'status' => $status,
            'biaya' => $this->request->getVar('biaya')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/motor/data-motor');
    }

    public function delete($id)
    {
        $motor = $this->motorModel->first($id);
        // Hapus gambar
        unlink('img/' . $motor['foto']);
        $this->motorModel->delete($id);

        return redirect()->to('/motor/data-motor');
    }

    public function hargaSewa()
    {
        $data = [
            'title' => 'Harga Sewa Motor'
        ];

        return view('motor/sewa', $data);
    }
}
