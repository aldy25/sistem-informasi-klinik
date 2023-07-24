<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelpasien extends model
{
    protected $table = 'tbl_pasien';
    protected $primaryKey = 'id_pasien';
    protected $allowedFields = ['', 'no_rm', 'nama_pasien', 'jk_pasien', 'umur_pasien', 'alamat_pasien'];
}
