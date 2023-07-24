<?php

namespace App\Controllers\back;

use App\Controllers\BaseController;
use Config\Services;


class Laporan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'KLINIK DOKTER YANTI | CETAK LAPORAN',
            'page' => 'LAPORAN'
        ];
        return view('Page/Laporan/Cetak', $data);
    }

    public function cetak()
    {
        $tanggal = $this->request->getPost('tanggal_awal');
        var_dump($tanggal);
    }

    public function proses()
    {
        $tanggal_awal = $this->request->getPost('tanggal_awal');
        $tanggal_akhir = $this->request->getPost('tanggal_akhir');
        $jenis_laporan = $this->request->getPost('jenis_laporan');
        $this->db = \config\Database::connect();
        if ($jenis_laporan == 1) {
            $query_cekuser = $this->db->query("SELECT * FROM `tbl_riwayat_transaksi` WHERE NOT total_bayar =''AND waktu BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
            $transaksi = $query_cekuser->getResult();
            $data = [
                'tampildata' => $transaksi,

            ];
            return view('Page/Laporan/Transaksi', $data);
        } elseif ($jenis_laporan == 2) {
            $query_cekuser = $this->db->query("SELECT * FROM `tbl_rekam_medis` WHERE NOT diagnosa =''AND waktu BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
            $transaksi = $query_cekuser->getResult();
            $data = [
                'tampildata' => $transaksi,

            ];
            return view('Page/Laporan/Rm', $data);
        } elseif ($jenis_laporan == 3) {
            $query_cekuser = $this->db->query("SELECT * FROM `tbl_antigen` WHERE  waktu BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
            $transaksi = $query_cekuser->getResult();
            $data = [
                'tampildata' => $transaksi,

            ];
            return view('Page/Laporan/Antigen', $data);
        } elseif ($jenis_laporan == 4) {
            $query_cekuser = $this->db->query("SELECT * FROM `tbl_kb` WHERE  waktu BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
            $transaksi = $query_cekuser->getResult();
            $data = [
                'tampildata' => $transaksi,

            ];
            return view('Page/Laporan/Kb', $data);
        } elseif ($jenis_laporan == 5) {
            $query_cekuser = $this->db->query("SELECT * FROM `tbl_kir` WHERE  waktu BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
            $transaksi = $query_cekuser->getResult();
            $data = [
                'tampildata' => $transaksi,

            ];
            return view('Page/Laporan/Kir', $data);
        } elseif ($jenis_laporan == 6) {
            $query_cekuser = $this->db->query("SELECT * FROM `tbl_vitamin` WHERE  waktu BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
            $transaksi = $query_cekuser->getResult();
            $data = [
                'tampildata' => $transaksi,

            ];
            return view('Page/Laporan/Vitamin', $data);
        } elseif ($jenis_laporan == 7) {
            $query_cekuser = $this->db->query("SELECT * FROM `tbl_izin_sakit` WHERE  waktu_awal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
            $transaksi = $query_cekuser->getResult();
            $data = [
                'tampildata' => $transaksi,

            ];
            return view('Page/Laporan/Sakit', $data);
        } elseif ($jenis_laporan == 8) {
            $query_cekuser = $this->db->query("SELECT * FROM `tbl_operasi` WHERE  waktu BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
            $transaksi = $query_cekuser->getResult();
            $data = [
                'tampildata' => $transaksi,

            ];
            return view('Page/Laporan/Operasi', $data);
        } elseif ($jenis_laporan == 9) {
            $query_cekuser = $this->db->query("SELECT * FROM `tbl_jahit` WHERE  waktu BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
            $transaksi = $query_cekuser->getResult();
            $data = [
                'tampildata' => $transaksi,

            ];
            return view('Page/Laporan/Jahit', $data);
        } elseif ($jenis_laporan == 10) {
            $query_cekuser = $this->db->query("SELECT * FROM `tbl_kolestrol` WHERE  waktu BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
            $transaksi = $query_cekuser->getResult();
            $data = [
                'tampildata' => $transaksi,

            ];
            return view('Page/Laporan/Kolestrol', $data);
        } elseif ($jenis_laporan == 11) {
            $query_cekuser = $this->db->query("SELECT * FROM `tbl_asamurat` WHERE  waktu BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
            $transaksi = $query_cekuser->getResult();
            $data = [
                'tampildata' => $transaksi,

            ];
            return view('Page/Laporan/Asamurat', $data);
        } elseif ($jenis_laporan == 12) {
            $query_cekuser = $this->db->query("SELECT * FROM `tbl_sunat` WHERE  waktu BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
            $transaksi = $query_cekuser->getResult();
            $data = [
                'tampildata' => $transaksi,

            ];
            return view('Page/Laporan/Sunat', $data);
        } elseif ($jenis_laporan == 13) {
            $query_cekuser = $this->db->query("SELECT * FROM `tbl_obat_keluar` WHERE  tanggal_keluar BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
            $transaksi = $query_cekuser->getResult();
            $data = [
                'tampildata' => $transaksi,

            ];
            return view('Page/Laporan/Keluar', $data);
        } elseif ($jenis_laporan == 14) {
            $query_cekuser = $this->db->query("SELECT * FROM `tbl_obat_masuk` WHERE  tanggal_masuk BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
            $transaksi = $query_cekuser->getResult();
            $data = [
                'tampildata' => $transaksi,

            ];
            return view('Page/Laporan/Masuk', $data);
        } else {
            echo "data tidak ada";
        }
    }
    public function pasien()
    {

        $this->db = \config\Database::connect();
        $query_cekuser = $this->db->query("SELECT * FROM `tbl_pasien`");
        $transaksi = $query_cekuser->getResult();
        $data = [
            'tampildata' => $transaksi,

        ];
        return view('Page/Laporan/Pasien', $data);
    }

    public function obat()
    {
        $this->db = \config\Database::connect();
        $query_cekuser = $this->db->query("SELECT * FROM `tbl_obat`");
        $transaksi = $query_cekuser->getResult();
        $data = [
            'tampildata' => $transaksi,

        ];
        return view('Page/Laporan/Obat', $data);
    }
}