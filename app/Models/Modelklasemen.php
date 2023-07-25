<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelklasemen extends model
{
    protected $table = 'klasemen';
    protected $primaryKey = 'id_klasemen';
    protected $allowedFields = ['', 'klub', 'ma', 'me', 's', 'k', 'gm', 'gk', 'point'];
}
