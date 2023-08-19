<div class="table-responsive">
    <table class="table table-sm table-striped" id="dataPertandingan">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Klub 1</th>
                <th>Nama Klub 2</th>
                <th>Score Klub 1</th>
                <th>Score Klub 2</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

<script>
    function listdatapertandingan() {
        var table = $('#dataPertandingan').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= site_url('Pertandingan/listdata') ?>",
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
        listdatapertandingan();
    });
</script>