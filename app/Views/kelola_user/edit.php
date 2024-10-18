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
                        <?php if (session('error')): ?>
                        <div class="alert alert-danger alert-dismissible mt-3">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?= session('error'); ?>
                        </div>
                        <?php endif; ?>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- form start -->
                            <form action="/kelola-user/update/<?= $user['id_user']; ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" class="form-control" id="username"
                                                placeholder="Masukkan username"
                                                value="<?= (old('username')) ? old('username') : $user['username']; ?>">
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nama">Nama</label>
                                            <input type="text" name="nama" class="form-control" id="nama"
                                                placeholder="Masukkan nama"
                                                value=" <?= (old('nama')) ? old('nama') : $user['nama']; ?>">
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password Baru</label>
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Masukkan password baru"
                                            value="<?= (old('password')) ? old('password') : ''; ?>">
                                        <div class="invalid-feedback">
                                            <!-- Pesan kesalahan (jika ada) -->
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password2">Konfirmasi Password Baru</label>
                                        <input type="password" name="password2" class="form-control" id="password2"
                                            placeholder="Masukkan konfirmasi password baru"
                                            value="<?= (old('password2')) ? old('password2') : ''; ?>">
                                        <div class="invalid-feedback">
                                            <!-- Pesan kesalahan (jika ada) -->
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="no_telepon">No Telepon</label>
                                        <input type="text" name="no_telepon" class="form-control" id="no_telepon"
                                            placeholder="Masukkan no telepon"
                                            value="<?= (old('no_telepon')) ? old('no_telepon') : $user['no_telepon']; ?>">
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select name="role" class="form-control" id="role">

                                            <option value="Admin"
                                                <?= (old('role') == 'Admin' || $user['role'] == 'Admin') ? 'selected' : ''; ?>>
                                                Admin</option>
                                            <option value="Supervisor"
                                                <?= (old('role') == 'Supervisor' || $user['role'] == 'Supervisor') ? 'selected' : ''; ?>>
                                                Supervisor</option>
                                            <option value="Administrasi"
                                                <?= (old('role') == 'Administrasi' || $user['role'] == 'Administrasi') ? 'selected' : ''; ?>>
                                                Administrasi</option>
                                            <option value="Penginput"
                                                <?= (old('role') == 'Penginput' || $user['role'] == 'Penginput') ? 'selected' : ''; ?>>
                                                Penginput</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <!-- Pesan kesalahan (jika ada) -->
                                        </div>
                                    </div>



                                    <!-- ... (bagian lain dari formulir) ... -->

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