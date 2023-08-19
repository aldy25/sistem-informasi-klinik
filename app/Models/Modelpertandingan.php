<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelpertandingan extends model
{
    protected $table = 'pertandingan';
    protected $primaryKey = 'id_pertandingan';
    protected $allowedFields = ['', 'klub1', 'klub2', 'score1', 'score2'];
}
