<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Reservation extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'reservation_id' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'INT',
            ],
            'location_id' => [
                'type' => 'INT',
            ],
            'total_rooms' => [
                'type' => 'INT',
            ],
            'check_in_date' => [
                'type' => 'DATE',
            ],
            'total_nights' =>[
                'type' => 'INT',
            ],
            'check_out_date' => [
                'type' => 'DATE',
            ],
            'total_cost' => [
                'type' => 'INT',
            ],
        ]);
        $this->forge->addKey('reservation_id', true);
        $this->forge->addForeignKey('user_id', 'users', 'user_id');
        $this->forge->addForeignKey('location_id', 'location', 'id');
        $this->forge->createTable('reservation');
    }

    public function down()
    {
        $this->forge->dropTable('reservation');
    }
}
