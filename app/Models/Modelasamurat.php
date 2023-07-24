<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelasamurat extends model
{
    protected $table = 'tbl_asamurat';
    protected $primaryKey = 'id_asamurat';
    protected $allowedFields = ['', 'pasien', 'dokter', 'nilai_asamurat', 'waktu', 'keterangan'];
}