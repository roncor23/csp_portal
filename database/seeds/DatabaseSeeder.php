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
            'name' => 'Super_Admin',
            'email' => 'superadmin@ched.gov.ph',
            'password' => Hash::make('superadmin'),
            'role' => 4
        ]);

        User::create([
            'name' => 'Valerie',
            'email' => 'valerie@ched.gov.ph',
            'password' => Hash::make('123456'),
            'role' => 2
        ]);

        User::create([
            'name' => 'Dave',
            'email' => 'dave@ched.gov.ph',
            'password' => Hash::make('123456'),
            'role' => 2
        ]);

        User::create([
            'name' => 'Krizia',
            'email' => 'krizia@ched.gov.ph',
            'password' => Hash::make('123456'),
            'role' => 2
        ]);

        User::create([
            'name' => 'Wenna',
            'email' => 'wenna@ched.gov.ph',
            'password' => Hash::make('123456'),
            'role' => 2
        ]);

        User::create([
            'name' => 'Ronan',
            'email' => 'ronan@ched.gov.ph',
            'password' => Hash::make('123456'),
            'role' => 2
        ]);

        User::create([
            'name' => 'Heidi',
            'email' => 'heidi@ched.gov.ph',
            'password' => Hash::make('123456'),
            'role' => 2
        ]);

        User::create([
            'name' => 'Florena',
            'email' => 'florena@ched.gov.ph',
            'password' => Hash::make('123456'),
            'role' => 2
        ]);

        User::create([
            'name' => 'Chris',
            'email' => 'chris@ched.gov.ph',
            'password' => Hash::make('123456'),
            'role' => 2
        ]);

        User::create([
            'name' => 'Hei',
            'email' => 'hei@ched.gov.ph',
            'password' => Hash::make('123456'),
            'role' => 3
        ]);


    }
}