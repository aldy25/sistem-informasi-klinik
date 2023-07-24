<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Tes Antigen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('Back/Antigen/simpandata', ['class' => 'formtambah']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div style="display: none;" class="form-group row">
                    <label style=" color:black;" for="id_pasien" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-8">
                        <input value="<?= $id_pasien ?>" style="color:black;" type="text" name="id_pasien"
                            id="id_pasien" class="form-control">
                        <div class="invalid-feedback errorid_pasien">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="nama_pasien" class="col-sm-2 col-form-label">Nama Pasien</label>
                    <div class="col-sm-8">
                        <input value="<?= $nama_pasien ?>" disabled style="color:black;" type="text" name="nama_pasien"
                            id="nama_pasien" class="form-control">
                        <div class="invalid-feedback errornama_pasien">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="dokter" class="col-sm-2 col-form-label">Dokter</label>
                    <div class="col-sm-8">
                        <select name="dokter" id="dokter" class="form-control">
                            <option style="color:black;" value="">--- Pilih ---</option>
                            <?php
                            $db   = \Config\Database::connect();
                            $datapasien = $db->query("SELECT * from tbl_user WHERE level ='Dokter'");
                            $data = $datapasien->getResult();
                            foreach ($data as $row) {
                            ?>
                            <option style="color:black;" value="<?= $row->id_user ?>"><?= $row->nama_user ?></option>

                            <?php } ?>


                        </select>
                        <div class="invalid-feedback errordokter">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label style=" color:black;" for="parameter" class="col-sm-2 col-form-label">Parameter </label>
                    <div class="col-sm-8">
                        <input style=" color:black;" placeholder="ex: 100" type="text" name="parameter" id="parameter"
                            class="form-control">
                        <div class="invalid-feedback errorparameter">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="hasil" class="col-sm-2 col-form-label">Hasil Pemeriksaan
                    </label>
                    <div class="col-sm-8">
                        <input style=" color:black;" type="text" placeholder="ex: 60,5" name="hasil" id="hasil"
                            class="form-control">
                        <div class="invalid-feedback errorhasil">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label style=" color:black;" for="waktu" class="col-sm-2 col-form-label">Waktu </label>
                    <div class="col-sm-8">
                        <input style=" color:black;" type="date" name="waktu" id="waktu" class="form-control">
                        <div class="invalid-feedback errorwaktu">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="keterangan" class="col-sm-2 col-form-label">Keterangan </label>
                    <div class="col-sm-8">
                        <input style=" color:black;" type="text" name="keterangan" id="keterangan" class="form-control">
                        <div class="invalid-feedback errorketerangan">
                        </div>
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label style=" color:black;" for="keterangan" class="col-sm-2 col-form-label">Obat </label>

                    <div class="col-sm-8">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>Obat</th>
                                    <th>Resep</th>

                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody class="formtambahh">
                                <tr>

                                    <td>
                                        <select name="obat[]" class="form-control">
                                            <option value="Laki-Laki">Paramex</option>
                                            <option value="Perempuan">Sanmol</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="resep[]" class="form-control">
                                            <option value="1">2 x 1 Sesudah Makan</option>
                                            <option value="1">3 x 1 Sesudah Makan</option>
                                            <option value="1">1 x Sesudah Makan</option>
                                        </select>
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

                </div> -->


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btnsimpan">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">close</button>
                </div>
                <?= form_close() ?>
            </div>

        </div>
    </div>
    <script>
    $('#dokter').select2({

    });
    $(document).ready(function() {

        // $('.btnaddform').click(function(e) {
        //     e.preventDefault();
        //     $('.formtambahh').append(`
        //         <tr>
        //                 <td>
        //                             <select name="obat[]" class="form-control">

        //                                 <option value="Laki-Laki"></option>
        //                                 <option value="Perempuan">Sanmol</option>
        //                             </select>
        //                         </td>
        //                         <td>
        //                             <select name="resep[]" class="form-control">
        //                                 <option value="1">2 x 1 Sesudah Makan</option>
        //                                 <option value="1">3 x 1 Sesudah Makan</option>
        //                                 <option value="1">1 x Sesudah Makan</option>
        //                             </select>
        //                         </td>
        //                         <td>
        //         <button type="button" class="btn btn-danger btnhapusform">
        //             <i class="fa fa-trash"></i>
        //         </button>
        //     </td>

        // </tr>
        //     `);
        // });
        $(".formtambah").submit(function(e) {
            e.preventDefault();
            let form = $('.formtambah')[0];
            let data = new FormData(form);
            $.ajax({
                type: "post",
                url: "<?= site_url('Back/Antigen/simpandata') ?>",
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
                        if (response.error.dokter) {
                            $('#dokter').addClass('is-invalid');
                            $('.errordokter').html(response.error.dokter);
                        } else {
                            $('#dokter').removeClass('is-invalid');
                            $('.errordokter').html('');
                        }
                        if (response.error.parameter) {
                            $('#parameter').addClass('is-invalid');
                            $('.errorparameter').html(response.error.parameter);
                        } else {
                            $('#parameter').removeClass('is-invalid');
                            $('.errorparameter').html('');
                        }
                        if (response.error.hasil) {
                            $('#hasil').addClass('is-invalid');
                            $('.errorhasil').html(response.error.hasil);
                        } else {
                            $('#hasil').removeClass('is-invalid');
                            $('.errorhasil').html('');
                        }
                        if (response.error.keterangan) {
                            $('#keterangan').addClass('is-invalid');
                            $('.errorketerangan').html(response.error.keterangan);
                        } else {
                            $('#keterangan').removeClass('is-invalid');
                            $('.errorketerangan').html('');
                        }
                        if (response.error.waktu) {
                            $('#waktu').addClass('is-invalid');
                            $('.errorwaktu').html(response.error.waktu);
                        } else {
                            $('#waktu').removeClass('is-invalid');
                            $('.errorwaktu').html('');
                        }

                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses

                        })
                        $('#modaltambah').modal('hide');
                        dataTransaksi();
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