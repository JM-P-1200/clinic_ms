<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSettings extends Migration
{
	public function up()
	{
        $this->forge->addField([
                    'settings_id' => [
                        'type' => 'INT',
                        'constraint' => 12,
                        'auto_increment' => true,
                    ],
                    'rental_fee' => [
                        'type' => 'float',
                        'constraint' => '11,2',
                        'default'	=>	'0.00'
                    ],
                    'updated_at' => [
                        'type' => 'datetime',
                    ],
                    'created_at datetime default current_timestamp',
                ]);
        
                $this->forge->addPrimaryKey('settings_id');
                $this->forge->createTable('settings');
	}

	public function down()
	{
		$this->forge->dropTable('settings');
	}
}
