<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddApartmentRental extends Migration
{
	public function up()
	{
        $this->forge->addField([
                    'apartment_rental_id' => [
                        'type' => 'INT',
                        'constraint' => 5,
                        'auto_increment' => true,
                    ],
					'tenant_id' => [
						'type' 				=>	'INT',
					],
					'apartment_id' => [
						'type' 				=>	'INT',
					],
                    'start_date' => [
                        'type' => 'date',
                    ],
                    'end_date' => [
                        'type' => 'date',
                    ],
                    'status'	=>	[
                    	'type'	=> 'INT',
                    	'default'	=>	1
                    ],
                    'updated_at' => [
                        'type' => 'datetime',
                    ],
                    'created_at datetime default current_timestamp',
                ]);
        
                $this->forge->addPrimaryKey('apartment_rental_id');
				$this->forge->addForeignKey('tenant_id', 'tenant', 'tenant_id', 'CASCADE', 'CASCADE');
				$this->forge->addForeignKey('apartment_id', 'apartment', 'apartment_id', 'CASCADE', 'CASCADE');
                $this->forge->createTable('apartmentrental');
	}

	public function down()
	{
		$this->forge->dropTable('apartmentrental');
	}
}
