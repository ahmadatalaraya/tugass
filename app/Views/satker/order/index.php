<?= $this->extend('satker/layout/template') ?>

<?= $this->section('content') ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">ORDER PENGAJUAN</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Daftar Order</li>
            </ol>

            <!-- Menampilkan Notifikasi -->
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('buat/create') ?>" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        Buat Order
                    </div>
                    <div class="card-body">                                    
                        <div class="mb-3">
                            <label class="form-label">Judul Order</label>
                            <input type="text" class="form-control" name="judul_order" required>
                        </div>

                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis</label>
                            <select class="form-control" name="jenis" required>
                                <option value="Layanan Permohonan">Layanan Permohonan</option>
                                <option value="Layanan Perpanjangan">Layanan Perpanjangan</option>
                                <option value="Layanan Pembatalan">Layanan Pembatalan</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            &nbsp&nbsp<div class="tooltip-sendiri"><i class="fa-sharp fa-circle-question"></i>
                                <span class="tooltip-teks">Kategori Pengajuan</span>
                            </div>
                            <textarea class="form-control" name="kategori" rows="2" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Detail Order</label>
                            &nbsp&nbsp<div class="tooltip-sendiri"><i class="fa-sharp fa-circle-question"></i>
                                <span class="tooltip-teks">Uraikan isi Permohonan</span>
                            </div>
                            <textarea class="form-control" name="detail" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="file" class="form-label">Upload Surat Permohonan</label>
                            <input type="file" name="file" id="file" class="form-control" required>
                        </div>

                        <br>

                        <div class="d-grid col-3 mx-auto">
                            <button type="submit" class="btn btn-primary"> <i class="fas fa-paper-plane"> </i> Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    
<?= $this->endSection(); ?>
