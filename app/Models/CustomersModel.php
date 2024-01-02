<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomersModel extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    protected $allowedFields = ['nama', 'foto', 'jenis_kelamin', 'no_identitas', 'universitas', 'alamat_asal', 'alamat_sekarang', 'telphone'];

    public function search ($value) 
    {
        return $this->table('pelanggan')->like('nama', $value)->orlike('no_identitas', $value);
    }

    public function cari ($id)
    {
        return $this->table('pelanggan')->where('id_pelanggan', $id);
    }

    public function jumlah () {
        return $this->table('pelanggan')->countAll();
    }
}