<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Shohel Rana',
            'email' => 'shohelrrrana@gmail.com',
            'password' => bcrypt('1122')
        ]);
    }
}
