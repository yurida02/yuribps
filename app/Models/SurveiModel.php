<?php

namespace App\Models;

use CodeIgniter\Model;

class SurveiModel extends Model
{
    protected $table = 'survei'; // Nama tabel yang sesuai
    protected $primaryKey = 'sobat_id'; // Primary key yang sesuai
    protected $useAutoIncrement = true; // Jika primary key auto increment
    protected $allowedFields = [
        'sobat_id',
        'nama',
        'kec',
        'alamat',
        'status',
        'anggaran',
        'keg',
        'uraian',
        'vol',
        'satuan',
        'harga',
        'jumlah',
        'bulan',
        'konfirm', // Pastikan kolom ini digunakan
    ];
    // Method untuk mengambil data survei
    public function getSurvei()
    {
        return $this->db->table($this->table)
            ->get()->getResultArray();
    }

    public function filterdatabulan($bulan = null)
{
    $builder = $this->db->table('survei'); // Menggunakan tabel survei

    if ($bulan) {
        // Filter catatan berdasarkan kolom 'bulan'
        $builder->where('bulan', $bulan);
    }

    return $builder->get()->getResultArray(); // Eksekusi kueri dan kembalikan hasil sebagai array asosiatif
}



}
