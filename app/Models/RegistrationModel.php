<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistrationModel extends Model
{
    protected $table = 'users'; // Name of the table in your database
    protected $primaryKey = 'id'; // Primary key of the table
    protected $allowedFields = ['username', 'email', 'password', 'role', 'nama', 'no_wa']; // Fields that can be inserted/updated
    protected $returnType = 'array'; // Return type of the model

    // Method to create a new user
    public function createUser($data)
    {
        // Hash the password before saving
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $this->insert($data); // Inserts the user data into the database
    }

    // Method to check if the username already exists
    public function usernameExists($username)
    {
        return $this->where('username', $username)->first() !== null; // Returns true if username exists
    }

    // Method to check if the email already exists
    public function emailExists($email)
    {
        return $this->where('email', $email)->first() !== null; // Returns true if email exists
    }
}
