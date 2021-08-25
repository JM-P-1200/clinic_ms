<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAdmin extends Migration
{
	public function up()
	{
        $this->forge->addField([
                    'admin_id' => [
                        'type' => 'INT',
                        'constraint' => 5,
                        'auto_increment' => true,
                    ],
                    'full_name' => [
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                        'null' => false
                    ],    
                    'username' => [
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                        'null' => false
                    ],         
                    'email' => [
                        'type' => 'VARCHAR',
                        'constraint' => '255',
                        'null' => false
                    ],    
                    'password' => [
                        'type' => 'VARCHAR',
                        'constraint' => '500',
                        'null' => false
                    ],    
                    'role' => [
                        'type' => 'ENUM',
                        'constraint' => ['1', '2'],
                        'default' => '1',
                    ],
                    'updated_at' => [
                        'type' => 'datetime',
                    ],
                    'created_at datetime default current_timestamp',
                ]);
        
                $this->forge->addPrimaryKey('admin_id');
                $this->forge->createTable('admin');

	}

	public function down()
	{
		$this->forge->dropTable('admin');
	}
}
