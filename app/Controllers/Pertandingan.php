<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Services;
use App\Models\Modeldatapertandingan;

class Pertandingan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'SISTEM INFORMASI KLASEMEN SEPAKBOLA | DATA PERTANDINGAN',
            'page' => 'PERTANDINGAN'
        ];
        return view('Page/Pertandingan/Viewdata', $data);
    }
    public function ambildata()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'tampildata' => $this->Pertandingan->findAll()
            ];
            $msg = [
                'data' => view('Page/Pertandingan/Data', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf Data Tidak di Temukan');
        }
    }
    public function listdata()
    {
        $this->db = \config\Database::connect();
        $request = Services::request();
        $datamodel = new Modeldatapertandingan($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $klub1 = $list->klub1;
                $klub2 = $list->klub2;
                $query_cek_klub1 = $this->db->query("SELECT * from klub  WHERE id_klub='$klub1'");
                $query_cek_klub2 = $this->db->query("SELECT * from klub  WHERE id_klub='$klub2'");
                $dataklub1 = $query_cek_klub1->getRow();
                $dataklub2 = $query_cek_klub2->getRow();
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $dataklub1->nama_klub;
                $row[] = $dataklub2->nama_klub;
                $row[] = $list->score1;
                $row[] = $list->score2;
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
                'data' => view('Page/Pertandingan/modaltambah')
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf Data Tidak di Temukan');
        }
    }
    public function  formtambahbanyak()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('Page/Pertandingan/modaltambahbanyak')
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
                'klub1' => [
                    'label' => ' Klub 1',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus Dipilih',
                    ]
                ],
                'klub2' => [
                    'label' => 'Klub 2',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus Dipilih'
                    ]
                ],
                'score1' => [
                    'label' => 'Score Klub 1',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak Boleh Kosong'
                    ]
                ],
                'score2' => [
                    'label' => 'Score Klub 2',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Tidak Boleh Kosong'
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'klub1' => $validation->getError('klub1'),
                        'klub2' => $validation->getError('klub2'),
                        'score1' => $validation->getError('score1'),
                        'score2' => $validation->getError('score2'),

                    ]
                ];
            } else {
                $klub1 = $this->request->getPost('klub1');
                $klub2 = $this->request->getPost('klub2');
                $cek_pertandingan = $this->db->query("SELECT * FROM pertandingan WHERE klub1 =$klub1 AND klub2=$klub2 OR klub1=$klub2 AND klub2=$klub1");
                $reult = $cek_pertandingan->getResult();
                if (count($reult) > 0) {
                    $msg = [
                        'error' => [
                            'klub1' => "Tidak Boleh Ada Data Pertandingan Yang Sama! Silahkan Plih Klub Lain",
                            'klub2' => "Tidak Boleh Ada Data Pertandingan Yang Sama! Silahkan Plih Klub Lain",

                        ]
                    ];
                } else {

                    $score1 = $this->request->getPost('score1');
                    $score2 = $this->request->getPost('score2');
                    $klasemen1 = $this->db->query("SELECT * FROM klasemen WHERE klub =$klub1");
                    $klasmeen2 = $this->db->query("SELECT * FROM klasemen WHERE klub =$klub2");
                    $dataklasemen1 = $klasemen1->getRow();
                    $dataklasemen2 = $klasmeen2->getRow();
                    $id_klasemen1 = $dataklasemen1->id_klasemen;
                    $id_klasemen2 = $dataklasemen2->id_klasemen;
                    if ($score1 < $score2) {

                        $updataklasemen1 = [
                            'ma' => $dataklasemen1->ma + 1,
                            'me' => $dataklasemen1->me,
                            's' => $dataklasemen1->s,
                            'k' => $dataklasemen1->k + 1,
                            'gm' => $dataklasemen1->gm + $score1,
                            'gk' => $dataklasemen1->gk + $score2,
                            'point' => $dataklasemen1->point,
                        ];
                        $updataklasemen2 = [
                            'ma' => $dataklasemen2->ma + 1,
                            'me' => $dataklasemen2->me + 1,
                            's' => $dataklasemen2->s,
                            'k' => $dataklasemen2->k,
                            'gm' => $dataklasemen2->gm + $score2,
                            'gk' => $dataklasemen2->gk + $score1,
                            'point' => $dataklasemen2->point + 3,
                        ];
                    } elseif ($score1 > $score2) {
                        $updataklasemen1 = [
                            'ma' => $dataklasemen1->ma + 1,
                            'me' => $dataklasemen1->me + 1,
                            's' => $dataklasemen1->s,
                            'k' => $dataklasemen1->k,
                            'gm' => $dataklasemen1->gm + $score1,
                            'gk' => $dataklasemen1->gk + $score2,
                            'point' => $dataklasemen1->point + 3,
                        ];
                        $updataklasemen2 = [
                            'ma' => $dataklasemen2->ma + 1,
                            'me' => $dataklasemen2->me,
                            's' => $dataklasemen2->s,
                            'k' => $dataklasemen2->k + 1,
                            'gm' => $dataklasemen2->gm + $score2,
                            'gk' => $dataklasemen2->gk + $score1,
                            'point' => $dataklasemen2->point,
                        ];
                    } else {
                        $updataklasemen1 = [
                            'ma' => $dataklasemen1->ma + 1,
                            'me' => $dataklasemen1->me,
                            's' => $dataklasemen1->s + 1,
                            'k' => $dataklasemen1->k,
                            'gm' => $dataklasemen1->gm + $score1,
                            'gk' => $dataklasemen1->gk + $score2,
                            'point' => $dataklasemen1->point + 1,
                        ];
                        $updataklasemen2 = [
                            'ma' => $dataklasemen2->ma + 1,
                            'me' => $dataklasemen2->me,
                            's' => $dataklasemen2->s + 1,
                            'k' => $dataklasemen2->k,
                            'gm' => $dataklasemen2->gm + $score2,
                            'gk' => $dataklasemen2->gk + $score1,
                            'point' => $dataklasemen2->point + 1,
                        ];
                    }

                    $simpandata = [
                        'klub1' => $this->request->getPost('klub1'),
                        'klub2' => $this->request->getPost('klub2'),
                        'score1' => $this->request->getPost('score1'),
                        'score2' => $this->request->getPost('score2'),
                    ];
                    $this->Pertandingan->insert($simpandata);
                    $this->Klasemen->update($id_klasemen1, $updataklasemen1);
                    $this->Klasemen->update($id_klasemen2, $updataklasemen2);
                    $msg = [
                        'sukses' => 'Data Pertandingan Berhasil Disimpan'
                    ];
                }
            }
            echo json_encode($msg);
        } else {
            exit('Maaf Data Tidak di Temukan');
        }
    }

    public function simpandatabanyak()
    {
        $this->db = \config\Database::connect();
        if ($this->request->isAJAX()) {


            $klub1 = $this->request->getVar('klub1');
            $jmldata = count($klub1);

            for ($i = 0; $i < $jmldata; $i++) {
                $cek_pertandingan = $this->db->query("SELECT * FROM pertandingan WHERE klub1 =$klub1[$i] AND klub2=$klub2[$i] OR klub1=$klub2[$i] AND klub2=$klub1[$i]");
                $reult = $cek_pertandingan->getResult();
                if (count($reult) > 0) {
                    $msg = [
                        'error' => [
                            'pesan' => "Tidak Boleh Ada Data Pertandingan Yang Sama! Silahkan Plih Klub Lain"

                        ]
                    ];
                } else {
                    $klub1 = $this->request->getPost('klub1');
                    $klub2 = $this->request->getPost('klub2');
                    $score1 = $this->request->getPost('score1');
                    $score2 = $this->request->getPost('score2');
                    $klasemen1[$i] = $this->db->query("SELECT * FROM klasemen WHERE klub =$klub1");
                    $klasmeen2[$i] = $this->db->query("SELECT * FROM klasemen WHERE klub =$klub2");
                    $dataklasemen1[$i] = $klasemen1[$i]->getRow();
                    $dataklasemen2[$i] = $klasmeen2[$i]->getRow();
                    $id_klasemen1[$i] = $dataklasemen1[$i]->id_klasemen;
                    $id_klasemen2[$i] = $dataklasemen2[$i]->id_klasemen;
                    if ($score1[$i] < $score2[$i]) {

                        $updataklasemen1 = [
                            'ma' => $dataklasemen1[$i]->ma + 1,
                            'me' => $dataklasemen1[$i]->me,
                            's' => $dataklasemen1[$i]->s,
                            'k' => $dataklasemen1[$i]->k + 1,
                            'gm' => $dataklasemen1[$i]->gm + $score1[$i],
                            'gk' => $dataklasemen1[$i]->gk + $score2[$i],
                            'point' => $dataklasemen1[$i]->point,
                        ];
                        $updataklasemen2 = [
                            'ma' => $dataklasemen2[$i]->ma + 1,
                            'me' => $dataklasemen2[$i]->me + 1,
                            's' => $dataklasemen2[$i]->s,
                            'k' => $dataklasemen2[$i]->k,
                            'gm' => $dataklasemen2[$i]->gm + $score2[$i],
                            'gk' => $dataklasemen2[$i]->gk + $score1[$i],
                            'point' => $dataklasemen2[$i]->point + 3,
                        ];
                    } elseif ($score1 > $score2) {
                        $updataklasemen1 = [
                            'ma' => $dataklasemen1[$i]->ma + 1,
                            'me' => $dataklasemen1[$i]->me + 1,
                            's' => $dataklasemen1[$i]->s,
                            'k' => $dataklasemen1[$i]->k,
                            'gm' => $dataklasemen1[$i]->gm + $score1[$i],
                            'gk' => $dataklasemen1[$i]->gk + $score2[$i],
                            'point' => $dataklasemen1[$i]->point + 3,
                        ];
                        $updataklasemen2 = [
                            'ma' => $dataklasemen2[$i]->ma + 1,
                            'me' => $dataklasemen2[$i]->me,
                            's' => $dataklasemen2[$i]->s,
                            'k' => $dataklasemen2[$i]->k + 1,
                            'gm' => $dataklasemen2[$i]->gm + $score2[$i],
                            'gk' => $dataklasemen2[$i]->gk + $score1[$i],
                            'point' => $dataklasemen2[$i]->point,
                        ];
                    } else {
                        $updataklasemen1 = [
                            'ma' => $dataklasemen1[$i]->ma + 1,
                            'me' => $dataklasemen1[$i]->me,
                            's' => $dataklasemen1[$i]->s + 1,
                            'k' => $dataklasemen1[$i]->k,
                            'gm' => $dataklasemen1[$i]->gm + $score1[$i],
                            'gk' => $dataklasemen1[$i]->gk + $score2[$i],
                            'point' => $dataklasemen1[$i]->point + 1,
                        ];
                        $updataklasemen2 = [
                            'ma' => $dataklasemen2[$i]->ma + 1,
                            'me' => $dataklasemen2[$i]->me,
                            's' => $dataklasemen2[$i]->s + 1,
                            'k' => $dataklasemen2[$i]->k,
                            'gm' => $dataklasemen2[$i]->gm + $score2[$i],
                            'gk' => $dataklasemen2[$i]->gk + $score1[$i],
                            'point' => $dataklasemen2[$i]->point + 1,
                        ];
                    }


                    $simpandata = [
                        'klub1' => $klub1[$i],
                        'klub2' => $klub2[$i],
                        'score1' => $score2[$i],
                        'score2' => $score2[$i],
                    ];
                    $this->Pertandingan->insert($simpandata);
                    $this->Klasemen->update($id_klasemen1[$i], $updataklasemen1[$i]);
                    $this->Klasemen->update($id_klasemen2[$i], $updataklasemen2[$i]);
                }
                $msg = [
                    'sukses' => 'Data Pertandingan Berhasil Disimpan'
                ];
            }

            echo json_encode($msg);
        } else {
            exit('Maaf Data Tidak di Temukan');
        }
    }
}
