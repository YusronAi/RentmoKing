<?php

namespace App\Controllers;

class CustomersController extends BaseController
{
    public function customers()
    {
        $data = [
        'title' => 'Data Customers'
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
}
