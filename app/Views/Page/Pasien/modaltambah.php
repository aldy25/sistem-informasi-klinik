<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('Back/Pasien/simpandata', ['class' => 'formtambah']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">


                <div class="form-group row">
                    <label style=" color:black;" for="nama_pasien" class="col-sm-2 col-form-label">Nama Pasien</label>
                    <div class="col-sm-8">
                        <input style="color:black;" type="text" placeholder="ex: Muhamad Rama" name="nama_pasien"
                            id="nama_pasien" class="form-control">
                        <div class="invalid-feedback errornama_pasien">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="jk_pasien" class="col-sm-2 col-form-label">Jenis Kelamin </label>
                    <div class="col-sm-8">
                        <select name="jk_pasien" id="jk_pasien" class="form-control">
                            <option style="color:black;" value="">--Pilih--</option>
                            <option style="color:black;" value="Laki-Laki">Laki-Laki</option>
                            <option style="color:black;" value="Perempuan">Perempuan</option>
                        </select>
                        <div class="invalid-feedback errorjk_pasien">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label style=" color:black;" for="umur_pasien" class="col-sm-2 col-form-label">Umur Pasien </label>
                    <div class="col-sm-8">
                        <input style=" color:black;" type="number" placeholder="ex: 24" name="umur_pasien"
                            id="umur_pasien" class="form-control">
                        <div class="invalid-feedback errorumur_pasien">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="alamat_pasien" class="col-sm-2 col-form-label">Alamat Pasien
                    </label>
                    <div class="col-sm-8">
                        <input style=" color:black;" type="text" name="alamat_pasien" placeholder="ex: Auduri 2"
                            id="alamat_pasien" class="form-control">
                        <div class="invalid-feedback erroralamat_pasien">
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
                url: "<?= site_url('Back/Pasien/simpandata') ?>",
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
                        if (response.error.nama_pasien) {
                            $('#nama_pasien').addClass('is-invalid');
                            $('.errornama_pasien').html(response.error.nama_pasien);
                        } else {
                            $('#nama_pasien').removeClass('is-invalid');
                            $('.errornama_pasien').html('');
                        }
                        if (response.error.jk_pasien) {
                            $('#jk_pasien').addClass('is-invalid');
                            $('.errorjk_pasien').html(response.error.jk_pasien);
                        } else {
                            $('#jk_pasien').removeClass('is-invalid');
                            $('.errorjk_pasien').html('');
                        }
                        if (response.error.umur_pasien) {
                            $('#umur_pasien').addClass('is-invalid');
                            $('.errorumur_pasien').html(response.error.umur_pasien);
                        } else {
                            $('#umur_pasien').removeClass('is-invalid');
                            $('.errorumur_pasien').html('');
                        }
                        if (response.error.alamat_pasien) {
                            $('#alamat_pasien').addClass('is-invalid');
                            $('.erroralamat_pasien').html(response.error.alamat_pasien);
                        } else {
                            $('#alamat_pasien').removeClass('is-invalid');
                            $('.erroralamat_pasien').html('');
                        }

                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses

                        })
                        $('#modaltambah').modal('hide');
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