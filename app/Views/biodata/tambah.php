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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
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
                        <div class="card-body">
                            <!-- form start -->
                            <form action="<?= site_url('/biodata/simpan') ?>" method="post">
    <?= csrf_field(); ?>
    <div class="card-body">
        <div class="form-group">
            <label for="sobat_id">Sobat ID</label>
            <input type="text"
                class="form-control <?= (session('errors.sobat_id')) ? 'is-invalid' : ''; ?>"
                id="sobat_id" name="sobat_id" placeholder="Nama Sobat ID kalian"
                value="<?= old('sobat_id'); ?>">
            <?php if (session('errors.sobat_id')): ?>
                <div class="invalid-feedback">
                    <?= session('errors.sobat_id'); ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text"
                class="form-control <?= (session('errors.nama')) ? 'is-invalid' : ''; ?>"
                id="nama" name="nama" placeholder="Nama Anda"
                value="<?= old('nama'); ?>">
            <?php if (session('errors.nama')): ?>
                <div class="invalid-feedback">
                    <?= session('errors.nama'); ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="kecamatan">Kecamatan</label>
            <input type="text"
                class="form-control <?= (session('errors.kecamatan')) ? 'is-invalid' : ''; ?>"
                id="kecamatan" name="kecamatan" placeholder="Tambahkan Kecamatan"
                value="<?= old('kecamatan'); ?>">
            <?php if (session('errors.kecamatan')): ?>
                <div class="invalid-feedback">
                    <?= session('errors.kecamatan'); ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="desa">Desa</label>
            <input type="text"
                class="form-control <?= (session('errors.desa')) ? 'is-invalid' : ''; ?>"
                id="desa" name="desa" placeholder="Tambahkan Desa Anda"
                value="<?= old('desa'); ?>">
            <?php if (session('errors.desa')): ?>
                <div class="invalid-feedback">
                    <?= session('errors.desa'); ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text"
                class="form-control <?= (session('errors.alamat')) ? 'is-invalid' : ''; ?>"
                id="alamat" name="alamat" placeholder="Tambahkan Alamat Anda"
                value="<?= old('alamat'); ?>">
            <?php if (session('errors.alamat')): ?>
                <div class="invalid-feedback">
                    <?= session('errors.alamat'); ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text"
                class="form-control <?= (session('errors.username')) ? 'is-invalid' : ''; ?>"
                id="username" name="username" placeholder="Tambahkan Username Anda"
                value="<?= old('username'); ?>"> <!-- Corrected the value attribute -->
            <?php if (session('errors.username')): ?>
                <div class="invalid-feedback">
                    <?= session('errors.username'); ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="no_hp">No HP</label>
            <input type="text"
                class="form-control <?= (session('errors.no_hp')) ? 'is-invalid' : ''; ?>"
                id="no_hp" name="no_hp" placeholder="Tambahkan No HP Anda"
                value="<?= old('no_hp'); ?>">
            <?php if (session('errors.no_hp')): ?>
                <div class="invalid-feedback">
                    <?= session('errors.no_hp'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="card-footer">
        <a class="btn btn-warning" href="/biodata">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>

<?= $this->endSection() ?>