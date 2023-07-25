<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelklub extends model
{
    protected $table = 'klub';
    protected $primaryKey = 'id_klub';
    protected $allowedFields = ['', 'nama_klub', 'kota_klub'];
}
