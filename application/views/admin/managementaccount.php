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
                    <form action="<?= base_url('admin/managementaccount'); ?>" method="post">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" placeholder="Cari Data Account" name="keywordaccount" autocomplete="off" autofocus>
                            <div class="input-group-append">
                                <input class="btn btn-primary" type="submit" name="submitaccount">
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
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Member Since</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($managementAccount)) : ?>
                        <tr>
                            <td colspan="10">
                                <div class="alert alert-danger" role="alert">
                                    Data tidak ditemukan!
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php foreach ($managementAccount as $ma) : ?>
                        <tr>
                            <th scope="row"><?= ++$start; ?></th>
                            <td><?= $ma['name']; ?></td>
                            <td><?= $ma['email']; ?></td>
                            <td><?= $ma['role']; ?></td>
                            <td><?= date('d F Y', $ma['date_created']); ?></td>
                            <td>
                                <a href="<?= base_url('admin/detail/') . $ma['id']; ?>" class="badge badge-pill badge-primary">Details</a>
                                <a href="<?= base_url('admin/editaccount/') . $ma['id']; ?>" class="badge badge-pill badge-success">Edit</a>
                                <a href="<?= base_url(); ?>admin/hapusaccount/<?= $ma['id']; ?>" class="badge badge-pill badge-danger" onclick="return confirm('Yakin Ingin Hapus?');">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- <?= $this->pagination->create_links(); ?> -->
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->