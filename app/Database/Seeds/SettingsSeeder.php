<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SettingsSeeder extends Seeder
{
	public function run()
	{
		$this->db->table('settings')->insert([
			'rental_fee'	=>	1000
		]);
	}
}
