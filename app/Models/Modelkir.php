<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelkir extends model
{
    protected $table = 'tbl_kir';
    protected $primaryKey = 'id_kir';
    protected $allowedFields = ['', 'pasien', 'dokter', 'nomor_surat', 'perihal', 'tb', 'bb', 'gd', 'td', 'keterangan', 'waktu'];
}