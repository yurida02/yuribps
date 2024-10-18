<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthenticationRoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Pengecekan sesi pengguna
        if (!$session->get('id_user')) {
            // Redirect ke halaman login jika tidak ada sesi
            return redirect()->to('/')->with('error', 'Silahkan login terlebih dahulu.');
        }

        // Pengecekan peran pengguna
        $requiredRole = $arguments['role'] ?? null;

        if ($requiredRole && $session->get('role') !== $requiredRole) {
            // Redirect ke halaman 'Unauthorized' jika peran tidak sesuai
            return redirect()->to('/unauthorized')->with('error', 'Anda tidak memiliki akses untuk halaman tersebut.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Logika setelah eksekusi metode (tidak digunakan dalam contoh ini)
    }
}
