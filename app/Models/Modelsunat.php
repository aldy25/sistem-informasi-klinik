<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelsunat extends model
{
    protected $table = 'tbl_sunat';
    protected $primaryKey = 'id_sunat';
    protected $allowedFields = ['', 'pasien', 'dokter', 'jenis_sunat', 'waktu', 'keterangan'];
}