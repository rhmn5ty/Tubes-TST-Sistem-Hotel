<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Location extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'city' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'price_per_night' => [
                'type' => 'INT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('location');
    }

    public function down()
    {
        $this->forge->dropTable('location');
    }
}
