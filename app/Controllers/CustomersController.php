<?php

namespace App\Controllers;
use App\Models\CustomersModel;

class CustomersController extends BaseController
{
    protected $customersModel;

    public function __construct()
    {
        $this->customersModel = new CustomersModel();
    }
    public function customers()
    {
        if ($keyword = $this->request->getVar('keyword')) {
            $customer = $this->customersModel->search($keyword);
            if (!empty($customer)) {
                $customer = $this->customersModel->findAll();
            }
        } else {
            $customer = $this->customersModel->findAll();
        }
        $data = [
        'title' => 'Data Customers',
        'customers' => $customer
        ];

        return view('customers/data', $data);
    }

    public function input()
    {
        $data = [
        'title' => 'Input Data Customers'
        ];

        return view('customers/input', $data);
    }

    public function save ()
    {
        $fileFoto = $this->request->getFile('foto');
        $fileFoto->move('img');

        $namaFile = $fileFoto->getName();
        $this->customersModel->save([
            'nama' => $this->request->getVar('nama'),
            'foto' => $namaFile,
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'no_identitas' => $this->request->getVar('no_identitas'),
            'universitas' => $this->request->getVar('universitas'),
            'alamat_asal' => $this->request->getVar('alamat_asal'),
            'alamat_sekarang' => $this->request->getVar('alamat_sekarang'),
            'telphone' => $this->request->getVar('telphone')
        ]);

        return redirect()->to('/petugas/data-customers');
    }

    public function transaksi()
    {
        $data = [
        'title' => 'Transaksi'
        ];

        return view('customers/transaksi', $data);
    }

    public function laporan()
    {
        $data = [
        'title' => 'Laporan'
        ];

        return view('customers/laporan', $data);
    }

    public function test ()
    {
        $data = [
            'request' => $_SERVER['SERVER_NAME'],
            'nama' => 'Yusron'
        ];
        return view('test', $data);
    }
}
