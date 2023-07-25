<div class="table-responsive">
    <table class="table table-sm table-striped" id="dataklasemen">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Klub</th>
                <th>Ma </th>
                <th>Me</th>
                <th>S</th>
                <th>K</th>
                <th>GM</th>
                <th>GK</th>
                <th>Point</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

<script>
    function listdataklasemen() {
        var table = $('#dataklasemen').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= site_url('Klasemen/listdata') ?>",
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
        listdataklasemen();
    });
</script>