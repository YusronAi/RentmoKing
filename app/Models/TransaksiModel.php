<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['id_motor', 'id_pelanggan', 'tgl_pinjam', 'tgl_kembali', 'id_user', 'waktu_pinjam', 'waktu_kembali', 'lama', 'status'];

    public function AllData()
    {
        return $this->db->table('transaksi')->join('pelanggan', 'pelanggan.id_pelanggan=transaksi.id_pelanggan', 'left')->get()->getResultArray();
    }

    public function cari ($id)
    {
        return $this->table('transaksi')->like('id_transaksi', $id);
    }

    public function AllMotor()
    {
        return $this->db->table('transaksi')->join('motor', 'motor.id_motor=transaksi.id_motor', 'left')->get()->getResultArray();
    }

    public function AllPelanggan () {
        return $this->db->table('pelanggan')->get()->getResultArray();
    }

    public function AllMotors () {
        return $this->db->table('motor')->get()->getResultArray();
    }

    public function jumlah () {
        return $this->table('transaksi')->countAll();
    }
}
