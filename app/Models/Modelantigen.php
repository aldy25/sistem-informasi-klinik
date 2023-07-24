<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelantigen extends model
{
    protected $table = 'tbl_antigen';
    protected $primaryKey = 'id_antigen';
    protected $allowedFields = ['', 'pasien', 'dokter', 'parameter', 'hasil', 'keterangan', 'waktu'];
}