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
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email_address' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'member_id' => 'A0000001',
            'active' => 1,
            'assignment' => [
                [
                    'billet' => 'President',
                ],
            ],
        ]);
        User::factory()->create([
            'id' => '55fa1851e4bed834078b48aa',
            'first_name' => 'Scott',
            'last_name' => 'Jones',
            'email_address' => 'scott@example.com',
            'member_id' => 'A0000002',
            'active' => 1,
            'assignment' => [
                [
                    'chapter_id' => '55fa1833e4bed832078b45dc',
                    'chapter_name' => 'HMS Achilles',
                    'date_assigned' => '2017-12-12',
                    'billet' => 'Commanding Officer',
                    'primary' => true,
                ],
            ],
            'city' => 'Atlanta',
            'state_province' => 'GA',
            'registration_status' => 'Active',
        ]);
        User::factory()->create([
            'id' => '55fa1851e4bed834078b48ba',
            'first_name' => 'Mike',
            'last_name' => 'Brown',
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
            'registration_status' => 'Active',
        ]);
        User::factory()->create([
            'id' => '565fd6f6e4bed8b7358b5195',
            'first_name' => 'Bridgitte',
            'last_name' => 'Smith',
            'email_address' => 'bridgitte@example.com',
            'member_id' => 'A0000004',
            'active' => 1,
            'assignment' => [
                [
                    'chapter_id' => '55fa1833e4bed832078b45dc',
                    'chapter_name' => 'HMS Achilles',
                    'date_assigned' => '2018-11-15',
                    'billet' => 'Bosun',
                    'primary' => true,
                ],
            ],
            'city' => 'Atlanta',
            'state_province' => 'GA',
            'registration_status' => 'Active',
        ]);

        User::factory()->create([
            '_id' => '55fa1859e4bed834078b563c',
            'first_name' => 'Doug',
            'last_name' => 'Needham',
            'email_address' => 'doug@example.com',
            'member_id' => 'A0000005',
            'password' => Hash::make('password123'),
            'active' => 1,
            'assignment' => [
                [
                    'chapter_id' => '55fa1833e4bed832078b45dc',
                    'chapter_name' => 'HMS Achilles',
                    'date_assigned' => '2016-02-01',
                    'billet' => 'Executive Officer',
                    'primary' => true,
                ]
            ],
            'city' => 'Waynesboro',
            'state_province' => 'VA',
            'registration_status' => 'Active',
        ]);
    }
}
