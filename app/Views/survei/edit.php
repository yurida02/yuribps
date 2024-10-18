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
                        <?php if (session('pesan')): ?>
                        <div class="alert alert-danger alert-dismissible mt-3">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?= session('pesan'); ?>
                        </div>
                        <?php endif; ?>

                        <div class="card-body">
                            <!-- form start -->
                            <form action="/survei/update/<?= $survei['sobat_id']; ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="sobat_id">Sobat Id</label>
                                            <input type="text" name="sobat_id"
                                                class="form-control <?= ($validation->hasError('sobat_id')) ? 'is-invalid' : ''; ?>"
                                                id="sobat_id" placeholder="Masukkan Sobat Id"
                                                value="<?= old('sobat_id', $survei['sobat_id']); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('sobat_id'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nama">Nama Petugas</label>
                                            <input type="text" name="nama"
                                                class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>"
                                                id="nama" placeholder="Masukkan Nama Petugas"
                                                value="<?= old('nama', $survei['nama']); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="kec">Kecamatan</label>
                                            <input type="text" name="kec"
                                                class="form-control <?= ($validation->hasError('kec')) ? 'is-invalid' : ''; ?>"
                                                id="kec" placeholder="Masukkan Kec"
                                                value="<?= old('kec', $survei['kec']); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kec'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" name="alamat"
                                                class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>"
                                                id="alamat" placeholder="Masukkan Alamat"
                                                value="<?= old('alamat', $survei['alamat']); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('alamat'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="status">Status</label>
                                            <input type="text" name="status"
                                                class="form-control <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?>"
                                                id="status" placeholder="Masukkan Status"
                                                value="<?= old('status', $survei['status']); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('status'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="anggaran">Mata Anggaran</label>
                                            <input type="text" name="anggaran"
                                                class="form-control <?= ($validation->hasError('anggaran')) ? 'is-invalid' : ''; ?>"
                                                id="anggaran" placeholder="Masukkan Mata Anggaran"
                                                value="<?= old('anggaran', $survei['anggaran']); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('anggaran'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="keg">Kegiatan</label>
                                            <input type="text" name="keg"
                                                class="form-control <?= ($validation->hasError('keg')) ? 'is-invalid' : ''; ?>"
                                                id="keg" placeholder="Masukkan Kegiatan"
                                                value="<?= old('keg', $survei['keg']); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('keg'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="uraian">Uraian</label>
                                            <textarea name="uraian"
                                                class="form-control <?= ($validation->hasError('uraian')) ? 'is-invalid' : ''; ?>"
                                                id="uraian"
                                                placeholder="Masukkan Uraian"><?= old('uraian', $survei['uraian']); ?></textarea>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('uraian'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="vol">Volume</label>
                                            <input type="number" name="vol"
                                                class="form-control <?= ($validation->hasError('vol')) ? 'is-invalid' : ''; ?>"
                                                id="vol" placeholder="Masukkan Volume"
                                                value="<?= old('vol', $survei['vol']); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('vol'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="satuan">Satuan</label>
                                            <input type="text" name="satuan"
                                                class="form-control <?= ($validation->hasError('satuan')) ? 'is-invalid' : ''; ?>"
                                                id="satuan" placeholder="Masukkan Satuan"
                                                value="<?= old('satuan', $survei['satuan']); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('satuan'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="harga">Harga</label>
                                            <input type="number" name="harga"
                                                class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>"
                                                id="harga" placeholder="Masukkan Harga"
                                                value="<?= old('harga', $survei['harga']); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('harga'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="jumlah">Jumlah</label>
                                            <input type="number" name="jumlah"
                                                class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>"
                                                id="jumlah" placeholder="Masukkan jumlah"
                                                value="<?= old('jumlah', $survei['jumlah']); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jumlah'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="konfirm">Konfirmasi</label>
                                            <select name="konfirm"
                                                class="form-control <?= ($validation->hasError('konfirm')) ? 'is-invalid' : ''; ?>"
                                                id="konfirm">
                                                <option value="1"
                                                    <?= (old('konfirmasi', $survei['konfirm'] ?? false) === true) ? 'selected' : ''; ?>>
                                                    True</option>
                                                <option value="0"
                                                    <?= (old('konfirmasi', $survei['konfirm'] ?? false) === false) ? 'selected' : ''; ?>>
                                                    False</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('konfirm'); ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="/survei" class="btn btn-danger">Batal</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $this->endSection() ?>