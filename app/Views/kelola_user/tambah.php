<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <?= $title; ?>
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">
                            <?= $title; ?>
                        </li>
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
                    <?php if (session('pesan')): ?>
                                <div class="alert alert-danger alert-dismissible mt-3">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <?= session('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <!-- Tampilkan pesan error jika ada -->
                        <?php if($validation->hasError('username')): ?>
                            <div class="alert alert-danger">
                                <?= $validation->getError('username'); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Tampilkan pesan error untuk field nama jika ada -->
                        <?php if($validation->hasError('nama')): ?>
                            <div class="alert alert-danger">
                                <?= $validation->getError('nama'); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Tampilkan pesan error untuk field password jika ada -->
                        <?php if($validation->hasError('password')): ?>
                            <div class="alert alert-danger">
                                <?= $validation->getError('password'); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Tampilkan pesan error untuk field role jika ada -->
                        <?php if($validation->hasError('role')): ?>
                            <div class="alert alert-danger">
                                <?= $validation->getError('role'); ?>
                            </div>
                        <?php endif; ?>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- form start -->
                            <form action="/kelola-user/simpan" method="post">
                                <?= csrf_field(); ?>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="username">Username</label>
                                            <input type="text" name="username"
                                                class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>"
                                                id="username" placeholder="Masukkan username"
                                                value="<?= old('username'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('username'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nama">Nama</label>
                                            <input type="text" name="nama"
                                                class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>"
                                                id="nama" placeholder="Masukkan nama" value="<?= old('nama'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password"
                                            class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>"
                                            id="password" placeholder="Masukkan password">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password2">Konfirmasi Password</label>
                                        <input type="password" name="password2"
                                            class="form-control <?= ($validation->hasError('password2')) ? 'is-invalid' : ''; ?>"
                                            id="password2" placeholder="Masukkan konfirmasi password">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password2'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
    <label for="no_telepon">No Telepon</label>
    <input type="text" name="no_telepon"
        class="form-control <?= ($validation->hasError('no_telepon')) ? 'is-invalid' : ''; ?>"
        id="no_telepon" placeholder="Masukkan no telepon"
        value="<?= old('no_telepon'); ?>">
    <div class="invalid-feedback">
        <?= $validation->getError('no_telepon'); ?>
    </div>
</div>

<div class="form-group">
    <label for="role">Role</label>
    <select
        class="form-control <?= ($validation->hasError('role')) ? 'is-invalid' : ''; ?>"
        name="role" id="role">
        <option value="">-- Pilih Role --</option>
        <option value="Admin" <?= (old('role') == 'Admin') ? 'selected' : ''; ?>>Admin</option>
        <option value="Supervisor" <?= (old('role') == 'Supervisor') ? 'selected' : ''; ?>>Supervisor</option>
        <option value="Administrasi" <?= (old('role') == 'Administrasi') ? 'selected' : ''; ?>>Administrasi</option>
        <option value="Penginput" <?= (old('role') == 'Penginput') ? 'selected' : ''; ?>>Penginput</option>
    </select>
    <div class="invalid-feedback">
        <?= $validation->getError('role'); ?>
    </div>
</div>

                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <a class="btn btn-warning" href="/kelola-user">Kembali</a>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                            </form>
                        </div>
                        <!-- /.card -->
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

<?= $this->EndSection() ?>