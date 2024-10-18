<!DOCTYPE html>
<html>

<head>
    <title>Data Survei</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        font-size: 10px; /* Mengurangi ukuran font */
    }

    .header {
        text-align: center;
    }

    .alamat {
        text-align: center;
        margin-bottom: 20px;
        border-bottom: 1px solid black;
    }

    .nomor-cetak {
        text-align: right;
        font-size: 10px; /* Ukuran font lebih kecil */
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        table-layout: fixed; /* Menjaga tabel agar tidak melebar */
    }

    table, th, td {
        border: 1px solid black;
    }

    th {
        padding: 8px;
        text-align: left;
        color: #fff;
        background-color: #333;
        font-size: 7px; /* Mengurangi ukuran font */
    }

    td {
        padding: 8px;
        text-align: left;
        font-size: 7px; /* Ukuran font lebih kecil */
        word-wrap: break-word; /* Membungkus kata agar tidak keluar kolom */
    }
</style>

</head>

<body>
    <div class="header">
        <h1>BADAN PUSAT STATISTIK TANAH LAUT</h1>
    </div>

    <div class="alamat">
        <p>Jl. A. Syairani No.9, Pelaihari, Kab. Tanah Laut, Prov. Kalimantan Selatan</p>
    </div>

    <div class="nomor-cetak">
        <p>Nomor Cetak: <?= date('YmdHis'); ?></p>
    </div>

    <table>
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
            </tr>
        </thead>
        <tbody>
            
            <?php foreach($survei as $row): ?>
            <tr>

                <td><?= $row['sobat_id']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['kec']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td><?= $row['status']; ?></td>
                <td><?= $row['anggaran']; ?></td>
                <td><?= $row['keg']; ?></td>
                <td><?= $row['uraian']; ?></td>
                <td><?= $row['vol']; ?></td>
                <td><?= $row['satuan']; ?></td>
                <td><?= 'Rp ' . number_format($row['harga'], 0, ',', '.'); ?></td>
                <td><?= 'Rp ' . number_format($row['jumlah'], 0, ',', '.'); ?></td>
                <td><?= $row['bulan']; ?></td>
                <td><?= $row['konfirm']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
