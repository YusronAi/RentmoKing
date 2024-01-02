<?php

namespace App\Models;

use CodeIgniter\Model;

class HargaModel extends Model
{
    protected $table = 'harga';
    protected $primaryKey = 'id_harga';
    protected $allowedFields = ['id_motor', 'id_pelanggan', 'id_transaksi', 'waktu', 'biaya'];

    public function AllData()
    {
        return $this->db->table('harga')->get()->getResultArray();
    }

    public function cari ($id)
    {
        return $this->table('harga')->like('id_pelanggan', $id);
    }
}
