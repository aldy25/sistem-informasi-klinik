<?php

namespace App\Controllers\back;

use App\Controllers\BaseController;
use Config\Services;
use App\Models\Modeldatakb;

class Kb extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'KLINIK DOKTER YANTI | DATA SUNTIK KB',
            'page' => 'SUNTIK KB'
        ];
        return view('Page/Kb/Viewdata', $data);
    }
    public function ambildata()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'tampildata' => $this->Kb->findAll()

            ];
            $msg = [
                'data' => view('Page/Kb/Data', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf Data Tidak di Temukan');
        }
    }
    public function listdata()
    {
        $request = Services::request();
        $datamodel = new Modeldatakb($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];

                $tomboledit = "<button type=\"button\" title=\"Edit \" class=\"btn btn-info btn-sm\" onclick=\"edit('" . $list->id_kb .
                    "')\"><i class=\"mdi mdi-transcribe\"></i></button>";
                $tombolhapus = " <button type=\"button\"title=\"Hapus \" class=\"btn btn-danger btn-sm\" onclick=\"hapus('" . $list->id_kb  .
                    "')\"><i class=\"fa fa-trash\"></i></button>";
                $row[] = $no;
                $row[] = $list->nama_pasien;
                $row[] = $list->nama_user;

                $row[] = $list->nama_kb;
                $row[] = $list->jenis_kb;
                $row[] = $list->waktu;
                $row[] = $list->keterangan;
                $row[] = $tomboledit . " " . $tombolhapus;

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
                'sukses' => view('Page/Kb/modaltambah', $data)
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
                'nama_kb' => [
                    'label' => ' Nama Kb ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],
                'jenis_kb' => [
                    'label' => 'Jenis Kb',
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

                'waktu' => [
                    'label' => 'Waktu',
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
                        'nama_kb' => $validation->getError('nama_kb'),
                        'jenis_kb' => $validation->getError('jenis_kb'),
                        'keterangan' => $validation->getError('keterangan'),
                        'waktu' => $validation->getError('waktu'),

                    ]
                ];
            } else {


                $simpandata = [
                    'pasien' => $this->request->getPost('id_pasien'),
                    'dokter' => $this->request->getPost('dokter'),
                    'nama_kb' => $this->request->getPost('nama_kb'),
                    'jenis_kb' => $this->request->getPost('jenis_kb'),
                    'keterangan' => $this->request->getPost('keterangan'),

                    'waktu' => $this->request->getPost('waktu'),

                ];
                $this->Kb->insert($simpandata);
                $this->db = \config\Database::connect();

                $session = \config\services::session();


                $id_user = $session->get('id_user');
                $query_cekuser = $this->db->query("SELECT * from tbl_layanan  WHERE id_layanan='3'");
                $row = $query_cekuser->getRow();
                $harga = $row->harga;
                $transaksi = [
                    'pasien' => $this->request->getPost('id_pasien'),
                    'layanan' => '3',
                    'kasir' => $id_user,
                    'biaya_lainya' => '',
                    'total_harga' => $harga,
                    'kembalian' => '',
                    'keterangan' => $this->request->getPost('keterangan'),
                    'waktu' => $this->request->getPost('waktu'),
                ];
                $this->Riwayat->insert($transaksi);
                $msg = [
                    'sukses' => 'Data Pasang Kb Berhasil Ditambahkan...'
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
            $id_kb  = $this->request->getVar('id_kb');
            $row = $this->Kb->find($id_kb);
            $pasien = $row['pasien'];
            $pas = $this->Pasien->find($pasien);
            $data = [
                'id_kb' => $row['id_kb'],
                'id_pasien' => $row['pasien'],
                'nama_pasien' => $pas['nama_pasien'],
                'dokter' => $row['dokter'],
                'nama_kb' => $row['nama_kb'],
                'jenis_kb' => $row['jenis_kb'],
                'keterangan' => $row['keterangan'],
                'waktu' => $row['waktu'],
            ];
            $msg = [
                'sukses' => view('Page/Kb/modaledit', $data)
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
                'nama_kb' => [
                    'label' => ' Nama Kb ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],
                'jenis_kb' => [
                    'label' => 'Jenis Kb',
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

                'waktu' => [
                    'label' => 'Waktu',
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
                        'nama_kb' => $validation->getError('nama_kb'),
                        'jenis_kb' => $validation->getError('jenis_kb'),
                        'keterangan' => $validation->getError('keterangan'),
                        'waktu' => $validation->getError('waktu'),
                    ]
                ];
            } else {

                $simpandata = [
                    'pasien' => $this->request->getPost('id_pasien'),
                    'dokter' => $this->request->getPost('dokter'),
                    'nama_kb' => $this->request->getPost('nama_kb'),
                    'jenis_kb' => $this->request->getPost('jenis_kb'),
                    'keterangan' => $this->request->getPost('keterangan'),

                    'waktu' => $this->request->getPost('waktu'),
                ];


                $id =  $this->request->getPost('id');


                $this->Kb->update($id, $simpandata);

                $msg = [
                    'sukses' => 'Data Suntik Kb berhasil di Update'
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
            $id = $this->request->getVar('id_kb');
            $this->Kb->delete($id);
            $msg = [
                'sukses' => "Data berhasil di hapus"
            ];
            echo json_encode($msg);
        } else {
            exit('maaf data tidak ditemukan');
        }
    }
}