<?php

namespace App\Controllers;

use App\Models\SurveiModel;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Survei extends BaseController
{
    protected $surveiModel;

    public function __construct()
    {
        $this->surveiModel = new SurveiModel();
    }

    // Menampilkan daftar survei
    public function index()
    {
        $session = session();

        // Pengecekan peran pengguna
        if (!in_array($session->get('role'), ['Admin', 'Supervisor', 'Penginput', 'Administrasi'])) {
            return redirect()->to('/unauthorized')->with('error', 'Anda tidak memiliki akses untuk halaman tersebut.');
        }

        $data = [
            'title' => 'Survei',
            'survei' => $this->surveiModel->findAll() // Mengambil data survei dari model
        ];

        return view('survei/index', $data); // Mengirim data ke tampilan
    }

    // Menampilkan form tambah survei
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Survei',
            'validation' => \Config\Services::validation()
        ];

        return view('survei/tambah', $data);
    }

    // Menyimpan data survei baru
    public function simpan()
    {
        // Validasi input
        if (!$this->validate([
            'sobat_id' => 'required',
            'nama' => 'required',
            'kec' => 'required',
            'alamat' => 'required',
            'status' => 'required',
            'anggaran' => 'required',
            'keg' => 'required',
            'uraian' => 'required',
            'vol' => 'required|numeric',
            'satuan' => 'required',
            'harga' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'bulan' => 'required',
            'konfirm' => 'required',
        ])) {
            return redirect()->to('/survei/tambah')->withInput()->with('validation', \Config\Services::validation());
        }

        // Mengambil data dari input form
        $data = $this->request->getPost();

        // Simpan data survei baru ke database
        $this->surveiModel->insert($data);

        // Mengarahkan kembali ke halaman daftar dengan pesan sukses
        session()->setFlashdata('pesan', 'Data survei berhasil ditambahkan');
        return redirect()->to('/survei');
    }

    // Menampilkan form edit survei
    public function edit($sobat_id)
    {
        // Ambil data survei berdasarkan sobat_id
        $survei = $this->surveiModel->find($sobat_id);

        // Cek apakah survei ditemukan
        if (!$survei) {
            return redirect()->to('/survei')->with('error', 'Data survei tidak ditemukan.');
        }

        $data = [
            'title' => 'Ubah Survei',
            'validation' => \Config\Services::validation(),
            'survei' => $survei // Kirim data survei ke tampilan
        ];

        return view('survei/edit', $data); // Pastikan Anda memiliki view edit untuk menampilkan form
    }

    // Menyimpan perubahan data survei
    public function update($sobat_id)
    {
        // Validasi input
        if (!$this->validate([
            'nama' => 'required',
            'kec' => 'required',
            'alamat' => 'required',
            'status' => 'required',
            'anggaran' => 'required',
            'keg' => 'required',
            'uraian' => 'required',
            'vol' => 'required|numeric',
            'satuan' => 'required',
            'harga' => 'required|numeric',
            'jumlah' => 'required|numeric',
            'bulan' => 'required',
            'konfirm' => 'required',
        ])) {
            return redirect()->to('/survei/edit/' . $sobat_id)->withInput()->with('validation', \Config\Services::validation());
        }

        // Mengambil data dari input form
        $data = $this->request->getPost();

        // Update data survei
        if ($this->surveiModel->update($sobat_id, $data)) {
            return redirect()->to('/survei')->with('success', 'Survei berhasil diubah.');
        } else {
            return redirect()->to('/survei')->with('error', 'Gagal mengubah data. Silakan coba lagi.');
        }
    }

    // Menghapus data survei
    public function hapus($sobat_id)
    {
        $this->surveiModel->delete($sobat_id);
        return redirect()->to('/survei')->with('success', 'Survei berhasil dihapus.');
    }

    // Cetak PDF
    public function cetakPdf()
{
    // Ambil bulan dari input menggunakan GET
    $bulan = $this->request->getGet('bulan');

    // Pastikan bulan valid
    if (!$bulan) {
        return redirect()->back()->with('error', 'Bulan tidak valid');
    }

    // Filter data survei berdasarkan bulan
    $data['survei'] = $this->surveiModel->filterdatabulan($bulan);

    // Konfigurasi dompdf
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isPhpEnabled', true);

    $dompdf = new Dompdf($options);

    // Load view ke dalam dompdf
    $html = view('survei/cetak_pdf', $data);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Keluarkan PDF ke browser
    $dompdf->stream('cetak_survei_bulan_' . $bulan . '.pdf', ['Attachment' => 0]);
}



    // Cetak Excel
    public function cetakExcel()
    {
        $survei = $this->surveiModel->findAll();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Judul kolom
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Sobat ID');
        $sheet->setCellValue('C1', 'Nama');
        $sheet->setCellValue('D1', 'Kecamatan');
        $sheet->setCellValue('E1', 'Alamat');
        $sheet->setCellValue('F1', 'Status');
        $sheet->setCellValue('G1', 'Anggaran');
        $sheet->setCellValue('H1', 'Kegiatan');
        $sheet->setCellValue('I1', 'Uraian');
        $sheet->setCellValue('J1', 'Volume');
        $sheet->setCellValue('K1', 'Satuan');
        $sheet->setCellValue('L1', 'Harga');
        $sheet->setCellValue('M1', 'Jumlah'); // Corrected column
        $sheet->setCellValue('N1', 'Bulan');
        $sheet->setCellValue('O1', 'Konfirmasi');

        // Data
        $row = 2;
        $no = 1;
        foreach ($survei as $data) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $data['sobat_id']);
            $sheet->setCellValue('C' . $row, $data['nama']);
            $sheet->setCellValue('D' . $row, $data['kec']);
            $sheet->setCellValue('E' . $row, $data['alamat']);
            $sheet->setCellValue('F' . $row, $data['status']);
            $sheet->setCellValue('G' . $row, $data['anggaran']);
            $sheet->setCellValue('H' . $row, $data['keg']);
            $sheet->setCellValue('I' . $row, $data['uraian']);
            $sheet->setCellValue('J' . $row, $data['vol']);
            $sheet->setCellValue('K' . $row, $data['satuan']);
            $sheet->setCellValue('L' . $row, $data['harga']);
            $sheet->setCellValue('M' . $row, $data['jumlah']);
            $sheet->setCellValue('N' . $row, $data['bulan']);
            $sheet->setCellValue('O' . $row, $data['konfirm']);
            $row++;
        }

        // Simpan ke file dan download
        $writer = new Xlsx($spreadsheet);
        $filename = 'data_survei_' . date('YmdHis') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
