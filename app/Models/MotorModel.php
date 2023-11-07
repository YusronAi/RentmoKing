<?php

namespace App\Models;

use CodeIgniter\Model;

class MotorModel extends Model
{
    protected $table = 'motor';
    protected $allowedFields = ['merek', 'no_polisi', 'warna', 'no_mesin', 'no_rangka', 'thn_keluar', 'status'];

    public function search ($value) 
    {
        return $this->table('motor')->like('no_polisi', $value);
    }

    public function cari ($id)
    {
        return $this->table('motor')->like('no_mesin', $id);
    }
}