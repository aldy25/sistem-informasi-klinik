<?php

namespace App\Controllers\back;

use App\Controllers\BaseController;
use Config\Services;
use App\Models\Modeldatakir;

class Kir extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'KLINIK DOKTER YANTI | DATA SURAT KETERENGAN SEHAT',
            'page' => 'KIR'
        ];
        return view('Page/Kir/Viewdata', $data);
    }
    public function ambildata()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'tampildata' => $this->Kir->findAll()

            ];
            $msg = [
                'data' => view('Page/Kir/Data', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Maaf Data Tidak di Temukan');
        }
    }
    public function listdata()
    {
        $request = Services::request();
        $datamodel = new Modeldatakir($request);
        if ($request->getMethod(true) == 'POST') {
            $lists = $datamodel->get_datatables();
            $data = [];
            $no = $request->getPost("start");
            foreach ($lists as $list) {
                $no++;
                $row = [];


                $tomboledit = "<button type=\"button\" title=\"Edit \" class=\"btn btn-info btn-sm\" onclick=\"edit('" . $list->id_kir .
                    "')\"><i class=\"mdi mdi-transcribe\"></i></button>";
                $tombolhapus = " <button type=\"button\" title=\"Hapus \" class=\"btn btn-danger btn-sm\" onclick=\"hapus('" . $list->id_kir .
                    "')\"><i class=\"fa fa-trash\"></i></button>";
                $tombolprint = " <a href=\"" . base_url() . "/S_kir/$list->id_kir\" target=\"_blank\" type=\"button\" title=\"Print \"class=\"btn btn-warning btn-sm\"><i class=\"mdi mdi-printer\"></i></a>";
                $row[] = $no;
                $row[] = $list->nama_pasien;
                $row[] = $list->nama_user;
                $row[] = $list->nomor_surat;
                $row[] = $list->perihal;

                $row[] = $list->waktu;
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
                'sukses' => view('Page/Kir/modaltambah', $data)
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
                'nomor_surat' => [
                    'label' => 'Nomor Surat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],
                'perihal' => [
                    'label' => ' Perihal ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],
                'tb' => [
                    'label' => ' tb ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],
                'bb' => [
                    'label' => ' bb ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],
                'gd' => [
                    'label' => ' gd ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],
                'td' => [
                    'label' => ' td ',
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
                        'nomor_surat' => $validation->getError('nomor_surat'),
                        'perihal' => $validation->getError('perihal'),
                        'tb' => $validation->getError('tb'),
                        'bb' => $validation->getError('bb'),
                        'gd' => $validation->getError('gd'),
                        'td' => $validation->getError('td'),
                        'keterangan' => $validation->getError('keterangan'),
                        'waktu' => $validation->getError('waktu'),

                    ]
                ];
            } else {


                $simpandata = [
                    'pasien' => $this->request->getPost('id_pasien'),
                    'dokter' => $this->request->getPost('dokter'),
                    'nomor_surat' => $this->request->getPost('nomor_surat'),
                    'perihal' => $this->request->getPost('perihal'),
                    'tb' => $this->request->getPost('tb'),
                    'bb' => $this->request->getPost('bb'),
                    'gd' => $this->request->getPost('gd'),
                    'td' => $this->request->getPost('td'),
                    'keterangan' => $this->request->getPost('keterangan'),
                    'waktu' => $this->request->getPost('waktu'),

                ];
                $this->Kir->insert($simpandata);
                $this->db = \config\Database::connect();

                $session = \config\services::session();


                $id_user = $session->get('id_user');
                $query_cekuser = $this->db->query("SELECT * from tbl_layanan  WHERE id_layanan='4'");
                $row = $query_cekuser->getRow();
                $harga = $row->harga;
                $transaksi = [
                    'pasien' => $this->request->getPost('id_pasien'),
                    'layanan' => '4',
                    'kasir' => $id_user,
                    'biaya_lainya' => '',
                    'total_harga' => $harga,
                    'kembalian' => '',
                    'keterangan' => $this->request->getPost('keterangan'),
                    'waktu' => $this->request->getPost('waktu'),
                ];
                $this->Riwayat->insert($transaksi);
                $msg = [
                    'sukses' => 'Data Surat KIR Berhasil Ditambahkan...'
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
            $id_kir = $this->request->getVar('id_kir');
            $row = $this->Kir->find($id_kir);
            $pasien = $row['pasien'];
            $pas = $this->Pasien->find($pasien);
            $data = [

                'id_kir' => $row['id_kir'],
                'id_pasien' => $row['pasien'],
                'nama_pasien' => $pas['nama_pasien'],
                'dokter' => $row['dokter'],
                'nomor_surat' => $row['nomor_surat'],
                'perihal' => $row['perihal'],
                'tb' => $row['tb'],
                'bb' => $row['bb'],
                'gd' => $row['gd'],
                'td' => $row['td'],
                'waktu' => $row['waktu'],
                'keterangan' => $row['keterangan'],
            ];
            $msg = [
                'sukses' => view('Page/Kir/modaledit', $data)
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
                'nomor_surat' => [
                    'label' => ' nomor surat ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],
                'perihal' => [
                    'label' => 'perihal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],
                'tb' => [
                    'label' => ' tb ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],
                'bb' => [
                    'label' => ' bb ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],
                'gd' => [
                    'label' => ' gd ',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'

                    ]
                ],
                'td' => [
                    'label' => ' td ',
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
                        'nomor_surat' => $validation->getError('nomor_surat'),
                        'perihal' => $validation->getError('perihal'),
                        'tb' => $validation->getError('tb'),
                        'bb' => $validation->getError('bb'),
                        'gd' => $validation->getError('gd'),
                        'td' => $validation->getError('td'),
                        'keterangan' => $validation->getError('keterangan'),

                        'waktu' => $validation->getError('waktu'),

                    ]
                ];
            } else {

                $simpandata = [
                    'pasien' => $this->request->getPost('id_pasien'),
                    'dokter' => $this->request->getPost('dokter'),
                    'nomor_surat' => $this->request->getPost('nomor_surat'),
                    'perihal' => $this->request->getPost('perihal'),
                    'tb' => $this->request->getPost('tb'),
                    'bb' => $this->request->getPost('bb'),
                    'gd' => $this->request->getPost('gd'),
                    'td' => $this->request->getPost('td'),
                    'waktu' => $this->request->getPost('waktu'),
                    'keterangan' => $this->request->getPost('keterangan'),
                ];



                $id =  $this->request->getPost('id');


                $this->Kir->update($id, $simpandata);

                $msg = [
                    'sukses' => 'Data Kir berhasil di Update'
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
            $id = $this->request->getVar('id_kir');
            $this->Kir->delete($id);
            $msg = [
                'sukses' => "Data Kir berhasil di hapus"
            ];
            echo json_encode($msg);
        } else {
            exit('maaf data tidak ditemukan');
        }
    }
    public function cetak($id_kir)
    {
        $data = [
            'title' => 'KLINIK DOKTER YANTI | SURAT KETERANGAN SEHAT',
            'id' => $id_kir
        ];
        return view('Page/Kir/Cetak', $data);
    }
}