<!-- Modal -->
<div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Surat Izin Sakit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('Back/Sakit/updatedata', ['class' => 'formedit']) ?>
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
                <div style="display: none;" class="form-group row">
                    <label style=" color:black;" for="id" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-8">
                        <input value="<?= $id_izin_sakit ?>" style="color:black;" type="text" name="id" id="id"
                            class="form-control">
                        <div class="invalid-feedback errorid">
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
                            <option style="color:black;" value="<?= $row->id_user ?>"
                                <?php if ($dokter == $row->id_user) echo "selected"; ?>><?= $row->nama_user ?></option>

                            <?php } ?>


                        </select>
                        <div class="invalid-feedback errordokter">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label style=" color:black;" for="durasi" class="col-sm-2 col-form-label">Durasi </label>
                    <div class="col-sm-8">
                        <input value="<?= $durasi ?>" style=" color:black;" type="text" name="durasi" id="durasi"
                            class="form-control">
                        <div class="invalid-feedback errordurasi">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="waktu_awal" class="col-sm-2 col-form-label">Waktu Awal
                    </label>
                    <div class="col-sm-8">
                        <input value="<?= $waktu_awal ?>" style=" color:black;" type="date" name="waktu_awal"
                            id="waktu_awal" class="form-control">
                        <div class="invalid-feedback errorwaktu_awal">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label style=" color:black;" for="waktu_akhir" class="col-sm-2 col-form-label">Waktu Akhir </label>
                    <div class="col-sm-8">
                        <input value="<?= $waktu_akhir ?>" style=" color:black;" type="date" name="waktu_akhir"
                            id="waktu_akhir" class="form-control">
                        <div class="invalid-feedback errorwaktu_akhir">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="keterangan" class="col-sm-2 col-form-label">Keterangan </label>
                    <div class="col-sm-8">
                        <input value="<?= $keterangan ?>" style=" color:black;" type="text" name="keterangan"
                            id="keterangan" class="form-control">
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
    $(document).ready(function() {
        $('.formedit').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.btnsimpan').attr('disable', 'disabled');
                    $('.btnsimpan').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.btnsimpan').removeAttr('disable', );
                    $('.btnsimpan').html('Update');
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
                        if (response.error.durasi) {
                            $('#durasi').addClass('is-invalid');
                            $('.errordurasi').html(response.error.durasi);
                        } else {
                            $('#durasi').removeClass('is-invalid');
                            $('.errordurasi').html('');
                        }
                        if (response.error.waktu_awal) {
                            $('#waktu_awal').addClass('is-invalid');
                            $('.errorwaktu_awal').html(response.error.waktu_awal);
                        } else {
                            $('#waktu_awal').removeClass('is-invalid');
                            $('.errorwaktu_awal').html('');
                        }
                        if (response.error.keterangan) {
                            $('#keterangan').addClass('is-invalid');
                            $('.errorketerangan').html(response.error.keterangan);
                        } else {
                            $('#keterangan').removeClass('is-invalid');
                            $('.errorketerangan').html('');
                        }
                        if (response.error.waktu_akhir) {
                            $('#waktu_akhir').addClass('is-invalid');
                            $('.errorwaktu_akhir').html(response.error.waktu_akhir);
                        } else {
                            $('#waktu_akhir').removeClass('is-invalid');
                            $('.errorwaktu_akhir').html('');
                        }


                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses

                        })
                        $('#modaledit').modal('hide');
                        dataAdmin();
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