<?php

namespace App\Controllers;

$session = \Config\Services::session();

use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('User/index', $data);
    }

    public function profil ()
    {
        $data = [
            'title' => 'Profil'
        ];

        return view('user/profil', $data);
    }

    public function users ()
    {
        $data = [
            'title' => 'User'
        ];

        return view('user/user', $data);
    }

    public function data ()
    {
        $data = [
            'title' => 'Data User',
            'users' => $this->userModel->findAll()
        ];

        return view('user/data', $data);
    }

    public function auth ()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        if ($username) {
            $user = $this->userModel->search($username)->first();

            if ($user) {
                if ($password == $user['password']) {
                    $set = session();
                    $set->set('login', $user);
                    return redirect()->to('/');
                } else {
                    session()->setFlashdata('pesan', 'Password Salah!');
                    return redirect()->to('/login');
                }
            } else {
                session()->setFlashdata('pesan', 'Akun tidak ditemukan');
                return redirect()->to('/login');
            }
        }

    }

    public function logout()
    {
        $set = session();

        $set->remove('login');
        $set->destroy();

        return redirect()->to('/login');
    }

    public function registrasi () 
    {
        $data = [
            'title' => 'Registrasi'
        ];

        return view('user/registrasi', $data);
    }

    public function register()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $fileFoto = $this->request->getFile('foto');
        $role = $this->request->getVar('role');

        $fileFoto->move('img');
        $fileName = $fileFoto->getName();
        if (!$this->validate([
            'username' => 'required|is_unique[user.username]'
        ])) {
            session()->setFlashdata('pesan', 'Data sudah ada atau isi kurang komplit');

            return redirect()->to('/registrasi');
        }

        $this->userModel->save([
            'username' => $this->request->getVar('username'),
            'alamat' => $this->request->getVar('alamat'),
            'foto' => $fileName,
            'no_telephone' => $this->request->getVar('no_telephone'),
            'password' => $this->request->getVar('password'),
            'role' => $this->request->getVar('role')
        ]);


        session()->setFlashdata('pesan', 'Register Berhasil');
        return redirect()->to('/data-user');
    }

}
