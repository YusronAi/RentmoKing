<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
        'title' => 'Rentmo King'
        ];

        return view('layouts/frame', $data);
    }
}
