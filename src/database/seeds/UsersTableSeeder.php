<?php

use Illuminate\Database\Seeder;
use App\Lib\User\User;

class UsersTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        // Create some sample users
        User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email_address' => 'john.doe@example.com',
            'position' => 'Developer',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'email_address' => 'jane.doe@example.com',
            'position' => 'Designer',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'first_name' => 'Sarah',
            'last_name' => 'Jones',
            'email_address' => 'sarah.jones@example.com',
            'position' => 'Project Manager',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'first_name' => 'James',
            'last_name' => 'Scott',
            'email_address' => 'james.scott@example.com',
            'position' => 'Architect',
            'password' => bcrypt('password'),
        ]);

        $this->command->info('Users table seeded!');
    }
}
