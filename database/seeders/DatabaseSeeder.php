<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Rafi Akmal',
            'email' => 'rafi@gmail.com',
            'password' => bcrypt('rafi'),
            'email_verified_at' => now(),
        ]);
    }
}
