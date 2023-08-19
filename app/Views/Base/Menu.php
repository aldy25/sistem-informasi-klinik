<?= $this->extend('Base/Main') ?>
<?= $this->section('Menu') ?>

<li>
    <a href="<?= base_url() ?>/Beranda" class="waves-effect">
        <i class="mdi mdi-airplay"></i>
        <span> BERANDA <span class="badge badge-pill badge-primary float-right"></span></span>
    </a>
</li>

<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account"></i> <span> KLUB </span>
        <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled">
        <li>
            <a href="<?= base_url() ?>/View-klub">
                <i class="mdi mdi-checkbox-blank-circle-outline"></i> DATA KLUB
            </a>
        </li>
    </ul>

</li>
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-database"></i> <span> PERTANDINGAN </span>
        <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled">

        <li>
            <a href="<?= base_url() ?>/View-pertandingan">
                <i class="mdi mdi-checkbox-blank-circle-outline"></i> DATA PERTANDINGAN
            </a>
        </li>
    </ul>

</li>
</li>
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-file-document"></i> <span> KLASEMEN </span>
        <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled">
        <li>
            <a href="<?= base_url() ?>/View-klasemen">
                <i class="mdi mdi-checkbox-blank-circle-outline"></i> DATA KLASEMEN
            </a>
        </li>
    </ul>

</li>



<?= $this->endsection() ?>