<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'userbaru';
    protected $primaryKey = 'id';
    protected $useTimestamps = false;
    protected $returnType = 'App\Entities\User';
    protected $allowedFields = ['username', 'avatar', 'password', 'salt', 'created_date', 'created_by', 'updated_date', 'updated_by']; //kontrol apa saja kolom tabel yang bisa diisi

}
