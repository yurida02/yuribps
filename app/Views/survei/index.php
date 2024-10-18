<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <?php if (session()->has('validation')): ?>
                            <div class="alert alert-danger">
                                <?= session('validation')->listErrors() ?>
                            </div>
                            <?php endif; ?>

                            <?php if (session()->has('success')): ?>
                            <div class="alert alert-success" role="alert">
                                <?= session('success') ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a class="btn btn-primary mb-2" href="/survei/tambah">Tambah Survei</a>
                            <a class="btn btn-success mb-2" href="/survei/cetakexcel"><i
                                    class="fas fa-file-excel"></i></a>
                                    
                            
                            <div class="float-right">
                                <form action="/survei/cetakpdf" method="get">
                                    <label for="bulan">Bulan:</label>
                                    <select name="bulan" id="bulan">
                                        <option value="">Pilih Bulan</option>
                                        <?php 
    $months = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei',
        'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
        'November', 'Desember'
    ];

    foreach ($months as $name) {
        echo "<option value=\"$name\">$name</option>";
    }
    ?>
                                    </select>

                                    <button type="submit" class="btn btn-warning"><i
                                            class="fas fa-file-pdf"></i></button>
                                    <!--button cetak pdf-->
                                </form>
                            </div>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sobat Id</th>
                                        <th>Nama Petugas</th>
                                        <th>Kecamatan</th>
                                        <th>Alamat</th>
                                        <th>Status</th>
                                        <th>Mata Anggaran</th>
                                        <th>Kegiatan</th>
                                        <th>Uraian</th>
                                        <th>Volume</th>
                                        <th>Satuan</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Bulan</th>
                                        <th>Konfirmasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($survei as $s): ?>
                                    <tr>
                                        <td><?= $s['sobat_id']; ?></td>
                                        <td><?= $s['nama']; ?></td>
                                        <td><?= $s['kec']; ?></td>
                                        <td><?= $s['alamat']; ?></td>
                                        <td><?= $s['status']; ?></td>
                                        <td><?= $s['anggaran']; ?></td>
                                        <td><?= $s['keg']; ?></td>
                                        <td><?= $s['uraian']; ?></td>
                                        <td><?= $s['vol']; ?></td>
                                        <td><?= $s['satuan']; ?></td>
                                        <td><?= $s['harga']; ?></td>
                                        <td><?= $s['jumlah']; ?></td>
                                        <td><?= $s['bulan']; ?></td>
                                        <td><?= $s['konfirm']; ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-warning btn-sm"
                                                href="/survei/edit/<?= $s['sobat_id']; ?>">Ubah</a>
                                            <form action="/survei/<?= $s['sobat_id']; ?>" method="post"
                                                class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>

<?= $this->endSection() ?>