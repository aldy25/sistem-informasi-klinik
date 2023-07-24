<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelkolestrol extends model
{
    protected $table = 'tbl_kolestrol';
    protected $primaryKey = 'id_kolestrol';
    protected $allowedFields = ['', 'pasien', 'dokter', 'nilai_kolestrol', 'waktu', 'keterangan'];
}