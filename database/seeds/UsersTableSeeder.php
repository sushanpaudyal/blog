<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => 1,
            'name' => 'Sushan Paudyal',
            'username' => 'sushanpaudyal',
            'email' => 'sushan.paudyal@gmail.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'role_id' => 2,
            'name' => 'Jyoti Shrestha',
            'username' => 'jyotishrestha20',
            'email' => 'jyotishrestha20@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
