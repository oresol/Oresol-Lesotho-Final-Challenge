<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Clear existing users
        User::truncate();

        // Create sample user
        User::create([
            'name' => 'Nosi Chefane',
            'email' => 'nosichefane@gmail.com',
            'password' => bcrypt('12345'),
        ]);

    }
}
