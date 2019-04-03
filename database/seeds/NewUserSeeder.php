<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NewUserSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'type' =>'admin',
            'password' => bcrypt('secret'),
        ]);

      
    }
}
