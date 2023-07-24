<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelvitamin extends model
{
    protected $table = 'tbl_vitamin';
    protected $primaryKey = 'id_vitamin';
    protected $allowedFields = ['', 'dokter', 'nama_vitamin', 'dosis', 'keterangan', 'waktu', 'pasien'];
}