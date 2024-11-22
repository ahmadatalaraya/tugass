<?= $this->extend('satker/layout/template') ?>

    <?= $this->Section('content') ?>
    
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><?= $title; ?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Daftar Order</li>
                        </ol>
                        <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Daftar Order Saya
                         </div>
                         <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            
                                            <th>Judul Order</th>
                                            <th>Tanggal</th>
                                            
                                            <th>Kategori</th>
                                            <th>email</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php  $no = 1;  ?>
                                        <?php foreach ($daftar_order as $order) : ?>
                                            <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $order->judul_order; ?></td>
                                            <td><?= $order->tanggal_input?></td>
                                            <td><?= $order->kategori; ?></td>
                                            <td><?= $order->email; ?></td>
                                                  

                                        <?php endforeach;  ?>
                                    </tbody>
                                </table>
                            </div>
</div>   
                </main>



    <?= $this->endSection(); ?>