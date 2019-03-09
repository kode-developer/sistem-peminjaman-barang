<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NewUserSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->insert([
            'name' => 'sogun',
            'email' => 'sogun.kwn@gmail.com',
            'type' =>'admin',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'peminjam',
            'email' => 'dedy.darmawan25@gmail.com',
            'type' =>'peminjam',
            'password' => bcrypt('secret'),
        ]);
    }
}
