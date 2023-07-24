<?= $this->extend('Base/Main') ?>
<?= $this->section('Menu') ?>
<?php
$session = \config\services::session();
$this->db = \config\Database::connect();
$level = $session->get('level');
$id_user = $session->get('id_user');
$query_cekuser = $this->db->query("SELECT * from tbl_user  WHERE id_user='$id_user'");
$row = $query_cekuser->getRow();
$role1 = $row->role1;
$role2 = $row->role2;
if ($level == 'Web Master') {
?>
    <li>
        <a href="<?= base_url() ?>/Beranda" class="waves-effect">
            <i class="mdi mdi-airplay"></i>
            <span> BERANDA <span class="badge badge-pill badge-primary float-right"></span></span>
        </a>
    </li>

    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account"></i> <span> AKUN </span>
            <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled">
            <li>
                <a href="<?= base_url() ?>/View-akun">
                    <i class="mdi mdi-checkbox-blank-circle-outline"></i> DATA AKUN
                </a>
            </li>
        </ul>

    </li>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-database"></i> <span> TRANSAKSI </span>
            <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled">

            <li>
                <a href="<?= base_url() ?>/Riwayat">
                    <i class="mdi mdi-checkbox-blank-circle-outline"></i> RIWAYAT TRANSAKSI
                </a>
            </li>
        </ul>

    </li>
    </li>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-file-document"></i> <span> LAPORAN </span>
            <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled">
            <li>
                <a href="<?= base_url() ?>/Laporan">
                    <i class="mdi mdi-checkbox-blank-circle-outline"></i> CETAK LAPORAN
                </a>
            </li>
        </ul>

    </li>
<?php

} elseif ($level == 'Administrator') {
?>
    <li>
        <a href="<?= base_url() ?>/Beranda" class="waves-effect">
            <i class="mdi mdi-airplay"></i>
            <span> BERANDA <span class="badge badge-pill badge-primary float-right"></span></span>
        </a>
    </li>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-folder-multiple"></i> <span> MASTER DATA
            </span>
            <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled">
            <li>
                <a href="<?= base_url() ?>/View-pasien">
                    <i class="mdi mdi-checkbox-blank-circle-outline"></i> PASIEN
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>/View-antigen">
                    <i class="mdi mdi-checkbox-blank-circle-outline"></i> ANTIGEN
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>/View-kb">
                    <i class="mdi mdi-checkbox-blank-circle-outline"></i> KB
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>/View-kir">
                    <i class="mdi mdi-checkbox-blank-circle-outline"></i> KIR
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>/View-Vitamin">
                    <i class="mdi mdi-checkbox-blank-circle-outline"></i> S.VITAMIN
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>/View-sakit">
                    <i class="mdi mdi-checkbox-blank-circle-outline"></i> S.IZIN SAKIT
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>/View-operasi">
                    <i class="mdi mdi-checkbox-blank-circle-outline"></i> OPERASI KECIL
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>/View-jahit">
                    <i class="mdi mdi-checkbox-blank-circle-outline"></i> JAHIT LUKA
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>/View-kolestrol">
                    <i class="mdi mdi-checkbox-blank-circle-outline"></i> CEK KOLESTROL
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>/View-asamurat">
                    <i class="mdi mdi-checkbox-blank-circle-outline"></i> CEK ASAM URAT
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>/View-sunat">
                    <i class="mdi mdi-checkbox-blank-circle-outline"></i> SUNAT
                </a>
            </li>

            <li>
                <a href="<?= base_url() ?>/View-layanan">
                    <i class="mdi mdi-checkbox-blank-circle-outline"></i> LAYANAN
                </a>
            </li>
        </ul>

    </li>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-database"></i> <span> TRANSAKSI </span>
            <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled">
            <li>
                <a href="<?= base_url() ?>/Antrian">
                    <i class="mdi mdi-checkbox-blank-circle-outline"></i> ANTRIAN TRANSAKSI
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>/Riwayat">
                    <i class="mdi mdi-checkbox-blank-circle-outline"></i> RIWAYAT TRANSAKSI
                </a>
            </li>
        </ul>

    </li>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-file-document"></i> <span> LAPORAN </span>
            <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled">
            <li>
                <a href="<?= base_url() ?>/Laporan">
                    <i class="mdi mdi-checkbox-blank-circle-outline"></i> CETAK LAPORAN
                </a>
            </li>
        </ul>

    </li>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-plus-circle"></i> <span> BEROBAT </span>
            <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled">
            <li>
                <?php

                if ($role1 == 'Dokter') {
                ?>

                    <a href="<?= base_url() ?>/Berobatt">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i>ANTRIAN BEROBAT
                    </a>
                <?php
                }
                ?>
                <?php
                if ($role2 == 'Dokter') {
                ?>
                    <a href="<?= base_url() ?>/Berobatt">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i>ANTRIAN BEROBAT
                    </a>
                <?php
                }
                ?>
                <a href="<?= base_url() ?>/Proses-berobat">
                    <i class="mdi mdi-checkbox-blank-circle-outline"></i> PROSES BEROBAT
                </a>
            </li>
        </ul>

    </li>

    <?php
    if ($role1 == 'Apoteker') {
    ?>

        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-plus-box"></i> <span> OBAT </span>
                <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li>
                    <a href="<?= base_url() ?>/View-obat-masuk">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> OBAT MASUK
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-obat-keluar">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> OBAT KELUAR
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-obat">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> STOK OBAT
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/Antrian-obat">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> ANTRIAN OBAT
                    </a>
                </li>
            </ul>

        </li>


    <?php } ?>
    <?php
    if ($role2 == 'Apoteker') {
    ?>

        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-plus-box"></i> <span> OBAT </span>
                <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li>
                    <a href="<?= base_url() ?>/View-obat-masuk">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> OBAT MASUK
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-obat-keluar">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> OBAT KELUAR
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-obat">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> STOK OBAT
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/Antrian-obat">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> ANTRIAN OBAT
                    </a>
                </li>
            </ul>

        </li>

    <?php

    }
    ?>
<?php

} elseif ($level == 'Apoteker') {
?>
    <li>
        <a href="<?= base_url() ?>/Beranda" class="waves-effect">
            <i class="mdi mdi-airplay"></i>
            <span> BERANDA <span class="badge badge-pill badge-primary float-right"></span></span>
        </a>
    </li>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-plus-box"></i> <span> OBAT </span>
            <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled">
            <li>
                <a href="<?= base_url() ?>/View-obat-masuk">
                    <i class="mdi mdi-checkbox-blank-circle-outline"></i> OBAT MASUK
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>/View-obat-keluar">
                    <i class="mdi mdi-checkbox-blank-circle-outline"></i> OBAT KELUAR
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>/View-obat">
                    <i class="mdi mdi-checkbox-blank-circle-outline"></i> STOK OBAT
                </a>
            </li>
            <li>
                <a href="<?= base_url() ?>/Antrian-obat">
                    <i class="mdi mdi-checkbox-blank-circle-outline"></i> ANTRIAN OBAT
                </a>
            </li>
        </ul>

    </li>
    <?php
    if ($role1 == 'Administrator') {
    ?>

        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-folder-multiple"></i> <span> MASTER DATA
                </span>
                <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li>
                    <a href="<?= base_url() ?>/View-pasien">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> PASIEN
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-antigen">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> ANTIGEN
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-kb">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> KB
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-kir">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> KIR
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-Vitamin">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> S.VITAMIN
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-sakit">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> S.IZIN SAKIT
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-operasi">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> OPERASI KECIL
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-jahit">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> JAHIT LUKA
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-kolestrol">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> CEK KOLESTROL
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-asamurat">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> CEK ASAM URAT
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-sunat">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> SUNAT
                    </a>
                </li>

                <li>
                    <a href="<?= base_url() ?>/View-layanan">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> LAYANAN
                    </a>
                </li>
            </ul>

        </li>

        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-plus-circle"></i> <span> BEROBAT </span>
                <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li>
                    <a href="<?= base_url() ?>/Proses-berobat">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> PROSES BEROBAT
                    </a>


                </li>
            </ul>

        </li>
        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-database"></i> <span> TRANSAKSI </span>
                <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li>
                    <a href="<?= base_url() ?>/Antrian">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> ANTRIAN TRANSAKSI
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/Riwayat">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> RIWAYAT TRANSAKSI
                    </a>
                </li>
            </ul>

        </li>
        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-file-document"></i> <span> LAPORAN </span>
                <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li>
                    <a href="<?= base_url() ?>/Laporan">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> CETAK LAPORAN
                    </a>
                </li>
            </ul>

        </li>

    <?php

    } elseif ($role1 == 'Dokter') {
    ?>


        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-plus-circle"></i> <span> BEROBAT </span>
                <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li>
                    <a href="<?= base_url() ?>/Berobat">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> ANTRIAN BEROBAT
                    </a>
                </li>
            </ul>

        </li>
    <?php
    }
    ?>

    <?php
    if ($role2 == 'Administrator') {
    ?>

        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-folder-multiple"></i> <span> MASTER DATA
                </span>
                <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li>
                    <a href="<?= base_url() ?>/View-pasien">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> PASIEN
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-antigen">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> ANTIGEN
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-kb">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> KB
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-kir">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> KIR
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-Vitamin">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> S.VITAMIN
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-sakit">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> S.IZIN SAKIT
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-operasi">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> OPERASI KECIL
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-jahit">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> JAHIT LUKA
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-kolestrol">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> CEK KOLESTROL
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-asamurat">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> CEK ASAM URAT
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-sunat">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> SUNAT
                    </a>
                </li>

                <li>
                    <a href="<?= base_url() ?>/View-layanan">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> LAYANAN
                    </a>
                </li>
            </ul>

        </li>

        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-plus-circle"></i> <span> BEROBAT </span>
                <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li>
                    <a href="<?= base_url() ?>/Proses-berobat">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> PROSES BEROBAT
                    </a>


                </li>
            </ul>

        </li>
        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-database"></i> <span> TRANSAKSI </span>
                <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li>
                    <a href="<?= base_url() ?>/Antrian">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> ANTRIAN TRANSAKSI
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/Riwayat">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> RIWAYAT TRANSAKSI
                    </a>
                </li>
            </ul>

        </li>
        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-file-document"></i> <span> LAPORAN </span>
                <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li>
                    <a href="<?= base_url() ?>/Laporan">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> CETAK LAPORAN
                    </a>
                </li>
            </ul>

        </li>
    <?php

    } elseif ($role2 == 'Dokter') {
    ?>


        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-plus-circle"></i> <span> BEROBAT </span>
                <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li>
                    <a href="<?= base_url() ?>/Berobat">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> ANTRIAN BEROBAT
                    </a>
                </li>
            </ul>

        </li>
    <?php
    }
    ?>
<?php
} else {
?>
    <li>
        <a href="<?= base_url() ?>/Beranda" class="waves-effect">
            <i class="mdi mdi-airplay"></i>
            <span> BERANDA <span class="badge badge-pill badge-primary float-right"></span></span>
        </a>
    </li>

    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-plus-circle"></i> <span> BEROBAT </span>
            <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled">
            <li>
                <a href="<?= base_url() ?>/Berobat">
                    <i class="mdi mdi-checkbox-blank-circle-outline"></i> ANTRIAN BEROBAT
                </a>
            </li>
        </ul>

    </li>
    <?php
    if ($role1 == 'Administrator') {
    ?>

        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-folder-multiple"></i> <span> MASTER DATA
                </span>
                <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li>
                    <a href="<?= base_url() ?>/View-pasien">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> PASIEN
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-antigen">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> ANTIGEN
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-kb">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> KB
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-kir">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> KIR
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-Vitamin">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> S.VITAMIN
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-sakit">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> S.IZIN SAKIT
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-operasi">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> OPERASI KECIL
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-jahit">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> JAHIT LUKA
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-kolestrol">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> CEK KOLESTROL
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-asamurat">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> CEK ASAM URAT
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-sunat">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> SUNAT
                    </a>
                </li>

                <li>
                    <a href="<?= base_url() ?>/View-layanan">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> LAYANAN
                    </a>
                </li>
            </ul>

        </li>

        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-plus-circle"></i> <span> BEROBAT </span>
                <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li>
                    <a href="<?= base_url() ?>/Proses-berobat">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> PROSES BEROBAT
                    </a>


                </li>
            </ul>

        </li>
        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-database"></i> <span> TRANSAKSI </span>
                <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li>
                    <a href="<?= base_url() ?>/Antrian">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> ANTRIAN TRANSAKSI
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/Riwayat">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> RIWAYAT TRANSAKSI
                    </a>
                </li>
            </ul>

        </li>
        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-file-document"></i> <span> LAPORAN </span>
                <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li>
                    <a href="<?= base_url() ?>/Laporan">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> CETAK LAPORAN
                    </a>
                </li>
            </ul>

        </li>

    <?php

    } elseif ($role1 == 'Apoteker') {
    ?>


        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-plus-box"></i> <span> OBAT </span>
                <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li>
                    <a href="<?= base_url() ?>/View-obat-masuk">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> OBAT MASUK
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-obat-keluar">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> OBAT KELUAR
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-obat">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> STOK OBAT
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/Antrian-obat">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> ANTRIAN OBAT
                    </a>
                </li>
            </ul>

        </li>
    <?php
    }
    ?>

    <?php
    if ($role2 == 'Administrator') {
    ?>

        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-folder-multiple"></i> <span> MASTER DATA
                </span>
                <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li>
                    <a href="<?= base_url() ?>/View-pasien">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> PASIEN
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-antigen">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> ANTIGEN
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-kb">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> KB
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-kir">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> KIR
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-Vitamin">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> S.VITAMIN
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-sakit">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> S.IZIN SAKIT
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-operasi">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> OPERASI KECIL
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-jahit">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> JAHIT LUKA
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-kolestrol">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> CEK KOLESTROL
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-asamurat">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> CEK ASAM URAT
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-sunat">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> SUNAT
                    </a>
                </li>

                <li>
                    <a href="<?= base_url() ?>/View-layanan">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> LAYANAN
                    </a>
                </li>
            </ul>

        </li>

        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-plus-circle"></i> <span> BEROBAT </span>
                <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li>
                    <a href="<?= base_url() ?>/Proses-berobat">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> PROSES BEROBAT
                    </a>


                </li>
            </ul>

        </li>
        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-database"></i> <span> TRANSAKSI </span>
                <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li>
                    <a href="<?= base_url() ?>/Antrian">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> ANTRIAN TRANSAKSI
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/Riwayat">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> RIWAYAT TRANSAKSI
                    </a>
                </li>
            </ul>

        </li>
        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-file-document"></i> <span> LAPORAN </span>
                <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li>
                    <a href="<?= base_url() ?>/Laporan">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> CETAK LAPORAN
                    </a>
                </li>
            </ul>

        </li>
    <?php

    } elseif ($role2 == 'Apoteker') {
    ?>


        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-plus-box"></i> <span> OBAT </span>
                <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
                <li>
                    <a href="<?= base_url() ?>/View-obat-masuk">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> OBAT MASUK
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-obat-keluar">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> OBAT KELUAR
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/View-obat">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> STOK OBAT
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/Antrian-obat">
                        <i class="mdi mdi-checkbox-blank-circle-outline"></i> ANTRIAN OBAT
                    </a>
                </li>
            </ul>

        </li>
    <?php
    }
    ?>
<?php
}
?>




<?= $this->endsection() ?>