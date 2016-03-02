<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call('AdminTableSeeder');
    }
}

class AdminTableSeeder extends Seeder{
	public function run(){
		DB::table('admins')->insert([
			['name' => 'Admin','email'=> 'admin@gmail.com','password' => Hash::make(123456)]
		]);
	}
}
