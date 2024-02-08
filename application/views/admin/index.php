<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Admin</div>
                            <a class="h5 mb-0 font-weight-bold text-gray-800" href="<?= base_url('admin/datawarga'); ?>">Data Warga</a>
                        </div>
                        <div class=" col-auto">
                            <i class="fas fa-fw fa-city fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Admin</div>
                            <a class="h5 mb-0 font-weight-bold text-gray-800" href="<?= base_url('admin/managementaccount'); ?>">Management Account</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-house-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                User</div>
                            <a class="h5 mb-0 font-weight-bold text-gray-800" href="<?= base_url('user'); ?>">My Profile</a>
                        </div>
                        <div class=" col-auto">
                            <i class="fas fa-fw fa-solid fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                User</div>
                            <a class="h5 mb-0 font-weight-bold text-gray-800" href="<?= base_url('user/home'); ?>">Information</a>
                        </div>
                        <div class=" col-auto">
                            <i class="fas fa-fw fa-info fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->