<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisBarangModel extends Model
{

    protected $table = 'jenis_barang';
    protected $primaryKey = 'id_jenis';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['jenis_barang'];

}
