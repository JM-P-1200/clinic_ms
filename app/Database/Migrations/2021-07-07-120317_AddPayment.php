<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPayment extends Migration
{
	public function up()
	{
        $this->forge->addField([
                    'payment_id' => [
                        'type' => 'INT',
                        'constraint' => 12,
                        'auto_increment' => true,
                    ],
					'apartment_rental_id' => [
						'type' 				=>	'INT',
					],
                    'bill_id' => [
                        'type'              =>  'INT',
                    ],
                    'amount' => [
                        'type' => 'float',
                        'constraint' => '11,2',
                        'default'	=>	'0.00'
                    ],
                    'pay_date' => [
                        'type' => 'date',
                    ],
                    'updated_at' => [
                        'type' => 'datetime',
                    ],
                    'created_at datetime default current_timestamp',
                ]);
        
                $this->forge->addPrimaryKey('payment_id');
				$this->forge->addForeignKey('apartment_rental_id', 'apartmentrental', 'apartment_rental_id', 'CASCADE', 'CASCADE');
                $this->forge->addForeignKey('bill_id', 'bill', 'bill_id', 'CASCADE', 'CASCADE');
                $this->forge->createTable('payment');
	}

	public function down()
	{
				$this->forge->dropTable('payment');
	}
}
