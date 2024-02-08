<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row ">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <div class="row mt-3">
                <div class="col-md-4">
                    <form action="<?= base_url('admin/datawarga'); ?>" method="post">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" placeholder="Cari Data Warga" name="keyword" autocomplete="off" autofocus>
                            <div class="input-group-append">
                                <input class="btn btn-primary" type="submit" name="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <h6>Result: <?= $total_rows; ?></h6>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Agama</th>
                        <th scope="col">Status Hubungan Dalam Keluarga</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($dataWarga)) : ?>
                        <tr>
                            <td colspan="10">
                                <div class="alert alert-danger" role="alert">
                                    Data tidak ditemukan!
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php foreach ($dataWarga as $dw) : ?>
                        <tr>
                            <th scope="row"><?= ++$start; ?></th>
                            <td><?= $dw['name']; ?></td>
                            <td><?= $dw['nik']; ?></td>
                            <td><?= $dw['kelamin']; ?></td>
                            <td><?= $dw['tempatlahir']; ?></td>
                            <td><?= $dw['tanggallahir']; ?></td>
                            <td><?= $dw['agama']; ?></td>
                            <td><?= $dw['status']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/detailwarga/') . $dw['id']; ?>" class="badge badge-pill badge-primary">Details</a>
                                <a href="<?= base_url('admin/editdatawarga/') . $dw['id']; ?>" class="badge badge-pill badge-success">Edit</a>
                                <a href="<?= base_url(); ?>admin/hapusdatawarga/<?= $dw['id']; ?>" class="badge badge-pill badge-danger" onclick="return confirm('Yakin Ingin Hapus?');">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->