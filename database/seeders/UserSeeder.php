<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'John',
            'lastname' => 'Doe',
            'gender' => 'male',
            'telephone' => '+26656872882',
            'position' => 'admin',
            'email' => 'mapilokom@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
