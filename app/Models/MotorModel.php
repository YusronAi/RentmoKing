<?php

namespace App\Models;

use CodeIgniter\Model;

class MotorModel extends Model
{
    protected $table = 'motor';
    protected $primaryKey = 'id_motor';
    protected $allowedFields = ['merek', 'no_polisi', 'warna', 'foto', 'no_mesin', 'no_rangka', 'thn_keluar', 'status', 'biaya'];

    public function search ($value) 
    {
        return $this->table('motor')->like('no_polisi', $value)->orlike('merek', $value);
    }

    public function cari ($id)
    {
        return $this->table('motor')->like('no_mesin', $id);
    }

    public function cariIm ($id) {
        return $this->table('motor')->where('id_motor', $id);
    }

    public function jumlah () {
        return $this->table('motor')->countAll();
    }
}