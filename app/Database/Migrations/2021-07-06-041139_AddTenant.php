<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTenant extends Migration
{
	public function up()
	{
        $this->forge->addField([
                    'tenant_id' => [
                        'type' => 'INT',
                        'constraint' => 5,
                        'auto_increment' => true,
                    ],
                    'full_name' => [
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                        'null' => false
                    ],   
                    'gender' => [
                        'type' => 'VARCHAR',
                        'constraint' => '20',
                        'null' => false
                    ],  
                    'birthdate' => [
                        'type' => 'date',
                    ],
                    'valid_id_type_1' => [
                    	'type'	=>	'VARCHAR',
                    	'constraint'	=>	'100',
                    	'null'		=>	false
                    ],
                    'valid_id_1' => [
                    	'type'	=>	'VARCHAR',
                    	'constraint'	=>	'100',
                    	'null'		=>	false
                    ],
                    'valid_id_type_2' => [
                    	'type'	=>	'VARCHAR',
                    	'constraint'	=>	'100',
                    	'null'		=>	false
                    ],
                    'valid_id_2' => [
                    	'type'	=>	'VARCHAR',
                    	'constraint'	=>	'100',
                    	'null'		=>	false
                    ],
                    'status' => [
                        'type' => 'ENUM',
                        'constraint' => ['1', '2', '3'], //in, occupying, out
                        'default' => '1',
                    ],
                    'updated_at' => [
                        'type' => 'datetime',
                    ],
                    'created_at datetime default current_timestamp',
                ]);
        
                $this->forge->addPrimaryKey('tenant_id');
                $this->forge->createTable('tenant');
	}

	public function down()
	{
		$this->forge->dropTable('tenant');
	}
}
