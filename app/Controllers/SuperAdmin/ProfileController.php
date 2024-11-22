<?php

namespace App\Controllers\SuperAdmin;
use App\Controllers\BaseController;

use App\Models\UserModel;

class SuperAdminController extends BaseController
{
    public function profile()
    {
        $userId = session()->get('user_id'); // Ambil user_id dari sesi
        $userModel = new UserModel();
        $user = $userModel->find($userId);

        return view('superadmin/profile', ['user' => $user]);
    }

    public function updateProfile()
    {
        $userId = session()->get('user_id');
        $userModel = new UserModel();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->with('errors', $validation->getErrors());
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];

        $userModel->update($userId, $data);

        return redirect()->to('/superadmin/profile')->with('success', 'Profile updated successfully.');
    }
}
