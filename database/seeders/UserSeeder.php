<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            GradeSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Admin User',
            'email_address' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'active' => 1,
        ]);
    }
}
