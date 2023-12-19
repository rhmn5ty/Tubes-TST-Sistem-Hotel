<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Reservation extends Seeder
{
    public function run()
    {
        $data = [
            'user_id' => 2,
            'location_id' => 1,
            'total_rooms' => 20,
            'check_in_date' => '2023/12/27',
            'total_nights' => 2,
            'check_out_date' => '2023/12/29',
            'total_cost' => 40000000,

        ];

        $data2 = [
            'user_id' => 2,
            'location_id' => 2,
            'total_rooms' => 5,
            'check_in_date' => '2023/12/16',
            'total_nights' => 2,
            'check_out_date' => '2023/12/18',
            'total_cost' => 6000000,

        ];

        $data3 = [
            'user_id' => 2,
            'location_id' => 3,
            'total_rooms' => 3,
            'check_in_date' => '2023/12/19',
            'total_nights' => 2,
            'check_out_date' => '2023/12/21',
            'total_cost' => 5400000,

        ];


        $this->db->table('reservation')->insert($data);
        $this->db->table('reservation')->insert($data2);
        $this->db->table('reservation')->insert($data3);
    }
}