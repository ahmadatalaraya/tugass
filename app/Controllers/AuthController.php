<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel(); // Initialize the UserModel
    }

    public function login()
    {
        return view('auth/login'); // Load the login view
    }

    public function attemptLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Coba untuk mendapatkan user berdasarkan username
        $user = $this->userModel->where('username', $username)->first();
        
        // Periksa apakah user ada
        if (!$user) {
            session()->setFlashdata('error', 'User tidak ditemukan.');
            return redirect()->back();
        }
        
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Simpan data sesi
            session()->set([
                'isLoggedIn' => true,
                'username' => $username,
                'role' => $user['role'],
                'user_id' => $user['id'] // Simpan user_id untuk digunakan di ProfileController
            ]);

            // Debug: Periksa peran user sebelum mengarahkan
            switch (strtolower($user['role'])) {
                case 'admin':
                    return redirect()->to(base_url('admin/home'));
                case 'super admin':
                    return redirect()->to(base_url('superadmin/home'));
                case 'user':
                    return redirect()->to(base_url('user/dashboard'));
                default:
                    session()->setFlashdata('error', 'Peran tidak valid: ' . $user['role']);
                    return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Password salah.');
            return redirect()->back();
        }
    }

    public function logout()
    {
        session()->destroy(); // Clear the session
        return redirect()->to('/login'); // Redirect to login page after logout
    }
}
