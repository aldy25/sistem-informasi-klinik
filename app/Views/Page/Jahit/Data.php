<?= form_open('Back/Pages/Admin/hapusbanyak', ['class' => 'formhapusbanyak']) ?>
<p>


</p>
<div class="table-responsive">
    <table class="table table-sm table-striped" id="dataAkun">
        <thead>
            <tr>

                <th>No</th>
                <th>Pasien</th>
                <th>Dokter</th>
                <th>Jumlah Jahitan</th>
                <th>Waktu</th>
                <th>Keterangan</th>

                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
<?= form_close(); ?>
<script>
function listdataadmin() {
    var table = $('#dataAkun').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?= site_url('Back/Jahit/listdata') ?>",
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

function edit(id_jahit) {
    $.ajax({
        type: "post",
        url: "<?= site_url('Back/Jahit/formedit') ?>",
        data: {
            id_jahit: id_jahit
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

function hapus(id_jahit) {
    Swal.fire({
        title: 'Peringatan',
        text: `Yakin Untuk Menghapus Data Ini ?`,
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
                url: "<?= site_url('Back/Jahit/hapus') ?>",
                data: {
                    id_jahit: id_jahit
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