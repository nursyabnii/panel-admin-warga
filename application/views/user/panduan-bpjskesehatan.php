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
                    <h6 class="m-0 font-weight-bold text-primary">Syarat Membuat BPJS Kesehatan</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample1">
                    <div class="card-body">
                        <li class="list-group-item">1. Kartu Tanda Penduduk (KTP)</li>
                        <li class="list-group-item">2. Kartu Keluarga</li>
                        <li class="list-group-item">3. Rekening buku tabungan BNI, BRI, Mandri, BTN, BCA, Bank Jateng, atau Bak Panin. Bisa menggunakan rekening kepala keluarga atau anggota keluarga dalam satu KK atau anggota keluarga yang menanggung iuran.</li>
                        <li class="list-group-item">4. Surat kuasa autodebet pembayaran iuran BPJS Kesehatan bermaterai Rp 10.000 yang ditandatangani pemilik rekening. Surat kuasa wajib bertanda tangan pemilik rekening walaupun calon peserta yang mendaftar bukan pemilik rekening</li>
                        <li class="list-group-item">5. Bagi warga negara asing (WNA), lampirkan fotokopi paspor dan surat izin kerja yang diterbitkan instansi berwenang</li>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Alur Pembuatan BPJS Kesehatan Offline</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample2">
                    <div class="card-body">
                        <li class="list-group-item">1. Kunjungi Kantor Cabang atau Kantor Kabupaten/Kota BPJS Kesehatan</li>
                        <li class="list-group-item">2. Isi Formulir Daftar Isian Peserta (FDIP) mulai dari nama lengkap, tempat dan tanggal lahir, status pernikahan, alamat/domisili, dan pilihan kelas perawatan (I, II, atau III)</li>
                        <li class="list-group-item">3. Pilih juga Fasilitas Kesehatan Tingkat Pertama (FKTP) terdekat, nomor ponsel dan email aktif, serta nomor rekening bank</li>
                        <li class="list-group-item">4. Ambil nomor antrean administrasi dan tunggu untuk mendapatkan pelayanan.</li>
                        <li class="list-group-item">5. Setelah menyelesaikan adminsitrasi, calon peserta akan menerima nomor virtual account yang digunakan untuk pembayaran iuran pertama</li>
                        <li class="list-group-item">6. Calon peserta melakukan pembayaran iuran pertama melalui autodebet dalam waktu paling cepat 14 hari dan paling lambat 30 hari setelah pendaftaran</li>
                        <li class="list-group-item">7. Selanjutnya, Kartu JKN-KIS akan dikirim paling lambat 6 hari setelah pembayaran iuran pertama berhasil</li>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Alur Pembuatan BPJS Kesehatan Online</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample3">
                    <div class="card-body">
                        <li class="list-group-item">1. Buka aplikasi Mobile JKN yang telah diunduh melalui Google Play Store atau App Store.</li>
                        <li class="list-group-item">2. Klik "Daftar" dan pilih "Pendaftaran Peserta Baru".</li>
                        <li class="list-group-item">3. Baca dan cermati ketentuan pendaftaran, dan klik "Setuju".</li>
                        <li class="list-group-item">4. Siapkan kelengkapan data seperti NIK, KK, dan nomor rekening bank.</li>
                        <li class="list-group-item">5. Masukkan NIK dan ketik kode captcha.</li>
                        <li class="list-group-item">6. Halaman akan menampilkan daftar data keluarga dan calon peserta BPJS Kesehatan.</li>
                        <li class="list-group-item">7. Isi data diri mulai dari nama lengkap, tempat dan tanggal lahir, status pernikahan, dan alamat/domisili.</li>
                        <li class="list-group-item">8. Pilih kelas perawatan (I, II, atau III) dan pilih FKTP terdekat.</li>
                        <li class="list-group-item">9. Masukkan nomor ponsel dan alamat email yang aktif dan klik "Simpan"..</li>
                        <li class="list-group-item">10. Kode verifikasi akan dikirimkan ke alamat email yang didaftarkan.</li>
                        <li class="list-group-item">11. Cek email masuk dan salin kode verifikasi tersebut ke aplikasi Mobile JKN.</li>
                        <li class="list-group-item">12. Calon peserta akan menerima nomor virtual account untuk pembayaran iuran pertama secara autodebet yang dikirim melalui email.</li>
                        <li class="list-group-item">13. Calon peserta melakukan pembayaran iuran pertama melalui autodebet dalam waktu paling cepat 14 hari atau paling lambat 30 hari setelah pendaftaran.</li>
                        <li class="list-group-item">14. Kartu JKN-KIS dikirimkan paling lambat 6 hari setelah pembayaran atau dapat diunduh langsung pada aplikasi Mobile JKN.</li>

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