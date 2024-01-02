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
                $customer = $this->customersModel;
            }
        } else {
            $customer = $this->customersModel;
        }
        $data = [
        'title' => 'Data Customers',
        'customers' => $customer->paginate(3),
        'pager' => $this->customersModel->pager
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

        session()->setFlashdata('pesan', 'Data Berhasil Ditambah');

        return redirect()->to('/petugas/data-customers');
    }

    public function delete($id)
    {
        $customer = $this->customersModel->cari($id)->first();
        // Hapus gambar
        unlink('img/' . $customer['foto']);
        $this->customersModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');

        return redirect()->to('/petugas/data-customers');
    }

    public function ubah ($id) {
        $customer = $this->customersModel->cari($id)->first();
        $data = [
            'title' => 'Ubah Data Customer',
            'customer' => $customer
        ];

        return view('customers/update', $data);
    }

    public function update ($id) {
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

        if ($jk = $this->request->getVar('jenis_kelamin')) {
            $jk = $this->request->getVar('jenis_kelamin');
        } else {
            $jk = $this->request->getVar('jenis_kelamin1');
        }

        $this->customersModel->save([
            'id_pelanggan' => $id,
            'nama' => $this->request->getVar('nama'),
            'foto' => $namaFoto,
            'jenis_kelamin' => $jk,
            'no_identitas' => $this->request->getVar('no_identitas'),
            'universitas' => $this->request->getVar('universitas'),
            'alamat_asal' => $this->request->getVar('alamat_asal'),
            'alamat_sekarang' => $this->request->getVar('alamat_sekarang'),
            'telphone' => $this->request->getVar('telphone')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
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
