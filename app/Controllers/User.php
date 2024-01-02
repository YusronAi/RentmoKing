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

    public function profil()
    {
        $data = [
            'title' => 'Profil'
        ];

        return view('user/profil', $data);
    }

    public function users()
    {
        $data = [
            'title' => 'User'
        ];

        return view('user/user', $data);
    }

    public function data()
    {
        $users = $this->userModel;
        $data = [
            'title' => 'Data User',
            'users' => $users->paginate(2),
            'pager' => $this->userModel->pager
        ];

        return view('user/data', $data);
    }

    public function auth()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        if ($username) {
            $user = $this->userModel->search($username)->first();

            if ($user) {
                if ($password == $user['password']) {
                    $set = session();
                    $set->set('login', $user);
                    session()->setFlashdata('pesan', 'Berhasil Login');
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

    public function registrasi()
    {
        $data = [
            'title' => 'Registrasi'
        ];

        return view('user/registrasi', $data);
    }

    public function register()
    {
        $fileFoto = $this->request->getFile('foto');

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

    public function delete($id)
    {
        $user = $this->userModel->cari($id)->first();
        // Hapus gambar

        unlink('img/' . $user['foto']);
        $this->userModel->delete($id);

        return redirect()->to('/data-user');
    }

    public function ubah($id)
    {
        $user = $this->userModel->cari($id)->first();
        $data = [
            'title' => 'Ubah Data User',
            'user' => $user
        ];

        return view('user/update', $data);
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
            unlink('img/' . $this->request->getVar('foto2'));
        }

        
        if($roleUser = $this->request->getVar('role')) {
            $roleUser = $this->request->getVar('role');
        } else {
            $roleUser = $this->request->getVar('role2');
        }

        $this->userModel->save([
            'id_user' => $id,
            'username' => $this->request->getVar('username'),
            'alamat' => $this->request->getVar('alamat'),
            'foto' => $namaFoto,
            'no_telephone' => $this->request->getVar('no_telephone'),
            'password' => $this->request->getVar('password'),
            'role' => $roleUser
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/data-user');
    }
}
