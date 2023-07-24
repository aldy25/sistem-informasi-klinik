<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data Surat Izin Sakit</title>
    <style>
    table.static {
        position: relative;
        border: 1px solid black;
    }
    </style>
</head>

<body>
    <div class="form-group">
        <h3 align="center">Klinik Pratama Dokter Yanti</h3>
        <p align="center">Laporan Data Surat Izin Sakit</p>
        <table class="static" align="center" rules='all' border="1px" style="width: 95%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Nama Dokter</th>
                    <th>Durasi</th>
                    <th>Waktu Awal</th>
                    <th>Waktu Akhir</th>
                    <th>Keterangan</th>
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
                <tr>
                    <td><?= $a ?></td>
                    <td><?= $pasienn->nama_pasien ?></td>
                    <td><?= $user->nama_user ?></td>
                    <td><?= $row->durasi ?></td>
                    <td><?= $row->waktu_awal ?></td>
                    <td><?= $row->waktu_akhir ?></td>
                    <td><?= $row->keterangan ?></td>

                </tr>

                <?php } ?>
            </tbody>
        </table>
        <div class="container" style="width: 95%;">
            <p align="right">Jambi, <?= date("d M Y") ?></p>
            <p align="right" style="margin-right: 3%">Pemilik</p>
        </div>

    </div>
    <script>
    window.print();
    </script>
</body>

</html>