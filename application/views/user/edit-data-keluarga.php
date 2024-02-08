<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <form action="menu/edit-data-keluarga/<?= $editDataKeluarga['id']; ?>" method="post">
                <input type="hidden" name="id" value="<?= $editDataKeluarga['id']; ?>">
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="<?= $editDataKeluarga['name']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nik" name="nik" value="<?= $editDataKeluarga['nik']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10 col-form-label">
                        <select name="kelamin" id="kelamin" class="form-control">
                            <?php foreach ($kelamin as $k) : ?>
                                <?php if ($k == $editDataKeluarga['kelamin']) : ?>
                                    <option value="<?= $k; ?>" selected><?= $k; ?></option>
                                <?php else : ?>
                                    <option value="<?= $k; ?>"><?= $k; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tempatlahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" value="<?= $editDataKeluarga['tempatlahir']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggallahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tanggallahir" name="tanggallahir" value="<?= $editDataKeluarga['tanggallahir']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat Rumah</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $editDataKeluarga['alamat']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-10 col-form-label">
                        <select name="agama" id="agama" class="form-control">
                            <?php foreach ($agama as $a) : ?>
                                <?php if ($a == $editDataKeluarga['agama']) : ?>
                                    <option value="<?= $a; ?>" selected><?= $a; ?></option>
                                <?php else : ?>
                                    <option value="<?= $a; ?>"><?= $a; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                    <div class="col-sm-10 col-form-label">
                        <select name="pendidikan" id="pendidikan" class="form-control">
                            <?php foreach ($pendidikan as $p) : ?>
                                <?php if ($p == $editDataKeluarga['pendidikan']) : ?>
                                    <option value="<?= $p; ?>" selected><?= $p; ?></option>
                                <?php else : ?>
                                    <option value="<?= $p; ?>"><?= $p; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $editDataKeluarga['pekerjaan']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-2 col-form-label">Status Hubungan Dalam Keluarga</label>
                    <div class="col-sm-10 col-form-label">
                        <select name="status" id="status" class="form-control">
                            <?php foreach ($status as $s) : ?>
                                <?php if ($s == $editDataKeluarga['status']) : ?>
                                    <option value="<?= $s; ?>" selected><?= $s; ?></option>
                                <?php else : ?>
                                    <option value="<?= $s; ?>"><?= $s; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kewarganegaraan" class="col-sm-2 col-form-label">Kewarganegaraan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" value="<?= $editDataKeluarga['kewarganegaraan']; ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="<?= base_url(); ?>user/datakeluarga" class="btn btn-primary">Kembali</a>
            </form>
        </div>

    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->