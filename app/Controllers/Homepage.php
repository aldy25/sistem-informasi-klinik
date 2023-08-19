<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Homepage extends BaseController
{
    public function index()
    {

        $data = [
            'title' => 'SISTEM KLASEMEN SEPAKBOLA | BERANDA SISTEM',
            'page' => 'BERANDA'
        ];
        return view('Page/Beranda', $data);
    }
}
