<?= $this->extend('Base/Main') ?>
<?= $this->extend('Base/Menu') ?>
<?= $this->section('Konten') ?>
<!-- DataTables -->
<link href="<?= base_url() ?>https://cdn.datatable.net/rowreoder/1.2.7/css/rowreoder.datatable.min.css" rel="stylesheet"
    type="text/css" />
<link href="<?= base_url() ?>https://cdn.datatable.net/responsive/2.2.5/css/responsive.datatable.min.css"
    rel="stylesheet" type="text/css" />

<link href="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"
    type="text/css" />
<link href="<?= base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/js/webcam.min.js"></script>
<div class="row">
    <div class="col-sm-12">
        <div class="card m-b-30">

            <div class="card-body">
                <div class="card-title">
                    <h5>Laporan Data Arsip</h5>
                </div>
                <p class="card-text ">
                <form action="<?= base_url(); ?>/Back/Laporan/proses" target="_blank" method="post">
                    <div class="form-group row">
                        <div class="col-sm-1">
                            <label style=" color:black;">Waktu
                                Awal</label>
                        </div>
                        <div class="col-sm-2">

                            <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control">
                            <div class="invalid-feedback errortanggal_awal">
                            </div>
                        </div>

                        <div class="col-sm-1">
                            <label style=" color:black;">Waktu
                                Akhir</label>
                        </div>

                        <div class="col-sm-2">

                            <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control">
                            <div class="invalid-feedback errortanggal_akhir">
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <label style=" color:black;">Jenis Laporan</label>
                        </div>

                        <div class="col-sm-2">
                            <select class="form-control" name="jenis_laporan" id="jenis_laporan">
                                <option value="1">Laporan Transaksi</option>
                                <option value="2">Laporan Data Rekam Medis</option>
                                <option value="3">Laporan Data Tes Antigen</option>
                                <option value="4">Laporan Data Suntik Kb</option>
                                <option value="5">Laporan Data Kir</option>
                                <option value="6">Laporan Data Suntik Vitamin</option>
                                <option value="7">Laporan Data Surat Izin Sakit</option>
                                <option value="8">Laporan Data Operasi Kecil</option>
                                <option value="9">Laporan Data Jahit Luka</option>
                                <option value="10">Laporan Data Cek Kolestrol</option>
                                <option value="11">Laporan Data Asam Urat</option>
                                <option value="12">Laporan Data Sunat</option>
                                <option value="13">Laporan Data Obat Keluar</option>
                                <option value="14">Laporan Data Obat Masuk</option>
                            </select>

                            <div class="invalid-feedback errorjenis_laporan">
                            </div>
                        </div>
                        <div class="col-sm-3 mt-1">
                            <button type="submit" class="btn btn-warning btnsimpan"><i class="mdi mdi-printer "></i>
                                Cetak
                                Laporan</button>

                        </div>
                    </div>
                </form>

                </p>

            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div style="align-items: center;" class="card-title">
                    <h5>Laporan Data Tunggal</h5>
                </div>
                <p class="card-text ">
                <div class="form-group row">
                    <div class="col-sm-3 mt-1">
                        <a href="<?= base_url() ?>/Back/Laporan/pasien" target="_blank"
                            class="btn btn-warning btnsimpan"><i class="mdi mdi-printer "></i>
                            Data Pasien</a>

                    </div>
                    <div class="col-sm-3 mt-1">
                        <a href="<?= base_url() ?>/Back/Laporan/obat" target="_blank"
                            class="btn btn-warning btnsimpan"><i class="mdi mdi-printer "></i>
                            Data Stock Obat</a>

                    </div>
                </div>
                </p>

            </div>

        </div>
    </div>
</div>



<?= $this->endsection() ?>