<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Klub</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('Back/Akun/simpandata', ['class' => 'formtambah']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">



                <div class="form-group row">
                    <label style=" color:black;" for="nama_klub" class="col-sm-2 col-form-label">Nama Klub</label>
                    <div class="col-sm-8">
                        <input style="color:black;" type="text" name="nama_klub" id="nama_klub" class="form-control">
                        <div class="invalid-feedback errornama_klub">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="kota_klub" class="col-sm-2 col-form-label">Kota Klub</label>
                    <div class="col-sm-8">
                        <input style="color:black;" type="text" name="kota_klub" id="kota_klub" class="form-control">
                        <div class="invalid-feedback errorkota_klub">
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
                    url: "<?= site_url('Klub/simpandata') ?>",
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
                            if (response.error.nama_klub) {
                                $('#nama_klub').addClass('is-invalid');
                                $('.errornama_klub').html(response.error.nama_klub);
                            } else {
                                $('#nama_klub').removeClass('is-invalid');
                                $('.errornama_klub').html('');
                            }
                            if (response.error.kota_klub) {
                                $('#kota_klub').addClass('is-invalid');
                                $('.errorkota_klub').html(response.error.kota_klub);
                            } else {
                                $('#kota_klub').removeClass('is-invalid');
                                $('.errorkota_klub').html('');
                            }

                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.sukses

                            })
                            $('#modaltambah').modal('hide');
                            dataKlub();
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