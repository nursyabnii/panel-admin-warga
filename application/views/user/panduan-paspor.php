<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?>
    </h1>

    <div class="row">

        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Umum</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample1">
                    <div class="card-body">
                        <li class="list-group-item">1. Permohonan Paspor biasa dapat diajukan oleh warga negara Indonesia baik di wilayah Indonesia maupun di luar wilayah Indonesia</li>
                        <li class="list-group-item">2. Paspor biasa terdiri atas Paspor biasa elektronik (e-paspor) dan Paspor biasa non elektronik</li>
                        <li class="list-group-item">3. Paspor biasa diterbitkan dengan menggunakan Sistem Informasi Manajemen Keimigrasian</li>
                        <li class="list-group-item">4. Permohonan Paspor biasa dapat diajukan secara manual atau elektronik dengan melampirkan dokumen kelengkapan persyaratan</li>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Persyaratan</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample2">
                    <div class="card-body">
                        <li class="list-group-item">1. Kartu tanda penduduk yang masih berlaku atau surat keterangan pindah ke luar negeri</li>
                        <li class="list-group-item">2. Kartu keluarga</li>
                        <li class="list-group-item">3. Akta kelahiran, akta perkawinan atau buku nikah, ijazah, atau surat baptis; (dalam dokumen harus tercantum nama, tempat dan tanggal lahir, nama orang tua, jika tidak tercantum, pemohon dapat melampirkan surat keterangan dari instansi yang berwenang)</li>
                        <li class="list-group-item">4. Surat pewarganegaraan Indonesia bagi Orang Asing yang memperoleh kewarganegaraan Indonesia melalui atau penyampaian untuk memilih kewarganegaraan sesuai dengan ketentuan perundang-undangan</li>
                        <li class="list-group-item">5. Surat penetapan ganti nama dari pejabat yang berwenang bagi yang telah mengganti nama</li>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Prosedur Pendaftaran melalui aplikasi M-Paspor: Dapat diunduh App Store atau Google Play</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample3">
                    <div class="card-body">
                        <li class="list-group-item">1. Pemohon mengisi aplikasi data yang disediakan pada loket permohonan dan melampirkan dokumen kelengkapan persyaratan</li>
                        <li class="list-group-item">2. Pejabat Imigrasi yang ditunjuk memeriksa dokumen kelengkapan persyaratan</li>
                        <li class="list-group-item">3. Setelah kelengkapan persyaratan yang telah dinyatakan lengkap, Pejabat Imigrasi yang ditunjuk memberikan tanda terima permohonan dan kode pembayaran</li>
                        <li class="list-group-item">4. Dalam hal dokumen kelengkapan persyaratan dinyatakan belum lengkap, Pejabat Imigrasi yang ditunjuk mengembalikan dokumen permohonan dan permohonan dianggap ditarik kembali</li>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample4" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Mekanisme Penerbitan</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample4">
                    <div class="card-body">
                        <li class="list-group-item">1. Pemeriksaan kelengkapan dan keabsahan persyaratan</li>
                        <li class="list-group-item">2. Pembayaran biaya paspor</li>
                        <li class="list-group-item">3. Pengambilan foto dan sidik jari</li>
                        <li class="list-group-item">4. Wawancara</li>
                        <li class="list-group-item">5. Verifikasi</li>
                        <li class="list-group-item">6. Adjudikasi</li>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">

            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample5" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Biaya</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample5">
                    <div class="card-body">
                        <li class="list-group-item">1. Paspor biasa 48 halaman Rp350.000</li>
                        <li class="list-group-item">2. Paspor biasa 48 halaman elektronik Rp650.000</li>
                        <li class="list-group-item">3. Layanan percepatan paspor selesai pada hari yang sama Rp1.000.000 (layanan percepatan di luar biaya penerbitan Paspor)</li>
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