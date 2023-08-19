<div class="table-responsive">
    <table class="table table-sm table-striped" id="dataKlub">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Klub</th>
                <th>Kota Klub</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

<script>
    function listdataklub() {
        var table = $('#dataKlub').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= site_url('Klub/listdata') ?>",
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
        listdataklub();
    });
</script>