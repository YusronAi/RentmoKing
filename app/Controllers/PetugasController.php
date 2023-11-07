<?php

namespace App\Controllers;

class PetugasController extends BaseController
{
    public function petugas()
    {
        $data = [
        'title' => 'Dashboard'
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
}
