<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddApartment extends Migration
{
	public function up()
	{
        $this->forge->addField([
                    'apartment_id' => [
                        'type' => 'INT',
                        'constraint' => 5,
                        'auto_increment' => true,
                    ],
                    'number' => [
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                        'null' => false
                    ],     
                    'status' => [
                        'type' => 'ENUM',
                        'constraint' => ['1', '2', '3'], //available, occupied, not available
                        'default' => '1',
                    ],
                    'updated_at' => [
                        'type' => 'datetime',
                    ],
                    'created_at datetime default current_timestamp',
                ]);
        
                $this->forge->addPrimaryKey('apartment_id');
                $this->forge->createTable('apartment');
	}

	public function down()
	{
		$this->forge->dropTable('apartment');
	}
}
