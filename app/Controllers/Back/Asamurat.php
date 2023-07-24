<?php

namespace App\Controllers\back;

use App\Controllers\BaseController;
use Config\Services;
use App\Models\Modeldataasamurat;

class Asamurat extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'KLINIK DOKTER YANTI | DATA CEK ASAM URAT',
            'page' => 'ASAM URAT'
        ];
        return view('Page/Asamurat/Viewdata', $data);
    }
    public function ambildata()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'tampildata' => $this->Asamurat->findAll()

            ];
            $msg = [
                'data' => view('Page/Asamurat/Data', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf Data Tidak di Temukan');
        }
    }
    public function listdata()
    {
        $request = Services::request();
        $datamodel = new Modeldataasamurat($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];
                $tomboledit = "<button type=\"button\" title=\"Edit \" class=\"btn btn-info btn-sm\" onclick=\"edit('" . $list->id_asamurat  .
                    "')\"><i class=\"mdi mdi-transcribe\"></i></button>";
                $tombolhapus = " <button type=\"button\" title=\"Hapus \" class=\"btn btn-danger btn-sm\" onclick=\"hapus('" . $list->id_asamurat  .
                    "')\"><i class=\"fa fa-trash\"></i></button>";
                $row[] = $no;
                $row[] = $list->nama_pasien;
                $row[] = $list->nama_user;
                $row[] = $list->nilai_asamurat;

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
                'sukses' => view('Page/Asamurat/modaltambah', $data)
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
                'nilai_asamurat' => [
                    'label' => 'nilai asamurat',
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

                'keterangan' => [
                    'label' => 'Keterangan',
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
                        'nilai_asamurat' => $validation->getError('nilai_asamurat'),
                        'waktu' => $validation->getError('waktu'),
                        'keterangan' => $validation->getError('keterangan'),


                    ]
                ];
            } else {


                $simpandata = [
                    'pasien' => $this->request->getPost('id_pasien'),
                    'dokter' => $this->request->getPost('dokter'),
                    'nilai_asamurat' => $this->request->getPost('nilai_asamurat'),
                    'waktu' => $this->request->getPost('waktu'),
                    'keterangan' => $this->request->getPost('keterangan'),



                ];
                $this->Asamurat->insert($simpandata);
                $this->db = \config\Database::connect();

                $session = \config\services::session();


                $id_user = $session->get('id_user');
                $query_cekuser = $this->db->query("SELECT * from tbl_layanan  WHERE id_layanan='10'");
                $row = $query_cekuser->getRow();
                $harga = $row->harga;
                $transaksi = [
                    'pasien' => $this->request->getPost('id_pasien'),
                    'layanan' => '10',
                    'kasir' => $id_user,
                    'biaya_lainya' => '',
                    'total_harga' => $harga,
                    'kembalian' => '',
                    'keterangan' => $this->request->getPost('keterangan'),
                    'waktu' => $this->request->getPost('waktu'),
                ];
                $this->Riwayat->insert($transaksi);
                $msg = [
                    'sukses' => 'Data Cek Asam urat Berhasil Ditambahkan...'
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
            $id_asamurat = $this->request->getVar('id_asamurat');
            $row = $this->Asamurat->find($id_asamurat);
            $pasien = $row['pasien'];
            $pas = $this->Pasien->find($pasien);
            $data = [

                'id_asamurat' => $row['id_asamurat'],
                'nama_pasien' => $pas['nama_pasien'],
                'dokter' => $row['dokter'],
                'nilai_asamurat' => $row['nilai_asamurat'],

                'waktu' => $row['waktu'],
                'keterangan' => $row['keterangan'],
            ];
            $msg = [
                'sukses' => view('Page/Asamurat/modaledit', $data)
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
                'nilai_asamurat' => [
                    'label' => ' Nilai Asamurat ',
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
                        'nilai_asamurat' => $validation->getError('nilai_asamurat'),
                        'keterangan' => $validation->getError('keterangan'),

                        'waktu' => $validation->getError('waktu'),

                    ]
                ];
            } else {

                $simpandata = [

                    'dokter' => $this->request->getPost('dokter'),
                    'nilai_asamurat' => $this->request->getPost('nilai_asamurat'),
                    'waktu' => $this->request->getPost('waktu'),
                    'keterangan' => $this->request->getPost('keterangan'),



                ];



                $id =  $this->request->getPost('id');


                $this->Asamurat->update($id, $simpandata);

                $msg = [
                    'sukses' => 'Data Tes Asamurat berhasil di Update'
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
            $id = $this->request->getVar('id_asamurat');
            $this->Asamurat->delete($id);
            $msg = [
                'sukses' => "Data berhasil di hapus"
            ];
            echo json_encode($msg);
        } else {
            exit('maaf data tidak ditemukan');
        }
    }
}