<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('admin'),
            'role' => 2
        ]);

        User::create([
            'name' => 'Valerie',
            'email' => 'valerie@ched.gov.ph',
            'password' => Hash::make('valerie'),
            'role' => 2
        ]);

        User::create([
            'name' => 'Dave',
            'email' => 'dave@ched.gov.ph',
            'password' => Hash::make('dave'),
            'role' => 2
        ]);

        User::create([
            'name' => 'Krizia',
            'email' => 'krizia@ched.gov.ph',
            'password' => Hash::make('krizia'),
            'role' => 2
        ]);

        User::create([
            'name' => 'Wenna',
            'email' => 'wenna@ched.gov.ph',
            'password' => Hash::make('wenna'),
            'role' => 2
        ]);

        User::create([
            'name' => 'Ronan',
            'email' => 'ronan@ched.gov.ph',
            'password' => Hash::make('admin'),
            'role' => 2
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@test.com',
            'password' => Hash::make('secret'),
            'role' => 1
        ]);
    }
}