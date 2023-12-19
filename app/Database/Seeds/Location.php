<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Location extends Seeder
{
    public function run()
    {
        $data = [
            'city' => 'Denpasar',
            'description' => 'Hotel di denpasar',
            'price_per_night' => 1000000
        ];

        $data2 = [
            'city' => 'Surabaya',
            'description' => 'Hotel di Surabaya',
            'price_per_night' => 600000
        ];

        $data3 = [
            'city' => 'Jakarta',
            'description' => 'Hotel di Jakarta',
            'price_per_night' => 900000
        ];

        $this->db->table('location')->insert($data);
        $this->db->table('location')->insert($data2);
        $this->db->table('location')->insert($data3);
    }
}