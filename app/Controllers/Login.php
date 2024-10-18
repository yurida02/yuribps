<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;


class Login extends BaseController
{

    protected $loginModel;

    public function __construct() //supaya berjalan keseluruhan, untuk memanggil yang pasti digunakan untuk fungsi yang pertama kali dieksekusi atau yang dijlnkan
    {
        $this->LoginModel = new LoginModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Login'
            
        ];
        return view('login/index', $data);
    }

    public function unauthorized()
    {
        $data = [
            'title' => 'Unauthorized'
        ];
        return view('login/unauthorized', $data);
    }

    public function processLogin()
    {

       

        // Proses login
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        //Kemudian, mencari data pengguna dalam database berdasarkan username.
        $user = $this->LoginModel->where('username', $username)->first(); // Ambil data user berdasarkan username 

        //Kode ini memverifikasi apakah password yang dimasukkan oleh pengguna 
        //sesuai dengan password yang dihash dalam database menggunakan password_verify.
        if ($user && password_verify($password, $user['password'])) {
            // Set session jika login berhasil
            $session = session(); // Session waktu interaksi dengan website, fungsi untuk menyimpan data user ke website, dan untuk mengatur 
            $session->set([
                'id_user' => $user['id_user'],
                'nama' => $user['nama'],
                'username' => $user['username'],
                'role' => $user['role']
            ]); // Set session untuk id_user, nama, username, dan role dari data user yang login

            // Redirect ke halaman dashboard
            return redirect()->to('/dashboard')->with('success', 'Login berhasil ' . $user['nama']);
        } else {
            //maka akan mengembalikan pengguna ke halaman awal ("/") dengan pesan kesalahan.
            return redirect()->to('/')->with('error', 'Login failed. Please check your username and password.');
        }
    }



    public function logout()
    {
        // hapus session
        $session = session();
        $session->destroy();

        // redirect ke halaman login
        return redirect()->to('/')->with('success', 'Logout berhasil');
    }


}