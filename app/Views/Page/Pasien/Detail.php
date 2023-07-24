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
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="form-group row">
                            <label style=" color:black;" for="nama_pasien" class="col-sm-1 col-form-label">Nama
                                Pasien</label>
                            <div class="col-sm-4">
                                <p class="form-control"><?= $nama_pasien ?></p>

                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group row">
                            <label style=" color:black;" for="nama_pasien" class="col-sm-1 col-form-label">Jenis
                                Kelamin</label>
                            <div class="col-sm-4">
                                <p class="form-control"><?= $jk_pasien ?></p>

                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group row">
                            <label style=" color:black;" for="nama_pasien" class="col-sm-1 col-form-label">Usia</label>
                            <div class="col-sm-3">
                                <p class="form-control"><?= $umur_pasien ?> Tahun</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group row">
                            <label style=" color:black;" for="nama_pasien"
                                class="col-sm-1 col-form-label">Alamat</label>
                            <div class="col-sm-6">
                                <p class="form-control"><?= $alamat_pasien ?> </p>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Data Rekam Medis</h4>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card m-b-30">

            <div class="card-body">
                <div class="card-title">
                    <button style="background-color: green; color:white;" type="button" class="btn btn-sm tomboltambah">
                        <i class="fa fa-plus-circle"></i> Tambah Data Rekam Medis
                    </button>
                </div>
                <p class="card-text viewdata">

                </p>

            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Data Riwayat Transaksi</h4>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card m-b-30">

            <div class="card-body">
                <div class="card-title">
                    <div class="btn-group">
                        <button style="background-color: green; color:white;" type="button"
                            class="btn btn-light dropdown-toggle waves-effect" data-toggle="dropdown"
                            aria-expanded="false"> Tambah Transaksi <span class="caret"></span> </button>
                        <div class="dropdown-menu" x-placement="bottom-start"
                            style="position: absolute; transform: translate3d(0px, 36px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <button style="background-color: green; color:white;" type="button"
                                class="dropdown-item btn btn-sm antigen">
                                <i class="fa fa-plus-circle"></i> Tes Antigen
                            </button>
                            <button style="background-color: green; color:white;" type="button"
                                class="dropdown-item btn btn-sm kb">
                                <i class="fa fa-plus-circle"></i> Pasang Kb
                            </button>
                            <button style="background-color: green; color:white;" type="button"
                                class="dropdown-item btn btn-sm kir">
                                <i class="fa fa-plus-circle"></i> Surat Keterangan Sehat
                            </button>
                            <button style="background-color: green; color:white;" type="button"
                                class="dropdown-item btn btn-sm vitamin">
                                <i class="fa fa-plus-circle"></i> Suntik Vitamin
                            </button>
                            <button style="background-color: green; color:white;" type="button"
                                class="dropdown-item btn btn-sm sakit">
                                <i class="fa fa-plus-circle"></i> Surat Izin Sakit
                            </button>
                            <button style="background-color: green; color:white;" type="button"
                                class="dropdown-item btn btn-sm operasi">
                                <i class="fa fa-plus-circle"></i> Operasi Kecil
                            </button>
                            <button style="background-color: green; color:white;" type="button"
                                class="dropdown-item btn btn-sm jahit">
                                <i class="fa fa-plus-circle"></i> Jahit Luka
                            </button>
                            <button style="background-color: green; color:white;" type="button"
                                class="dropdown-item btn btn-sm kolestrol">
                                <i class="fa fa-plus-circle"></i> Cek Kolestrol
                            </button>
                            <button style="background-color: green; color:white;" type="button"
                                class="dropdown-item btn btn-sm asamurat">
                                <i class="fa fa-plus-circle"></i> Cek Asam Urat
                            </button>
                            <button style="background-color: green; color:white;" type="button"
                                class="dropdown-item btn btn-sm sunat">
                                <i class="fa fa-plus-circle"></i> Sunat
                            </button>
                        </div>
                    </div>

                </div>
                <p class="card-text viewdataa">

                </p>

            </div>
        </div>
    </div>
</div>
<div class="viewmodall" style="display: none;">

</div>

<script>
function dataAdmin() {
    $.ajax({
        url: "<?= base_url() ?>/Detailrm/<?= $id_pasien ?>",
        dataType: "json",
        success: function(response) {
            $('.viewdata').html(response.data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
}

function dataTransaksi() {
    $.ajax({
        url: "<?= base_url() ?>/Detailtransaksi/<?= $id_pasien ?>",
        dataType: "json",
        success: function(response) {
            $('.viewdataa').html(response.data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    });
}

$(document).ready(function() {
    dataAdmin();
    dataTransaksi();
    $('.tomboltambah').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url() ?>/formtambahrm/<?= $id_pasien ?>",
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodall').html(response.sukses).show();
                    $('#modaltambah').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    });
    $('.antigen').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url() ?>/tambah_antigen/<?= $id_pasien ?>",
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodall').html(response.sukses).show();
                    $('#modaltambah').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    });
    $('.kb').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url() ?>/tambahkb/<?= $id_pasien ?>",
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodall').html(response.sukses).show();
                    $('#modaltambah').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    });
    $('.kir').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url() ?>/tambahkir/<?= $id_pasien ?>",
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodall').html(response.sukses).show();
                    $('#modaltambah').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    });
    $('.vitamin').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url() ?>/tambahvitamin/<?= $id_pasien ?>",
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodall').html(response.sukses).show();
                    $('#modaltambah').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    });
    $('.sakit').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url() ?>/tambahsakit/<?= $id_pasien ?>",
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodall').html(response.sukses).show();
                    $('#modaltambah').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    });
    $('.operasi').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url() ?>/tambahoperasi/<?= $id_pasien ?>",
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodall').html(response.sukses).show();
                    $('#modaltambah').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    });
    $('.jahit').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url() ?>/tambahjahit/<?= $id_pasien ?>",
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodall').html(response.sukses).show();
                    $('#modaltambah').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    });
    $('.kolestrol').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url() ?>/tambahkolestrol/<?= $id_pasien ?>",
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodall').html(response.sukses).show();
                    $('#modaltambah').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    });
    $('.asamurat').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url() ?>/tambahasamurat/<?= $id_pasien ?>",
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodall').html(response.sukses).show();
                    $('#modaltambah').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    });
    $('.sunat').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url() ?>/tambahsunat/<?= $id_pasien ?>",
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodall').html(response.sukses).show();
                    $('#modaltambah').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    });
});
</script>
<?= $this->endsection() ?>