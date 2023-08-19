<!-- Modal -->
<div class="modal fade" id="modaltambahbanyak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                <div style="display: none;" class="form-group row">

                    <div class="col-sm-8">
                        <input style="color:black;" type="text" name="pesan" id="pesan" class="form-control">
                        <div class="invalid-feedback errorpesan">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label style=" color:black;" for="keterangan" class="col-sm-2 col-form-label">Tambah Banyak </label>

                    <div class="col-sm-8">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>Klub 1</th>
                                    <th>Klub 2</th>
                                    <th>Score 1</th>
                                    <th>Score 2</th>

                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody class="formtambahh">
                                <tr>

                                    <td>
                                        <select required="" name="klub1[]" id="klub1" class="form-control">
                                            <option style="color:black;" value="">----PILIH----</option>
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

                                    </td>
                                    <td>
                                        <select required="" name="klub2[]" id="klub2" class="form-control">
                                            <option style="color:black;" value="">----PILIH----</option>
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
                                    </td>
                                    <td>
                                        <div class="form-group row">
                                            <div class="col-sm-8">
                                                <input style="color:black;" type="number" name="score1" id="score1" class="form-control">

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group row">

                                            <div class="col-sm-8">
                                                <input style="color:black;" type="number" name="score2" id="score2" class="form-control">

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btnaddform">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
            $('.btnaddform').click(function(e) {
                e.preventDefault();
                $('.formtambahh').append(`
                <tr>
                                <td>
                                        <select required="" name="klub1[]" id="klub1" class="form-control">
                                            <option style="color:black;" value="">----PILIH----</option>
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
                                     
                                    </td>
                           
                                <td>
                                        <select required="" name="klub2[]" id="klub2" class="form-control">
                                            <option style="color:black;" value="">----PILIH----</option>
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
                                     
                                    </td>
                           
                                     <td>
                                        <div class="form-group row">
                                            <div class="col-sm-8">
                                                <input style="color:black;" type="number" name="score1" id="score1" class="form-control">

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group row">

                                            <div class="col-sm-8">
                                                <input style="color:black;" type="number" name="score2" id="score2" class="form-control">

                                            </div>
                                        </div>
                                    </td>

                                
                                    <td>           
                <button type="button" class="btn btn-danger btnhapusform">
                    <i class="fa fa-trash"></i>
                </button>
            </td>

        </tr>
            `);
            });
            $(".formtambah").submit(function(e) {
                e.preventDefault();
                let form = $('.formtambah')[0];
                let data = new FormData(form);
                $.ajax({
                    type: "post",
                    url: "<?= site_url('Pertandingan/simpandatabanyak') ?>",
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
                            if (response.error.pesan) {
                                $('#pesan').addClass('is-invalid');
                                $('.errorpesan').html(response.error.pesan);
                            } else {
                                $('#pesan').removeClass('is-invalid');
                                $('.errorpesan').html('');
                            }


                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.sukses

                            })
                            $('#modaltambahbanyak').modal('hide');
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
        $(document).on('click', '.btnhapusform', function(e) {
            e.preventDefault();
            $(this).parents('tr').remove();
        });
    </script>