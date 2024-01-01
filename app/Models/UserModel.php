<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username', 'password', 'alamat', 'foto', 'no_telephone', 'role'];

    public function search ($value) 
    {
        return $this->table('user')->like('username', $value);
    }

    public function cari ($id)
    {
        return $this->table('user')->like('id_user', $id);
    }
}