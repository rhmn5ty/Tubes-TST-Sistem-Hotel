<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Location extends Seeder
{
    public function run()
    {
        $data = [
            'city'    => 'Bandung',
            'description' => 'Hotel di bandung',
            'price_per_night' => 1000000
        ];

        $data2 = [
            'city'    => 'Surabaya',
            'description' => 'Hotel di Surabaya',
            'price_per_night' => 600000
        ];

        $this->db->table('location')->insert($data);
        $this->db->table('location')->insert($data2);
    }
}