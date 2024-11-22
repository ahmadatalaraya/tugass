<?php

namespace App\Controllers;

use App\Models\RegistrationModel;
use CodeIgniter\Controller;

class RegisterController extends Controller
{
    protected $registrationModel;

    public function __construct()
    {
        $this->registrationModel = new RegistrationModel(); // Initialize the RegistrationModel
    }

    public function register()
    {
        return view('auth/register'); // Load the registration view
    }

    public function attemptRegister()
    {
        $nama = $this->request->getPost('nama');
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');
        $role = $this->request->getPost('role');
        $no_wa = $this->request->getPost('no_wa'); // Get the WhatsApp number

        // Validate form input
        if ($password !== $confirmPassword) {
            session()->setFlashdata('error', 'Password and Confirm Password do not match.');
            return redirect()->back();
        }

        // Validate no_wa (numeric and within the length limits)
        if (!is_numeric($no_wa) || strlen($no_wa) < 10 || strlen($no_wa) > 15) {
            session()->setFlashdata('error', 'Invalid WhatsApp number.');
            return redirect()->back();
        }

        // Check if username or email already exists
        if ($this->registrationModel->usernameExists($username)) {
            session()->setFlashdata('error', 'Username already exists.');
            return redirect()->back();
        }

        if ($this->registrationModel->emailExists($email)) {
            session()->setFlashdata('error', 'Email already exists.');
            return redirect()->back();
        }

        // Create user
        $data = [
            'nama' => $nama,
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT), // Hash the password
            'role' => $role,
            'no_wa' => $no_wa, // Include the WhatsApp number
        ];

        if ($this->registrationModel->createUser($data)) {
            session()->setFlashdata('success', 'Registration successful! You can now log in.');
            return redirect()->to('/login'); // Redirect to login page after successful registration
        } else {
            session()->setFlashdata('error', 'Registration failed. Please try again.');
            return redirect()->back();
        }
    }
}
