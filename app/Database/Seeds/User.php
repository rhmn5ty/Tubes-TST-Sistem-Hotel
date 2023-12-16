<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $data = [
            'name'     => 'admin',
            'email'    => 'admin@gmail.com',
            'password' => md5('admin'),
            'role'     => 'admin'
        ];

        $data2 = [
            'name'     => 'user',
            'email'    => 'user@gmail.com',
            'password' => md5('user'),
            'role'     => 'customer'
        ];
        $this->db->table('users')->insert($data);
        $this->db->table('users')->insert($data2);
    }
}