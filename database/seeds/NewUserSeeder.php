<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NewUserSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->insert([
            'name' => 'sogun',
            'email' => 'admin@gmail.com',
            'type' =>'admin',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'dedy',
            'email' => 'peminjam@gmail.com',
            'type' =>'peminjam',
            'password' => bcrypt('secret'),
        ]);
    }
}
