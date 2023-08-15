<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'adminhaidar@mailinator.com',
            'password' => bcrypt('admin123'),
        ]);

        $admin->assignRole('admin');

        $super_admin = User::create([
            'name' => 'Super Admin',
            'email' => 'sadminhaidar@mailinator.com',
            'password' => bcrypt('sadmin123'),
        ]);

        $super_admin->assignRole('super_admin');
    }
}
