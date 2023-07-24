<p>


</p>
<div class="table-responsive">
    <table class="table table-sm table-striped" id="data">
        <thead>
            <tr>

                <th>No</th>

                <th>Dokter</th>
                <th>No Rm</th>
                <th>Tinggi Badan</th>
                <th>Berat Badan</th>
                <th>Tekanan Darah</th>
                <th>Anamnesa</th>
                <th>Assesmen</th>
                <th>Diagnosa</th>
                <th>Terapi</th>
                <th>Edukasi</th>
                <th>Rujukan</th>
                <th>Waktu</th>
                <th>Keterangan</th>


            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

<script>
    function listdataadmin() {
        var table = $('#data').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url() ?>/Lisdata/<?= $id_pasien ?>",
                "type": "POST"
            },
            //OPTIONAL
            "columDefs": [{
                "targets": 0,
                "orderable": false,
            }],
        })
    }
    $(document).ready(function() {
        listdataadmin();
    });

    function edit(id_pasien) {
        $.ajax({
            type: "post",
            url: "<?= site_url('Back/Pasien/formedit') ?>",
            data: {
                id_pasien: id_pasien
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modaledit').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function hapus(id_pasien) {
        Swal.fire({
            title: 'Pasien',
            text: `Yakin Untuk Menghapus Data Pasien Ini ?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#072DD6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ya',
            cancelButtonText: 'tidak',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "post",
                    url: "<?= site_url('Back/Pasien/hapus') ?>",
                    data: {
                        id_pasien: id_pasien
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.sukses,
                            });
                            dataAdmin();
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
            }
        });
    }
</script>