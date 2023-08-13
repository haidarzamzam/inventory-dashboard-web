<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name'     => 'Admin',
            'email'    => 'adminidw@mailinator.com',
            'password' => bcrypt('adMin123')
        ]);

        User::factory()->create([
            'name'     => 'Super Admin',
            'email'    => 'superadminidw@mailinator.com',
            'password' => bcrypt('spradMin123')
        ]);
    }
}
