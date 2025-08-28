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
        User::factory()->create([
            'name' => 'Admin User',
            'email_address' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'member_id' => 'A0000001',
            'active' => 1,
            'assignment' => [
                'billet' => 'President',
            ],
        ]);
        User::factory()->create([
            'id' => '55fa1851e4bed834078b48aa',
            'email_address' => 'scott@example.com',
            'member_id' => 'A0000002',
            'active' => 1,
            'assignment' => [
                'chapter_id' => '55fa1833e4bed832078b45dc',
                'chapter_name' => 'HMS Achilles',
                'date_assigned' => '2017-12-12',
                'billet' => 'Commanding Officer',
                'primary' => true,
            ],
            'city' => 'Atlanta',
            'state_province' => 'GA',
        ]);
        User::factory()->create([
            'id' => '55fa1851e4bed834078b48ba' ,
            'email_address' => 'mike@example.com',
            'member_id' => 'A0000003',
            'active' => 1,
            'assignment' => [
                [
                    'chapter_id' => '55fa1833e4bed832078b45dc',
                    'chapter_name' => 'HMS Achilles',
                    'date_assigned' => '2014-11-01',
                    'billet' => 'Executive Officer',
                    'primary' => true,
                ],
            ],
            'city' => 'Atlanta',
            'state_province' => 'GA',
        ]);
        User::factory()->create([
            'name' => 'Doug Needham',
            'email_address' => 'doug@example.com',
            'member_id' => 'A0000005',
            'password' => Hash::make('password123'),
            'active' => 1,
            'assignment' => [
                'billet' => 'Executive Officer',
            ],
        ]);
    }
}
