<?php

namespace App\Models;

use CodeIgniter\Model;

class BiodataModel extends Model
{
    protected $table = 'biodata'; // Nama tabel di database
    protected $primaryKey = 'sobat_id'; // Kunci utama tabel
    protected $allowedFields = ['sobat_id', 'nama', 'kecamatan', 'desa', 'alamat', 'username_sobat', 'no_hp']; // Kolom yang diizinkan untuk diisi

    public function getBiodata()
    {
        return $this->findAll(); // Mengambil semua data dari tabel
    }
}