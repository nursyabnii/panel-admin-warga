<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <form action="menu/edit-menu/<?= $editMenu['id']; ?>" method="post">
                <input type="hidden" name="id" value="<?= $editMenu['id']; ?>">
                <div class="form-group row">
                    <label for="url" class="col-sm-2 col-form-label">Menu Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="menu" name="menu" value="<?= $editMenu['menu']; ?>">
                    </div>
                </div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <a href="<?= base_url(); ?>menu" class="btn btn-primary">Kembali</a>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->