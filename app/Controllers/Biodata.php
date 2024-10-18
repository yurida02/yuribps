<?php

namespace App\Controllers;

use App\Models\BiodataModel;
use App\Controllers\BaseController;

class Biodata extends BaseController
{
    protected $biodataModel;

    public function __construct()
    {
        $this->biodataModel = new BiodataModel();
    }

    public function index()
    {
        $data['title'] = 'Biodata';
        
        // Ambil data biodata dan hitung jumlahnya
        $data['biodataCount'] = $this->biodataModel->countAll(); // Hitung jumlah biodata
        $data['biodata'] = $this->biodataModel->getBiodata(); // Ambil data biodata
    
        return view('biodata/index', $data); // Kirim data ke view
    }
    

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Biodata',
            'validation' => \Config\Services::validation()

        ];

        return view('biodata/tambah', $data);

    }

    public function simpan()
    {
        // Check if sobat_id already exists
        if ($this->biodataModel->where(['sobat_id' => $this->request->getVar('sobat_id')])->first()) {
            session()->setFlashdata('errors', ['sobat_id' => 'Sobat ID sudah ada']);
            return redirect()->back()->withInput();
        }
    
        // Validation rules for input
        $validationRules = [
            'sobat_id' => [
                'rules' => 'required|alpha_numeric', // Assuming sobat_id can have letters and numbers
                'errors' => [
                    'required' => 'Kolom Sobat ID harus diisi',
                    'alpha_numeric' => 'Kolom Sobat ID hanya boleh berisi huruf dan angka',
                ],
            ],
            'nama' => [
                'rules' => 'required|alpha_space', // Assuming names can have spaces
                'errors' => [
                    'required' => 'Kolom Nama harus diisi',
                    'alpha_space' => 'Kolom Nama hanya boleh berisi huruf dan spasi',
                ],
            ],
            'kecamatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Kecamatan harus diisi',
                ],
            ],
            'desa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Desa harus diisi',
                ],
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Alamat harus diisi',
                ],
            ],
            'username' => [
    'rules' => 'required|regex_match[/^[a-zA-Z0-9_]+$/]',
    'errors' => [
        'required' => 'Kolom Username harus diisi',
        'regex_match' => 'Kolom Username hanya boleh berisi huruf, angka, dan underscore',
    ],
],

            'no_hp' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Kolom Nomor HP harus diisi',
                    'numeric' => 'Kolom Nomor HP hanya boleh berisi angka',
                ],
            ],
        ];
    
        // Validate input
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        // Save the biodata to the database
        // $this->biodataModel->save([
        //     'sobat_id' => $this->request->getVar('sobat_id'),
        //     'nama' => $this->request->getVar('nama'),
        //     'kecamatan' => $this->request->getVar('kecamatan'),
        //     'desa' => $this->request->getVar('desa'),
        //     'alamat' => $this->request->getVar('alamat'),
        //     'username_sobat' => $this->request->getVar('username'),
        //     'no_hp' => $this->request->getVar('no_hp')
        // ]);

        $this->biodataModel->save([
            'sobat_id' => $this->request->getVar('Sobat_id'),
            'nama' => $this->request->getVar('nama'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'desa' => $this->request->getVar('desa'),
            'alamat' => $this->request->getVar('alamat'),
            'username_sobat' => $this->request->getVar('username'),
            'no_hp' => $this->request->getVar('no_hp')
        ]);

        
    
        // Set success message and redirect
        session()->setFlashdata('pesan', 'Data biodata berhasil ditambahkan');
        return redirect()->to('/biodata');
    }
    
    // Function to show the form to edit barang data
    public function edit($id)
    {
        $biodata = $this->biodataModel->find($id);
    
        if (!$biodata) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data biodata tidak ditemukan.');
        }
    
        $data = [
            'title' => 'Edit Data Biodata',
            'validation' => \Config\Services::validation(),
            'biodata' => $biodata,
        ];
    
        return view('biodata/edit', $data);
    }
    
    public function update($id)
    {
        $validationRules = [
            'sobat_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Sobat ID harus diisi.',
                ],
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Nama harus diisi.',
                ],
            ],
            'kecamatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Kecamatan harus diisi.',
                ],
            ],
            'desa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Desa harus diisi.',
                ],
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Alamat harus diisi.',
                ],
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Username harus diisi.',
                ],
            ],
            'no_hp' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Kolom No HP harus diisi.',
                    'numeric' => 'Kolom No HP harus berupa angka.',
                ],
            ],
        ];
    
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        } else {
            session()->remove('errors');
        }
    
        $data = [
            'sobat_id' => $this->request->getVar('sobat_id'),
            'nama' => $this->request->getVar('nama'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'desa' => $this->request->getVar('desa'),
            'alamat' => $this->request->getVar('alamat'),
            'username_sobat' => $this->request->getVar('username'),
            'no_hp' => $this->request->getVar('no_hp'),
        ];
    
        $this->biodataModel->update($id, $data);
        session()->setFlashdata('pesan', 'Data Biodata berhasil diubah.');
        return redirect()->to('/biodata');
    }
    
    
    public function hapus($id)
    {
        $this->biodataModel->delete($id);
        session()->setFlashdata('pesan', 'Data Biodata Berhasil Dihapus');
        return redirect()->to('/biodata');
}
}