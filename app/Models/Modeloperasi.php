<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeloperasi extends model
{
    protected $table = 'tbl_operasi';
    protected $primaryKey = 'id_operasi';
    protected $allowedFields = ['', 'pasien', 'dokter', 'nama_operasi', 'waktu', 'keterangan'];
}