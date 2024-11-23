<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class ProfileController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function profile()
    {
        $data['user'] = $this->userModel->find(session()->get('user_id'));
        return view('admin/profile/index', $data);
    }

    public function updateProfile()
    {
        $userId = session()->get('user_id');

        // Debugging: Log userId
        log_message('debug', 'User ID: ' . $userId);

        if (!$userId) {
            return redirect()->back()->with('errors', 'User ID not found in session.');
        }

        $validation = \Config\Services::validation();

        $validation->setRules([
            'nama' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|max_length[255]',
            'username' => 'required|min_length[3]|max_length[255]',
            'password' => 'required|min_length[6]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $this->userModel->where('id', $userId)->set([
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ])->update();

        return redirect()->to('/admin/profile')->with('success', 'Profile updated successfully.');
    }
}
