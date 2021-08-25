<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class AdminSeeder extends Seeder
{
	public function run()
	{
		for($i = 0; $i < 3; $i++) {
            $this->db->table('admin')->insert($this->generateAdmins());
        }


        $this->db->table('admin')->insert([
            'full_name' => 'Ceciron Alejo III',
            'username'   => 'superadmin1',
            'email'      => 'superadmin1@gmail.com',
            'password'   => password_hash('admin', PASSWORD_DEFAULT),
        ]);


        
	}
    
    private function generateAdmins() : array {
        $faker = Factory::create();
        
        return [
            'full_name' => $faker->name(),
            'username'	 =>	$faker->firstName() . $faker->randomDigit(),
            'email'      => $faker->email,
            'password'   => password_hash('admin', PASSWORD_DEFAULT),
        ];
    }
}
