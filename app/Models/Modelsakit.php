<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelsakit extends model
{
    protected $table = 'tbl_izin_sakit';
    protected $primaryKey = 'id_izin_sakit';
    protected $allowedFields = ['', 'pasien', 'dokter', 'durasi', 'waktu_awal', 'waktu_akhir', 'keterangan'];
}