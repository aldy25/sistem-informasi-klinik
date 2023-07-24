<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeljahit extends model
{
    protected $table = 'tbl_jahit';
    protected $primaryKey = 'id_jahit';
    protected $allowedFields = ['', 'pasien', 'dokter', 'jumlah_jahitan', 'waktu', 'keterangan'];
}