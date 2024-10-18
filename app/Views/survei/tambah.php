php
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
                            <form action="/survei/simpan" method="post">
                                <?= csrf_field(); ?>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="sobat_id">Sobat Id</label>
                                            <input type="text" name="sobat_id"
                                                class="form-control <?= ($validation->hasError('sobat_id')) ? 'is-invalid' : ''; ?>"
                                                id="sobat_id" placeholder="Masukkan Sobat Id"
                                                value="<?= old('sobat_id'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('sobat_id'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nama">Nama Petugas</label>
                                            <input type="text" name="nama"
                                                class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>"
                                                id="nama" placeholder="Masukkan Nama Petugas"
                                                value="<?= old('nama'); ?>">
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
                                                id="kec" placeholder="Masukkan Kecamatan" value="<?= old('kec'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kec'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" name="alamat"
                                                class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>"
                                                id="alamat" placeholder="Masukkan Alamat" value="<?= old('alamat'); ?>">
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
                                                id="status" placeholder="Masukkan Status" value="<?= old('status'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('status'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="anggaran">Mata Anggaran</label>
                                            <input type="text" name="anggaran"
                                                class="form-control <?= ($validation->hasError('anggaran')) ? 'is-invalid' : ''; ?>"
                                                id="anggaran" placeholder="Masukkan Mata Anggaran"
                                                value="<?= old('anggaran'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('anggaran'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="kegiatan">Kegiatan</label>
                                            <input type="text" name="keg"
                                                class="form-control <?= ($validation->hasError('keg')) ? 'is-invalid' : ''; ?>"
                                                id="keg" placeholder="Masukkan Kegiatan" value="<?= old('keg'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('keg'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="uraian">Uraian</label>
                                            <textarea name="uraian"
                                                class="form-control <?= ($validation->hasError('uraian')) ? 'is-invalid' : ''; ?>"
                                                id="uraian"
                                                placeholder="Masukkan Uraian"><?= old('uraian'); ?></textarea>
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
                                                id="vol" placeholder="Masukkan Volume" value="<?= old('vol'); ?>" oninput="calculateTotal()">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('vol'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="satuan">Satuan</label>
                                            <select name="satuan"
                                                class="form-control <?= ($validation->hasError('satuan')) ? 'is-invalid' : ''; ?>"
                                                id="satuan">
                                                <option value="">Pilih Satuan</option>
                                                <option value="Dokumen"
                                                    <?= (old('satuan') === 'Dokumen') ? 'selected' : ''; ?>>Dokumen
                                                </option>
                                                <option value="Segmen"
                                                    <?= (old('satuan') === 'Segmen') ? 'selected' : ''; ?>>Segmen
                                                </option>
                                            </select>
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
                                                id="harga" placeholder="Masukkan Harga" value="<?= old('harga'); ?>" oninput="calculateTotal()">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('harga'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="jumlah">Jumlah</label>
                                            <input type="number" name="jumlah" id="jumlah" readonly 
                                                class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>"
                                                value="<?= old('jumlah'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jumlah'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="bulan">Bulan</label>
                                            <select name="bulan"
                                                class="form-control <?= ($validation->hasError('bulan')) ? 'is-invalid' : ''; ?>"
                                                id="bulan">
                                                <option value="">-- Pilih Bulan --</option>
                                                <option value="Januari">Januari</option>
                                                <option value="Februari">Februari</option>
                                                <option value="Maret">Maret</option>
                                                <option value="April">April</option>
                                                <option value="Mei">Mei</option>
                                                <option value="Juni">Juni</option>
                                                <option value="Juli">Juli</option>
                                                <option value="Agustus">Agustus</option>
                                                <option value="September">September</option>
                                                <option value="Oktober">Oktober</option>
                                                <option value="November">November</option>
                                                <option value="Desember">Desember</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('bulan'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="konfirm">Konfirmasi</label>
                                            <select name="konfirm"
                                                class="form-control <?= ($validation->hasError('konfirm')) ? 'is-invalid' : ''; ?>"
                                                id="konfirm">
                                                <option value="">-- Pilih Konfirmasi --</option>
                                                <option value="false">False</option>
                                                <option value="true">True</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('konfirm'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <a class="btn btn-warning" href="/survei">Kembali</a>
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
<script>
    function calculateTotal() {
        var volume = document.getElementById('vol').value;
        var harga = document.getElementById('harga').value;
        var jumlah = volume * harga;
        document.getElementById('jumlah').value = jumlah;
    }
</script>
<?= $this->EndSection() ?>