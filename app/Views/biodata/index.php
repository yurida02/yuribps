<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                   
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <?php if (session('pesan')): ?>
                                <div class="alert alert-success alert-dismissible mt-3">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?= session('pesan'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-primary mb-2" href="/biodata/tambah">Tambah Biodata</a>
                        
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sobat ID</th>
                                        <th>Nama</th>
                                        <th>Kecamatan</th>
                                        <th>Desa</th>
                                        <th>Alamat</th>
                                        <th>Username Sobat</th>
                                        <th>No HP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($biodata as $row): ?>
                                        <tr>
                                            <td><?= $row['sobat_id']; ?></td>
                                            <td><?= $row['nama']; ?></td>
                                            <td><?= $row['kecamatan']; ?></td>
                                            <td><?= $row['desa']; ?></td>
                                            <td><?= $row['alamat']; ?></td>
                                            <td><?= $row['username_sobat']; ?></td>
                                            <td><?= $row['no_hp']; ?></td>
                                            <td>
                                                <a href="<?= base_url('/biodata/edit/' . $row['sobat_id']); ?>" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <!-- Uncomment if you want to add delete functionality -->
                                                <a href="<?= base_url('/biodata/hapus/' . $row['sobat_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>