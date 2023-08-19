<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Services;
use App\Models\Modeldataklub;

class Klub extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'SISTEM INFORMASI KLASEMEN SEPAKBOLA | DATA KLUB',
            'page' => 'KLUB'
        ];
        return view('Page/Klub/Viewdata', $data);
    }
    public function ambildata()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'tampildata' => $this->Klub->findAll()
            ];
            $msg = [
                'data' => view('Page/Klub/Data', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf Data Tidak di Temukan');
        }
    }
    public function listdata()
    {
        $request = Services::request();
        $datamodel = new Modeldataklub($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {


                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->nama_klub;
                $row[] = $list->kota_klub;
                $data[] = $row;
            }
            $output = [
                "draw" => $request->getPost('draw'),
                "recordsTotal" => $datamodel->count_all(),
                "recordsFiltered" => $datamodel->count_filtered(),
                "data" => $data
            ];
            echo json_encode($output);
        }
    }

    public function formtambah()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('Page/Klub/modaltambah')
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf Data Tidak di Temukan');
        }
    }

    public function simpandata()
    {
        $this->db = \config\Database::connect();
        if ($this->request->isAJAX()) {
            $validation = \config\Services::validation();
            $valid = $this->validate([
                'nama_klub' => [
                    'label' => 'Nama Klub ',
                    'rules' => 'required|is_unique[klub.nama_klub]',
                    'errors' => [
                        'required' => '{field} Tidak Boleh Kosong',
                        'is_unique' => '{field} Sudah Ada'

                    ]
                ],
                'kota_klub' => [
                    'label' => 'Kota Klub ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak Boleh Kosong'
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_klub' => $validation->getError('nama_klub'),
                        'kota_klub' => $validation->getError('kota_klub'),

                    ]
                ];
            } else {
                $nama_klub = $this->request->getPost('nama_klub');
                $simpandata = [
                    'nama_klub' => $nama_klub,
                    'kota_klub' => $this->request->getPost('kota_klub'),
                ];
                $this->Klub->insert($simpandata);
                $cek_klub = $this->db->query("SELECT * FROM klub WHERE nama_klub = '$nama_klub'");
                $dataklub = $cek_klub->getRow();

                $simpanklasemen = [
                    'klub' => $dataklub->id_klub,
                    'ma' => 0,
                    'me' => 0,
                    's' => 0,
                    'k' => 0,
                    'gm' => 0,
                    'gk' => 0,
                    'point' => 0
                ];
                $this->Klasemen->insert($simpanklasemen);
                $msg = [
                    'sukses' => 'Klub Baru Berhasil Ditambahkan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf Data Tidak di Temukan');
        }
    }
}
