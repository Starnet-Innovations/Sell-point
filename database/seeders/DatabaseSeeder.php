<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        User::factory()->create([
            'id' => 1,
            'full_name' => 'Sell Point',
            'email' => 'sellpoint@example.com',
            'phone' => '08162587097', // Added because it's in your Fillable list
            'password' => bcrypt('password123'),
        ]);


        $this->call([
            ListingsTableSchemaSeeder::class,
            CategorySeeder::class,
            ListingsTableSeeder::class,
        ]);
    }
}
