<?php

namespace App\Controllers;

class MotorController extends BaseController
{
    public function index()
    {
        $data = [
        'title' => 'Data Motor'
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

    public function hargaSewa()
    {
        $data = [
        'title' => 'Harga Sewa Motor'
        ];

        return view('motor/sewa', $data);
    }
}
