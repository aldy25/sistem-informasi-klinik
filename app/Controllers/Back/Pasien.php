<?php

namespace App\Controllers\back;

use App\Controllers\BaseController;
use Config\Services;
use App\Models\Modeldatapasien;
use App\Models\Modeldatapasienn;

class Pasien extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'KLINIK DOKTER YANTI | DATA PASIEN',
            'page' => 'PASIEN'
        ];
        return view('Page/Pasien/Viewdata', $data);
    }
    public function ambildata()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'tampildata' => $this->Pasien->findAll()

            ];
            $msg = [
                'data' => view('Page/Pasien/Data', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf Data Tidak di Temukan');
        }
    }
    public function listdata()
    {
        $request = Services::request();
        $datamodel = new Modeldatapasien($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {


                $no++;
                $row = [];
                $tomboledit = "<button type=\"button\" title=\"Edit \" class=\"btn btn-info btn-sm\" onclick=\"edit('" . $list->id_pasien .
                    "')\"><i class=\"mdi mdi-transcribe\"></i></button>";
                $tombolhapus = " <button type=\"button\" title=\"Hapus \"class=\"btn btn-danger btn-sm\" onclick=\"hapus('" . $list->id_pasien .
                    "')\"><i class=\"fa fa-trash\"></i></button>";
                $tombolberobat = "<a href=\"Detail-Pasienn/" . $list->id_pasien . "\" title=\"Detail \" class=\"btn btn-warning btn-sm\" ><i class=\"mdi mdi-eye  \"></i></a>";
                $tombolprint = " <a href=\"" . base_url() . "/Kartu/$list->id_pasien\" target=\"_blank\" type=\"button\" title=\"Cetak Kartu Pasien \"class=\"btn btn-warning btn-sm\"><i class=\"mdi mdi-printer\"></i></a>";
                $tahun = "Tahun";
                $row[] = $no;
                $row[] = $list->nama_pasien;
                $row[] = $list->no_rm;
                $row[] = $list->jk_pasien;
                $row[] = $list->umur_pasien . " " . $tahun;
                $row[] = $list->alamat_pasien;
                $row[] = $tomboledit . " " . $tombolhapus . " " . $tombolberobat . " " . $tombolprint;
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
    public function listdataa()
    {
        $request = Services::request();
        $datamodel = new Modeldatapasienn($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {


                $no++;
                $row = [];
                $tombolberobat = "<a href=\"Detail-Pasien/" . $list->id_pasien . "\"target=\"_blank\"  title=\"Berobat \" class=\"btn btn-warning btn-sm\" ><i class=\"mdi mdi-sync  \"></i></a>";
                $row[] = $no;
                $row[] = $list->nama_pasien;
                $row[] = $list->no_rm;
                $row[] = $tombolberobat;
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
                'data' => view('Page/Pasien/modaltambah')
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf Data Tidak di Temukan');
        }
    }

    public function simpandata()
    {
        if ($this->request->isAJAX()) {
            $validation = \config\Services::validation();
            $valid = $this->validate([
                'nama_pasien' => [
                    'label' => 'Nama Pasien ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],
                'jk_pasien' => [
                    'label' => 'Jenis Kelamin ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],
                'umur_pasien' => [
                    'label' => 'Umur Pasien',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],
                'alamat_pasien' => [
                    'label' => 'Alamat Pasien',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ]


            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_pasien' => $validation->getError('nama_pasien'),
                        'jk_pasien' => $validation->getError('jk_pasien'),
                        'umur_pasien' => $validation->getError('umur_pasien'),
                        'alamat_pasien' => $validation->getError('alamat_pasien'),

                    ]
                ];
            } else {
                $this->db = \config\Database::connect();
                $query_pasien = $this->db->query("SELECT * from tbl_pasien ORDER BY id_pasien DESC limit 1");
                $get = $query_pasien->getRow();
                $id = $get->id_pasien;
                $id_pasien = $id + 1;
                $no_rm = 100000 + $id_pasien;
                $simpandata = [
                    'no_rm' => $no_rm,
                    'nama_pasien' => $this->request->getPost('nama_pasien'),
                    'jk_pasien' => $this->request->getPost('jk_pasien'),
                    'umur_pasien' => $this->request->getPost('umur_pasien'),
                    'alamat_pasien' => $this->request->getPost('alamat_pasien'),
                ];
                $this->Pasien->insert($simpandata);
                $msg = [
                    'sukses' => 'Data Pasien Berhasil di Tambahkan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf Data Tidak di Temukan');
        }
    }

    public function formedit()
    {
        if ($this->request->isAJAX()) {
            $id_pasien = $this->request->getVar('id_pasien');
            $row = $this->Pasien->find($id_pasien);
            $data = [
                'id_pasien' => $row['id_pasien'],
                'nama_pasien' => $row['nama_pasien'],
                'jk_pasien' => $row['jk_pasien'],
                'umur_pasien' => $row['umur_pasien'],
                'alamat_pasien' => $row['alamat_pasien'],
            ];
            $msg = [
                'sukses' => view('Page/Pasien/modaledit', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function updatedata()
    {

        if ($this->request->isAJAX()) {
            $validation = \config\Services::validation();
            $valid = $this->validate([


                'nama_pasien' => [
                    'label' => 'Nama Pasien ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],
                'jk_pasien' => [
                    'label' => 'Jenis Kelamin ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],
                'umur_pasien' => [
                    'label' => 'Umur Pasien',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],
                'alamat_pasien' => [
                    'label' => 'Alamat Pasien',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ]


            ]);
            if (!$valid) {
                $msg = [
                    'error' => [

                        'nama_pasien' => $validation->getError('nama_pasien'),
                        'jk_pasien' => $validation->getError('jk_pasien'),
                        'umur_pasien' => $validation->getError('umur_pasien'),
                        'alamat_pasien' => $validation->getError('alamat_pasien'),

                    ]
                ];
            } else {

                $simpandata = [
                    'nama_pasien' => $this->request->getPost('nama_pasien'),
                    'jk_pasien' => $this->request->getPost('jk_pasien'),
                    'umur_pasien' => $this->request->getPost('umur_pasien'),
                    'alamat_pasien' => $this->request->getPost('alamat_pasien'),
                ];


                $id =  $this->request->getPost('id');


                $this->Pasien->update($id, $simpandata);

                $msg = [
                    'sukses' => 'Data Pasien berhasil di Update'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Maaf Data Tidak di Temukan');
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id_pasien');
            $this->Pasien->delete($id);
            $msg = [
                'sukses' => "Data Akun dengan id $id berhasil di hapus"
            ];
            echo json_encode($msg);
        } else {
            exit('maaf data tidak ditemukan');
        }
    }

    public function detail($id_pasien)
    {

        $row = $this->Pasien->find($id_pasien);
        $data = [
            'id_pasien' => $row['id_pasien'],
            'nama_pasien' => $row['nama_pasien'],
            'jk_pasien' => $row['jk_pasien'],
            'umur_pasien' => $row['umur_pasien'],
            'alamat_pasien' => $row['alamat_pasien'],
            'title' => 'KLINIK DOKTER YANTI | DETAIL DATA PASIEN',
            'page' => 'DETAIL DATA'
        ];

        return view('Page/Pasien/Detail', $data);
    }
    public function detaill($id_pasien)
    {

        $row = $this->Pasien->find($id_pasien);
        $data = [
            'id_pasien' => $row['id_pasien'],
            'nama_pasien' => $row['nama_pasien'],
            'jk_pasien' => $row['jk_pasien'],
            'umur_pasien' => $row['umur_pasien'],
            'alamat_pasien' => $row['alamat_pasien'],
            'title' => 'KLINIK DOKTER YANTI | DETAIL DATA PASIEN',
            'page' => 'DETAIL DATA'
        ];

        return view('Page/Pasien/Detaill', $data);
    }
    public function cetak($id_pasien)
    {
        $data = [
            'title' => 'KLINIK DOKTER YANTI |CETAK KARTU PASIEN ',
            'id' => $id_pasien
        ];
        return view('Page/Pasien/Cetak', $data);
    }

    public function proses()
    {
        $data = [
            'title' => 'KLINIK DOKTER YANTI | DATA PASIEN',
            'page' => 'PROSES BEROBAT'
        ];
        return view('Page/Pasien/Viewdataa', $data);
    }
    public function ambildataa()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'tampildata' => $this->Pasien->findAll()

            ];
            $msg = [
                'data' => view('Page/Pasien/Dataa', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf Data Tidak di Temukan');
        }
    }
}
