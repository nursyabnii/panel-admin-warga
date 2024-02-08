<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="card mb-3 col-lg-12">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="card-body">
                    <p class="card-title"><label for="name" class="col-sm-6 col-form-label">Nama </label>: <?= $detail['name']; ?></p>
                    <p class="card-text"><label for="nik" class="col-sm-6 col-form-label">NIK </label>: <?= $detail['nik']; ?></p>
                    <p class="card-text"><label for="kelamin" class="col-sm-6 col-form-label">Jenis Kelamin </label>: <?= $detail['kelamin']; ?></p>
                    <p class="card-text"><label for="tempatlahir" class="col-sm-6 col-form-label">Tempat Lahir </label>: <?= $detail['tempatlahir']; ?></p>
                    <p class="card-text"><label for="tanggallahir" class="col-sm-6 col-form-label">Tanggal Lahir </label>: <?= $detail['tanggallahir']; ?></p>
                    <p class="card-text"><label for="alamat" class="col-sm-6 col-form-label">Alamat Rumah </label>: <?= $detail['alamat']; ?></p>
                    <p class="card-text"><label for="agama" class="col-sm-6 col-form-label">Agama </label>: <?= $detail['agama']; ?></p>
                    <p class="card-text"><label for="pendidikan" class="col-sm-6 col-form-label">Pendidikan Terakhir </label>: <?= $detail['pendidikan']; ?></p>
                    <p class="card-text"><label for="pekerjaan" class="col-sm-6 col-form-label">Pekerjaan </label>: <?= $detail['pekerjaan']; ?></p>
                    <p class="card-text"><label for="status" class="col-sm-6 col-form-label">Status Hubungan Dalam Keluarga </label>: <?= $detail['status']; ?></p>
                    <p class="card-text"><label for="kewarganegaraan" class="col-sm-6 col-form-label">Kewarganegaraan </label>: <?= $detail['kewarganegaraan']; ?></p>
                    <a href="<?= base_url(); ?>user/datakeluarga" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->