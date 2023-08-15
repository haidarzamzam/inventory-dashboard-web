<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\SerialNumber;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*User::factory()->create([
            'name'     => 'Admin',
            'email'    => 'adminidw@mailinator.com',
            'password' => bcrypt('adMin123')
        ]);

        User::factory()->create([
            'name'     => 'Super Admin',
            'email'    => 'superadminidw@mailinator.com',
            'password' => bcrypt('spradMin123')
        ]);*/

        // Product::factory(10)->create();
        // SerialNumber::factory(10)->create();
        // Transaction::factory(10)->create();
        // TransactionDetail::factory(10)->create();

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }
}
