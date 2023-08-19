<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pertandingan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('Back/Akun/simpandata', ['class' => 'formtambah']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">



                <div class="form-group row">
                    <label style=" color:black;" for="klub1" class="col-sm-2 col-form-label">Klub 1</label>
                    <div class="col-sm-8">
                        <select name="klub1" id="klub2" class="form-control">
                            <option value="">---- Pilih ----</option>
                            <?php
                            $db   = \Config\Database::connect();
                            $dataklub = $db->query("SELECT * from klub");
                            $data = $dataklub->getResult();
                            foreach ($data as $row) {
                            ?>
                                <option style="color:black;" value="<?= $row->id_klub ?>">
                                    <?= $row->nama_klub ?></option>

                            <?php } ?>
                        </select>

                        <div class="invalid-feedback errorklub1">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="klub2" class="col-sm-2 col-form-label">Klub 2</label>
                    <div class="col-sm-8">
                        <select name="klub2" id="klub2" class="form-control">
                            <option value="">---- Pilih ----</option>
                            <?php
                            $db   = \Config\Database::connect();
                            $dataklub = $db->query("SELECT * from klub");
                            $data = $dataklub->getResult();
                            foreach ($data as $row) {
                            ?>
                                <option style="color:black;" value="<?= $row->id_klub ?>">
                                    <?= $row->nama_klub ?></option>

                            <?php } ?>
                        </select>

                        <div class="invalid-feedback errorklub2">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="score1" class="col-sm-2 col-form-label">Score Klub 1</label>
                    <div class="col-sm-8">
                        <input style="color:black;" type="number" name="score1" id="score1" class="form-control">
                        <div class="invalid-feedback errorscore1">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="score2" class="col-sm-2 col-form-label">Score Klub 2</label>
                    <div class="col-sm-8">
                        <input style="color:black;" type="number" name="score2" id="score2" class="form-control">
                        <div class="invalid-feedback errorscore2">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btnsimpan">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">close</button>
                </div>
                <?= form_close() ?>
            </div>

        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".formtambah").submit(function(e) {
                e.preventDefault();
                let form = $('.formtambah')[0];
                let data = new FormData(form);
                $.ajax({
                    type: "post",
                    url: "<?= site_url('Pertandingan/simpandata') ?>",
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    enctype: 'multipart/form-data',
                    dataType: "json",
                    beforeSend: function() {
                        $('.btnsimpan').attr('disable', 'disabled');
                        $('.btnsimpan').html('<i class="fa fa-spin fa-spinner"></i>');
                    },
                    complete: function() {
                        $('.btnsimpan').removeAttr('disable', );
                        $('.btnsimpan').html('Simpan');
                    },
                    success: function(response) {
                        if (response.error) {
                            if (response.error.klub1) {
                                $('#klub1').addClass('is-invalid');
                                $('.errorklub1').html(response.error.klub1);
                            } else {
                                $('#klub1').removeClass('is-invalid');
                                $('.errorklub1').html('');
                            }
                            if (response.error.klub2) {
                                $('#klub2').addClass('is-invalid');
                                $('.errorklub2').html(response.error.klub2);
                            } else {
                                $('#klub2').removeClass('is-invalid');
                                $('.errorklub2').html('');
                            }
                            if (response.error.score1) {
                                $('#score1').addClass('is-invalid');
                                $('.errorscore1').html(response.error.score1);
                            } else {
                                $('#score1').removeClass('is-invalid');
                                $('.errorscore1').html('');
                            }
                            if (response.error.score2) {
                                $('#score2').addClass('is-invalid');
                                $('.errorscore2').html(response.error.score2);
                            } else {
                                $('#score2').removeClass('is-invalid');
                                $('.errorscore2').html('');
                            }

                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.sukses

                            })
                            $('#modaltambah').modal('hide');
                            dataPertandingan();
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
                return false;
            });
        });
    </script>