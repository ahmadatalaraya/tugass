<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class ProfileController extends BaseController
{
    public function profile()
    {
        $userId = session()->get('user_id'); // Ambil user_id dari sesi
        $userModel = new UserModel();

        // Cari data pengguna berdasarkan user_id
        $user = $userModel->find($userId);

        // Cek apakah pengguna ditemukan
        if (!$user) {
            return redirect()->to('/admin/dashboard')->with('error', 'User not found.');
        }

        return view('admin/profile/index', ['user' => $user]);
    }

    public function updateProfile()
    {
        $userId = session()->get('user_id'); // Ambil user_id dari sesi
        $userModel = new UserModel();

        // Validasi input form
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama'  => 'required|min_length[3]|max_length[50]', // Validasi untuk nama
            'email' => 'required|valid_email',                // Validasi untuk email
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Data yang akan diupdate
        $data = [
            'nama'  => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
        ];

        // Update data pengguna di database
        if ($userModel->update($userId, $data)) {
            return redirect()->to('/admin/profile')->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update profile. Please try again.');
        }
    }
}
