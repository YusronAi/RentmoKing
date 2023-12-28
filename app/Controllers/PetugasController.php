<?php

namespace App\Controllers;

use App\Models\CustomersModel;
use App\Models\MotorModel;
use App\Models\TransaksiModel;

class PetugasController extends BaseController
{
    protected $motorModel;
    protected $customerModel;
    protected $transaksiModel;

    public function __construct()
    {
        $this->motorModel = new MotorModel();
        $this->customerModel = new CustomersModel();
        $this->transaksiModel = new TransaksiModel();
    }
    public function petugas()
    {
        $jumlahModel = $this->motorModel->jumlah();
        $jumlahCustomer = $this->customerModel->jumlah();
        $jumlahTransaksi = $this->transaksiModel->jumlah();
        $data = [
        'title' => 'Dashboard',
        'jumlahMotor' => $jumlahModel,
        'jumlahCustomer' => $jumlahCustomer,
        'jumlahTransaksi' => $jumlahTransaksi,
        ];

        return view('petugas/dashboard', $data);
    }

    public function motor()
    {
        $data = [
        'title' => 'Motor Bike'
        ];

        return view('motor/motor', $data);
    }

    public function customers()
    {
        $data = [
        'title' => 'Customers'
        ];

        return view('customers/index', $data);
    }

    public function peraturan()
    {
        $data = [
        'title' => 'Peraturan'
        ];

        return view('petugas/peraturan', $data);
    }

    public function peminjaman()
    {
        $data = [
        'title' => 'Data Peminjaman'
        ];

        return view('petugas/peminjaman', $data);
    }
}
