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
                $motor = $this->motorModel->findAll();
            }
        } else {
            $motor = $this->motorModel->findAll();
        }

        $data = [
            'title' => 'Data Motor',
            'motors' => $motor
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
            'status' => $this->request->getVar('status')
        ]);

        return redirect()->to('/motor/data-motor');
    }

    public function delete($id)
    {
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
