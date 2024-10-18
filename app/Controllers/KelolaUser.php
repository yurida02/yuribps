<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;



class KelolaUser extends BaseController
{

    protected $UserModel;

    public function __construct()
    {
        $this->UserModel = new LoginModel();

    }

    public function index()
    {
        $session = session();

        // Pengecekan peran pengguna
        if ($session->get('role') !== 'Admin' && $session->get('role') !== 'Supervisor' && $session->get('role') !== 'Administrasi' && $session->get('role') !== 'Penginput') {

            return redirect()->to('/unauthorized')->with('error', 'Anda tidak memiliki akses untuk halaman tersebut.');
        }
        
        $data = [
            'title' => 'User',
            'user' => $this->UserModel->findAll()
        ];
        return view('kelola_user/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah User',
            'validation' => \Config\Services::validation()
        ];
        return view('kelola_user/tambah', $data);
    }

    public function simpan()
    {
        $validationRules = [
            'username' => [
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => 'Username harus diisi.',
                    'is_unique' => 'Username sudah terdaftar.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password harus diisi.',
                    'min_length' => 'Password minimal 8 karakter.'
                ]
            ],
            'password2' => [
                'rules' => 'required|matches[password]',
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi.'
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role harus diisi.'
                ]
            ]
        ];
        if(!$this->validate($validationRules)) {
            session()->setFlashdata('pesan', 'Data user belum disi');
           return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
   }
      

        $this->UserModel->save([
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT, ['cost' => 12]), // mengubah pssword menjadi has
            'no_telepon' => $this->request->getVar('no_telepon'), // tambahkan field 'no_telepon
            'nama' => $this->request->getVar('nama'),
            'role' => $this->request->getVar('role')
        ]);
        return redirect()->to('/kelola-user')->with('success', 'User berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $data = [
            'title' => 'Edit User',
            'user' => $this->UserModel->find($id)
        ];

        return view('kelola_user/edit', $data);
    }

    public function update($id)
    {
        $data = $this->request->getVar();
        // dd($data);

        if ($data['password'] != null) {
            if ($data['password2'] != null) {
                if ($data['password'] == $data['password2']) {
                    $this->UserModel->update($id, [
                        'username' => $this->request->getVar('username'),
                        'password' => password_hash($data['password'], PASSWORD_DEFAULT, ['cost' => 12]),
                        'no_telepon' => $this->request->getPost('no_telepon'),
                        'nama' => $this->request->getVar('nama'),
                        'role' => $this->request->getVar('role')
                    ]);
                    return redirect()->to('/kelola-user')->with('success', 'User berhasil diupdate.');
                } else {
                    return redirect()->back()->with('error', 'Gagal password baru tidak sama');
                }
            } else {
                return redirect()->back()->with('error', 'Harap konfirmasi password baru anda');
            }
        } else {
            $this->UserModel->update($id, [
                'username' => $this->request->getVar('username'),
                'password' => '',
                'no_telepon' => $this->request->getPost('no_telepon'),
                'nama' => $this->request->getVar('nama'),
                'role' => $this->request->getVar('role')
            ]);
            return redirect()->to('/kelola-user')->with('success', 'User berhasil diupdate.');
        }
    }

    public function hapus($id)
    {
        $this->UserModel->delete($id);
        return redirect()->to('/kelola-user')->with('success', 'User berhasil dihapus.');
    }
}