<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Surat Keterangan Sehat</h5>
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
                    <label style=" color:black;" for="nomor_surat" class="col-sm-2 col-form-label">Nomor Surat </label>
                    <div class="col-sm-8">
                        <input style=" color:black;" type="text" name="nomor_surat" id="nomor_surat"
                            class="form-control">
                        <div class="invalid-feedback errornomor_surat">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="perihal" class="col-sm-2 col-form-label">Perihal
                    </label>
                    <div class="col-sm-8">
                        <input style=" color:black;" type="text" placeholder="ex: Olimpiade" name="perihal" id="perihal"
                            class="form-control">
                        <div class="invalid-feedback errorperihal">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="tb" class="col-sm-2 col-form-label">TB
                    </label>
                    <div class="col-sm-8">
                        <input style=" color:black;" type="text" placeholder="ex: 177" name="tb" id="tb"
                            class="form-control">
                        <div class="invalid-feedback errortb">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="bb" class="col-sm-2 col-form-label">BB
                    </label>
                    <div class="col-sm-8">
                        <input style=" color:black;" type="text" name="bb" placeholder="ex: 67,5" id="bb"
                            class="form-control">
                        <div class="invalid-feedback errorbb">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="gd" class="col-sm-2 col-form-label">GD
                    </label>
                    <div class="col-sm-8">
                        <input style=" color:black;" type="text" name="gd" id="gd" placeholder="ex: O"
                            class="form-control">
                        <div class="invalid-feedback errorgd">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="td" class="col-sm-2 col-form-label">TD
                    </label>
                    <div class="col-sm-8">
                        <input style=" color:black;" type="text" name="td" id="td" placeholder="ex: 110/80"
                            class="form-control">
                        <div class="invalid-feedback errortd">
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
                url: "<?= site_url('Back/Kir/simpandata') ?>",
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
                        if (response.error.nomor_surat) {
                            $('#nomor_surat').addClass('is-invalid');
                            $('.errornomor_surat').html(response.error.nomor_surat);
                        } else {
                            $('#nomor_surat').removeClass('is-invalid');
                            $('.errornomor_surat').html('');
                        }
                        if (response.error.perihal) {
                            $('#perihal').addClass('is-invalid');
                            $('.errorperihal').html(response.error.perihal);
                        } else {
                            $('#perihal').removeClass('is-invalid');
                            $('.errorperihal').html('');
                        }
                        if (response.error.tb) {
                            $('#tb').addClass('is-invalid');
                            $('.errortb').html(response.error.tb);
                        } else {
                            $('#tb').removeClass('is-invalid');
                            $('.errortb').html('');
                        }
                        if (response.error.bb) {
                            $('#bb').addClass('is-invalid');
                            $('.errorbb').html(response.error.bb);
                        } else {
                            $('#bb').removeClass('is-invalid');
                            $('.errorbb').html('');
                        }
                        if (response.error.gd) {
                            $('#gd').addClass('is-invalid');
                            $('.errorgd').html(response.error.gd);
                        } else {
                            $('#gd').removeClass('is-invalid');
                            $('.errorgd').html('');
                        }
                        if (response.error.td) {
                            $('#td').addClass('is-invalid');
                            $('.errortd').html(response.error.td);
                        } else {
                            $('#td').removeClass('is-invalid');
                            $('.errortd').html('');
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