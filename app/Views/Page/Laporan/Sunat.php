<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data Sunat</title>
    <link rel="icon" href="<?= base_url() ?>/assets/images/logo.png">
    <style>
    table.static {
        position: relative;
        border: 1px solid black;
    }
    </style>
</head>

<body>
    <div class="form-group">
        <h3 style="line-height: 1px;" align="center">KLINIK PRATAMA DOKTER YANTI</h3>
        <p style="line-height: 1px; font-style: italic;" align="center">Jl. Sersan Darphin No.96, Eka Jaya, Kec.
            Palmerah, Kota Jambi, Jambi</p>
        <hr>
        <h3 align="center">Laporan Data Sunat</h3>
        <table class="static" align="center" rules='all' border="1px" style="width: 95%;">
            <thead>
                <tr style="text-align: center;">
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Nama Dokter</th>
                    <th>Jenis Sunat</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $a = 0;
                $this->db = \config\Database::connect();
                foreach ($tampildata as $row) {
                    $a++;
                    $pas = $row->pasien;

                    $dok = $row->dokter;
                    $pasien = $this->db->query("SELECT * from tbl_pasien  WHERE id_pasien='$pas'");
                    $pasienn = $pasien->getRow();


                    $dokter = $this->db->query("SELECT * from tbl_user  WHERE id_user='$dok'");
                    $user = $dokter->getRow();
                ?>
                <tr style="text-align: center;">
                    <td><?= $a ?></td>
                    <td><?= $pasienn->nama_pasien ?></td>
                    <td><?= $user->nama_user ?></td>
                    <td><?= $row->jenis_sunat ?></td>
                    <td><?= $row->keterangan ?></td>
                    <td><?= $row->waktu ?></td>
                </tr>

                <?php } ?>
            </tbody>
        </table>
        <div class="container" style="width: 95%;">
            <p align="right">Jambi, <?= date("d M Y") ?></p>
            <p align="right" style="margin-right: 3%;margin-top:50px;">Pemilik</p>
        </div>

    </div>
    <script>
    window.print();
    </script>
</body>

</html>