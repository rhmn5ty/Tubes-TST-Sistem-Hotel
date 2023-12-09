<?php
namespace App\Models;

use CodeIgniter\Model;

class Login extends Model
{
    public function getDataUsers($email, $password)
    {
        $db = \Config\Database::connect();
        $queryString = 'SELECT name, role FROM users WHERE 
                        email = "' . $email . '" 
                        AND password = "' . $password . '"';
        $query = $db->query($queryString);
        $result = $query->getRow();
        return ($result) ? $result : null;
    }
}
