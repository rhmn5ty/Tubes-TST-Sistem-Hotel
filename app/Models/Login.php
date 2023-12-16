<?php
namespace App\Models;

use CodeIgniter\Model;

class Login extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['user_id', 'name', 'email', 'password', 'role'];
    public function getDataUsers($email, $password)
    {
        $db = \Config\Database::connect();
        $queryString = 'SELECT user_id, name, role FROM users WHERE 
                        email = "' . $email . '" 
                        AND password = "' . $password . '"';
        $query = $db->query($queryString);
        $result = $query->getRow();
        return ($result) ? $result : null;
    }

    public function isUserRegistered($email)
    {
        return $this->where(['email' => $email])->first();
    }

    public function saveDataUsers($email, $password, $username)
    {
        $this->save([
            'name'=> $username,
            'email' => $email,
            'password'=> $password,
            'role' => 'user'
            ]);
    }
}
