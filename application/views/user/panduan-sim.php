<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?>
    </h1>

    <div class="row">

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Batas Usia Minimal</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample1">
                    <div class="card-body">
                        <li class="list-group-item">1. SIM A, SIM C, dan SIM  D minimal usia 17 Tahun</li>
                        <li class="list-group-item">2. SIM B1 minimal usia 20 tahun</li>
                        <li class="list-group-item">3. SIM B2 minimal usia 21 tahun</li>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Syarat Tambahan Bagi Pemohon SIM B1 dan SIM B2</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample2">
                    <div class="card-body">
                        <li class="list-group-item">1. Untuk membuat SIM B1 harus memiliki SIM A sekurang-kurangnya 12 bulan</li>
                        <li class="list-group-item">2. Untuk membuat SIM B2 harus memiliki SIM B1 sekurang-kurangnya 12 bulan</li>
                        <li class="list-group-item">3. Membayar biaya pembuatan SIM baru</li>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">

            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Syarat Administratif dan Cara Pembuatan SIM Baru</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample3">
                    <div class="card-body">
                        <li class="list-group-item">1. Memiliki Kartu Tanda Penduduk(KTP) dan fotokopi KTP</li>
                        <li class="list-group-item">2. Memiliki Surat Keterangan Sehat dari Dokter</li>
                        <li class="list-group-item">3. Mengisi formulir permohonan pembuatan SIM</li>
                        <li class="list-group-item">4. Melakukan pembayaran PNPB SIM di loket</li>
                        <li class="list-group-item">5. Mengambil Nomor Antrean</li>
                        <li class="list-group-item">6. Mengambil foto dan sidik jari</li>
                        <li class="list-group-item">7. Mengikuti ujian teori dan praktik</li>
                        <li class="list-group-item">8. Menunggu hasil ujian apakah lulus atau tidak</li>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample4" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Syarat Perpanjangan SIM</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample4">
                    <div class="card-body">
                        <li class="list-group-item">1. Memiliki Kartu Tanda Penduduk(KTP) dan fotokopi KTP</li>
                        <li class="list-group-item">2. Memiliki SIM lama dan fotokopi SIM lama</li>
                        <li class="list-group-item">3. Memiliki dokumen keimigrasian dan fotokopi (Khusus WNA)</li>
                        <li class="list-group-item">4. Memiliki surat izin dari Kemenaker untuk WNA yang bekerja di Indonesia</li>
                        <li class="list-group-item">5. Memiliki dokumen KITAP / KITAS (WNA)</li>
                        <li class="list-group-item">6. Memiliki Surat Ketengan Sehat dari Dokter</li>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">

            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample5" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Biaya Perpanjangan SIM atau Pergantian Baru karena Hilang atau Rusak dan Pindah Masuk (Mutasi)</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample5">
                    <div class="card-body">
                        <li class="list-group-item">1. SIM A / Umum Rp. 80.000</li>
                        <li class="list-group-item">2. SIM B1 / Umum Rp. 80.000</li>
                        <li class="list-group-item">3. SIM B2 / Umum Rp. 80.000</li>
                        <li class="list-group-item">4. SIM C Rp. 75.000</li>
                        <li class="list-group-item">5. SIM D Rp. 30.000</li>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="<?= base_url(); ?>user/home" class="btn btn-primary">Kembali</a>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->