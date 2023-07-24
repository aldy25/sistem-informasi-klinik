<?php
$this->db = \config\Database::connect();
$query_surat = $this->db->query("SELECT * from tbl_kir  WHERE id_kir='$id'");
$surat_row = $query_surat->getRow();
$pasien = $surat_row->pasien;
$query_pasien = $this->db->query("SELECT * from tbl_pasien  WHERE id_pasien='$pasien'");
$pasien_row = $query_pasien->getRow();
$dokter = $surat_row->dokter;
$query_dokter = $this->db->query("SELECT * from tbl_user  WHERE id_user='$dokter'");
$dokter_row = $query_dokter->getRow();
?>

<head>
    <title><?= $title; ?></title>
    <link rel="icon" href="<?= base_url() ?>/assets/images/logo.png">
</head>
<div id="surat">
    <h3 style="line-height: 1px;" align="center">KLINIK PRATAMA DOKTER YANTI</h3>
    <p style="line-height: 1px; font-style: italic;" align="center">Jl. Sersan Darphin No.96, Eka Jaya, Kec.
        Palmerah, Kota Jambi, Jambi</p>
    <hr>
    <div id="nomer_surat">
        <div class="nama_surat">Surat Keterangan Sehat</div>
        <div>No : <?= $surat_row->nomor_surat ?> </div>
    </div>
    <div id="par_pembuka">
        Dengan ini menerangkan bahwa berdasarkan hasil pemeriksaan yang telah dilakukan
        kepada pasien :
    </div>
    <div id="content_surat">
        <div>
            <label class="l_form">Nama
            </label>
            <label class="isian_surat">: <?php echo $pasien_row->nama_pasien ?></label>
        </div>
        <div>
            <label class="l_form">Jenis Kelamin
            </label>
            <label class="isian_surat">: <?php echo $pasien_row->jk_pasien ?></label>
        </div>
        <div>
            <label class="l_form">Umur
            </label>
            <label class="isian_surat">: <?php echo $pasien_row->umur_pasien ?></label>
        </div>
        <div>
            <label class="l_form">Alamat
            </label>
            <label class="isian_surat">: <?php echo $pasien_row->alamat_pasien  ?></label>
        </div>
        <div>
            <label class="l_form">Keterangan
            </label>
            <span class="isian_surat">: <?php echo $surat_row->keterangan  ?></span>
        </div>
    </div>


    <div id="par_penutup">
        Pada Tanggal <?= $surat_row->waktu ?> Telah diperiksa kesehatanya dan dinyatakan <i
            style="font-weight: bold;">SEHAT</i>
        Untuk Keperluan <?= $surat_row->perihal ?>
    </div>
    <div id="content_surat">
        <div>
            <label class="l_form">Tinggi Badan
            </label>
            <label class="isian_surat">: <?php echo $surat_row->tb ?> CM</label>
        </div>
        <div>
            <label class="l_form">Berat Badan
            </label>
            <label class="isian_surat">: <?php echo $surat_row->bb ?> KG</label>
        </div>
        <div>
            <label class="l_form">Golongan Darah
            </label>
            <label class="isian_surat">: <?php echo $surat_row->gd ?></label>
        </div>
        <div>
            <label class="l_form">Tekanan Darah
            </label>
            <label class="isian_surat">: <?php echo $surat_row->td  ?> mmHg</label>
        </div>

    </div>
    <div class="container" style="width: 95%;">
        <p align="right">Jambi, <?= date("d M Y") ?></p>
        <p style="margin-top:50px; margin-right: 3%" align="right"><?= $dokter_row->nama_user ?></p>
    </div>
</div>
<script>
window.print();
</script>
<style>
#nomer_surat {
    text-align: center;
}

.nama_surat {
    text-transform: uppercase;
    text-decoration: underline;
    font-weight: bolder;
}



#surat div {
    margin: 4px;
}

#par_pembuka {
    text-align: justify;
}

#content_surat {
    position: auto;
    overflow: auto;
    padding-left: 30px;
}

#content_surat div {
    position: relative;
    padding: 1px;
}

.isian_surat {
    position: absolute;
    left: 170px;
    width: auto;
}
</style>