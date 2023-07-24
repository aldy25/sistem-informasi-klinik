<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelkb extends model
{
    protected $table = 'tbl_kb';
    protected $primaryKey = 'id_kb';
    protected $allowedFields = ['', 'pasien', 'dokter', 'nama_kb', 'jenis_kb', 'keterangan', 'waktu'];
}