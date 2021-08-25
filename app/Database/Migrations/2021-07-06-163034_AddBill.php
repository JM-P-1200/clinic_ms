<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBill extends Migration
{
	public function up()
	{
        $this->forge->addField([
                    'bill_id' => [
                        'type' => 'INT',
                        'constraint' => 12,
                        'auto_increment' => true,
                    ],
					'apartment_rental_id' => [
						'type' 				=>	'INT',
					],
                    'bill_date' => [
                        'type' => 'date',
                    ],
                    'electricity' => [
                        'type' => 'float',
                        'constraint' => '11,2',
                        'default'	=>	'0.00'
                    ],
                    'water' => [
                        'type' => 'float',
                        'constraint' => '11,2',
                        'default'	=>	'0.00'
                    ],
                    'rental' => [
                        'type' => 'float',
                        'constraint' => '11,2',
                        'default'	=>	'0.00'
                    ],
                    'total' => [
                        'type' => 'float',
                        'constraint' => '11,2',
                        'default'	=>	'0.00'
                    ],
                    'amount_paid' => [
                        'type' => 'float',
                        'constraint' => '11,2',
                        'default'   =>  '0.00'
                    ],
                    'status' => [
                        'type' => 'int',
                        'default' => '1',
                    ],
                    'updated_at' => [
                        'type' => 'datetime',
                    ],
                    'created_at datetime default current_timestamp',
                ]);
        
                $this->forge->addPrimaryKey('bill_id');
				$this->forge->addForeignKey('apartment_rental_id', 'apartmentrental', 'apartment_rental_id', 'CASCADE', 'CASCADE');
                $this->forge->createTable('bill');
	}

	public function down()
	{
		$this->forge->dropTable('bill');

	}
}
