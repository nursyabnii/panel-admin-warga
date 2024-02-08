<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="card mb-3 col-lg-8">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="card-body">
                    <?php foreach ($lihatData as $ld) : ?>
                        <h5 class="card-title"><?= $ld['name']; ?></h5>
                        <p class="card-text"><?= $ld['nik']; ?></p>
                        <p class="card-text"><?= $ld['tempatlahir']; ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->