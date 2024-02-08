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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newDataKeluargaModal">Add New Data Keluarga</a>
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
                    <?php $i = 1; ?>
                    <?php foreach ($dataKeluarga as $dk) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $dk['name']; ?></td>
                            <td><?= $dk['nik']; ?></td>
                            <td><?= $dk['kelamin']; ?></td>
                            <td><?= $dk['tempatlahir']; ?></td>
                            <td><?= $dk['tanggallahir']; ?></td>
                            <td><?= $dk['agama']; ?></td>
                            <td><?= $dk['status']; ?></td>
                            <td>
                                <a href="<?= base_url('user/detail/') . $dk['id']; ?>" class="badge badge-pill badge-primary">Details</a>
                                <a href="<?= base_url('user/editdatakeluarga/') . $dk['id']; ?>" class="badge badge-pill badge-success">Edit</a>
                                <a href="<?= base_url(); ?>user/hapus/<?= $dk['id']; ?>" class="badge badge-pill badge-danger" onclick="return confirm('Yakin Ingin Hapus?');">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newDataKeluargaModal" tabindex="-1" role="dialog" aria-labelledby="newDataKeluargaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newDataKeluargaModalLabel">Add New Data Keluarga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user/datakeluarga'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK">
                    </div>
                    <div class="form-group">
                        <select name="kelamin" id="kelamin" class="form-control">
                            <option value="">Jenis Kelamin</option>
                            <?php foreach ($kelamin as $k) : ?>
                                <option value="<?= $k; ?>"><?= $k; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" placeholder="Tempat Lahir">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tanggallahir" name="tanggallahir" placeholder="Tanggal Lahir (Cth: 01 Januari 2001)">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Rumah">
                    </div>
                    <div class="form-group">
                        <select name="agama" id="agama" class="form-control">
                            <option value="">Agama</option>
                            <?php foreach ($agama as $a) : ?>
                                <option value="<?= $a; ?>"><?= $a; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="pendidikan" id="pendidikan" class="form-control">
                            <option value="">Pendidikan Terakhir</option>
                            <?php foreach ($pendidikan as $p) : ?>
                                <option value="<?= $p; ?>"><?= $p; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan">
                    </div>
                    <div class="form-group">
                        <select name="status" id="status" class="form-control">
                            <option value="">Status Hubungan Dalam Keluarga</option>
                            <?php foreach ($status as $s) : ?>
                                <option value="<?= $s; ?>"><?= $s; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" placeholder="Kewarganegaraan">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="user_id" id="user_id" placeholder="user_id">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>