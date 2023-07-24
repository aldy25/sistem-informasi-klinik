<?php

namespace App\Controllers\back;

use App\Controllers\BaseController;
use Config\Services;
use App\Models\Modeldatasakit;

class Sakit extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'KLINIK DOKTER YANTI | DATA SURAT IZIN SAKIT',
            'page' => 'SURAT SAKIT'
        ];
        return view('Page/Sakit/Viewdata', $data);
    }
    public function ambildata()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'tampildata' => $this->Sakit->findAll()

            ];
            $msg = [
                'data' => view('Page/Sakit/Data', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf Data Tidak di Temukan');
        }
    }
    public function listdata()
    {
        $request = Services::request();
        $datamodel = new Modeldatasakit($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];
                $tomboledit = "<button type=\"button\"title=\"Edit \" class=\"btn btn-info btn-sm\" onclick=\"edit('" . $list->id_izin_sakit .
                    "')\"><i class=\"mdi mdi-transcribe\"></i></button>";
                $tombolhapus = " <button type=\"button\" title=\"Hapus \"class=\"btn btn-danger btn-sm\" onclick=\"hapus('" . $list->id_izin_sakit .
                    "')\"><i class=\"fa fa-trash\"></i></button>";
                $tombolprint = " <a href=\"" . base_url() . "/S_sakit/$list->id_izin_sakit\" target=\"_blank\" type=\"button\" title=\"Print \"class=\"btn btn-warning btn-sm\"><i class=\"mdi mdi-printer\"></i></a>";
                $row[] = $no;
                $row[] = $list->nama_pasien;
                $row[] = $list->nama_user;
                $row[] = $list->durasi;
                $row[] = $list->waktu_awal;
                $row[] = $list->waktu_akhir;
                $row[] = $list->keterangan;
                $row[] = $tomboledit . " " . $tombolhapus . " " . $tombolprint;
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

    public function formtambah($id_pasien)
    {
        if ($this->request->isAJAX()) {

            $row = $this->Pasien->find($id_pasien);
            $data = [
                'id_pasien' => $id_pasien,
                'nama_pasien' => $row['nama_pasien'],
            ];
            $msg = [
                'sukses' => view('Page/Sakit/modaltambah', $data)
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
                'dokter' => [
                    'label' => 'Dokter',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],
                'durasi' => [
                    'label' => 'Durasi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],
                'waktu_awal' => [
                    'label' => ' waktu awal ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],

                'keterangan' => [
                    'label' => 'Keterangan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],

                'waktu_akhir' => [
                    'label' => 'waktu akhir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'dokter' => $validation->getError('dokter'),
                        'durasi' => $validation->getError('durasi'),
                        'waktu_awal' => $validation->getError('waktu_awal'),
                        'waktu_akhir' => $validation->getError('waktu_akhir'),
                        'keterangan' => $validation->getError('keterangan'),


                    ]
                ];
            } else {


                $simpandata = [
                    'pasien' => $this->request->getPost('id_pasien'),
                    'dokter' => $this->request->getPost('dokter'),
                    'durasi' => $this->request->getPost('durasi'),
                    'waktu_awal' => $this->request->getPost('waktu_awal'),
                    'waktu_akhir' => $this->request->getPost('waktu_akhir'),
                    'keterangan' => $this->request->getPost('keterangan'),



                ];
                $this->Sakit->insert($simpandata);

                $msg = [
                    'sukses' => 'Data Surat Izin Sakit Berhasil Ditambahkan...'
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
            $id_izin_sakit = $this->request->getVar('id_izin_sakit');
            $row = $this->Sakit->find($id_izin_sakit);
            $pasien = $row['pasien'];
            $pas = $this->Pasien->find($pasien);
            $data = [

                'id_izin_sakit' => $row['id_izin_sakit'],
                'id_pasien' => $row['pasien'],
                'nama_pasien' => $pas['nama_pasien'],
                'dokter' => $row['dokter'],
                'durasi' => $row['durasi'],
                'waktu_awal' => $row['waktu_awal'],
                'waktu_akhir' => $row['waktu_akhir'],
                'keterangan' => $row['keterangan'],
            ];
            $msg = [
                'sukses' => view('Page/Sakit/modaledit', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function updatedata()
    {

        if ($this->request->isAJAX()) {
            $validation = \config\Services::validation();
            $valid = $this->validate([

                'dokter' => [
                    'label' => 'Dokter',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],
                'waktu_awal' => [
                    'label' => ' waktu awal ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],
                'durasi' => [
                    'label' => 'durasi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],
                'keterangan' => [
                    'label' => 'Keterangan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],

                'waktu_akhir' => [
                    'label' => 'waktu akhir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],


            ]);
            if (!$valid) {
                $msg = [
                    'error' => [

                        'dokter' => $validation->getError('dokter'),
                        'durasi' => $validation->getError('durasi'),
                        'waktu_awal' => $validation->getError('waktu_awal'),
                        'keterangan' => $validation->getError('keterangan'),

                        'waktu_akhir' => $validation->getError('waktu_akhir'),

                    ]
                ];
            } else {

                $simpandata = [
                    'pasien' => $this->request->getPost('id_pasien'),
                    'dokter' => $this->request->getPost('dokter'),
                    'durasi' => $this->request->getPost('durasi'),
                    'waktu_awal' => $this->request->getPost('waktu_awal'),
                    'waktu_akhir' => $this->request->getPost('waktu_akhir'),
                    'keterangan' => $this->request->getPost('keterangan'),
                ];
                $id =  $this->request->getPost('id');
                $this->Sakit->update($id, $simpandata);
                $msg = [
                    'sukses' => 'Data Surat Izin Sakit berhasil di Update'
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
            $id = $this->request->getVar('id_izin_sakit');
            $this->Sakit->delete($id);
            $msg = [
                'sukses' => "Data berhasil di hapus"
            ];
            echo json_encode($msg);
        } else {
            exit('maaf data tidak ditemukan');
        }
    }

    public function cetak($id_izin_sakit)
    {
        $data = [
            'title' => 'KLINIK DOKTER YANTI | DATA SURAT IZIN SAKIT',
            'id' => $id_izin_sakit
        ];
        return view('Page/Sakit/Cetak', $data);
    }
}