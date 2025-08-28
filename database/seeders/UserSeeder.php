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
        User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email_address' => 'admin@example.com',
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
        User::factory()->create([
            'id' => '55fa1851e4bed834078b48ae',
            'first_name' => 'David',
            'last_name' => 'Weiner',
            'email_address' => 'david@example.com',
            'member_id' => 'A0000006',
            'active' => 1,
            'assignment' => [
                [
                    'chapter_id' => '55fa1833e4bed832078b45dc',
                    'chapter_name' => 'HMS Achilles',
                    'date_assigned' => '2015-12-05',
                    'billet' => 'Embarked Flag Officer',
                    'primary' => true,
                ],
                [
                    'chapter_id' => '5bd9bc7ea016bd4d9c2e3fd3',
                    'chapter_name' => 'MEDUSA Data Operations Center',
                    'date_assigned' => '2018-11-02',
                    'billet' => 'Director',
                    'additional' => true,
                ],
            ],
            'peerages' => [
                [
                    'title' => 'Knight',
                    'code' => 'K',
                    'precedence' => 3,
                    'postnominal' => 'KSK',
                    'peerage_id' => '56df1772e4fe66.01975046',
                ],
                [
                    'title' => 'Knight',
                    'code' => 'K',
                    'precedence' => 5,
                    'postnominal' => 'GCE',
                    'peerage_id' => '56df178e2c4283.84628133',
                ],
                [
                    'title' => 'Baron',
                    'code' => 'B',
                    'precedence' => '4',
                    'generation' => 'First',
                    'lands' => 'Serpent Head Point',
                    'filename' => '30CkOY4K6scIMNiOJuvEzcCOjEqLER76FXEPNoGm.svg',
                    'peerage_id' => '5815525eb06345.25168304',
                ]
            ],
            'city' => 'Atlanta',
            'state_province' => 'GA',
            'registration_status' => 'Active',
        ]);
        User::factory()->create([
            '_id' => '55fa1852e4bed834078b4af0',
            'first_name' => 'Misty',
            'email_address' => 'misty@example.com',
            'member_id' => 'A0000007',
            'active' => 1,
            'assignment' => [
                [
                    'chapter_id' => '55fa1833e4bed832078b4576',
                    'chapter_name' => 'HMS Galahad',
                    'date_assigned' => '2020-10-20',
                    'billet' => 'Embarked Flag Officer',
                    'primary' => true,
                ],
            ],
            'peerages' => [
                [
                    'title' => 'Dame',
                    'code' => 'K',
                    'precedence' => 5,
                    'postnominal' => 'GCE',
                    'peerage_id' => '59dea75b532062.65310246',
                ],
                [
                    'title' => 'Baroness',
                    'code' => 'B',
                    'precedence' => '4',
                    'generation' => 'First',
                    'lands' => 'New Gilwell',
                    'filename' => 'yO7gfsNf6K9D3q0kjDUSnzunvyRqwImRcCE01rAQ.svg',
                    'courtesy' => true,
                    'peerage_id' => '61e5651b48b3b4.09993958',
                ],
            ],
            'city' => 'Columbus',
            'state_province' => 'OH',
            'registration_status' => 'Active',
        ]);
        User::factory()->create([
            '_id' => '55fa1856e4bed834078b523c',
            'last_name' => 'Lochen',
            'email_address' => 'lochen@example.com',
            'member_id' => 'A0000008',
            'active' => 1,
            'assignment' => [
                [
                    'chapter_id' => '55fa1833e4bed832078b4576',
                    'chapter_name' => 'HMS Galahad',
                    'date_assigned' => '2020-10-20',
                    'billet' => 'Embarked Flag Officer',
                    'primary' => true,
                ],
            ],
            'peerages' => [
                [
                    'title' => 'Dame',
                    'code' => 'K',
                    'precedence' => 8,
                    'postnominal' => 'KDE',
                    'peerage_id' => '56e50b7420b0a6.79326767',
                ],
                [
                    'title' => 'Knight',
                    'code' => 'K',
                    'precedence' => 3,
                    'postnominal' => 'KSK',
                    'peerage_id' => '5d2125c68fcf33.52734261',
                ],
            ],
            'city' => 'Columbus',
            'state_province' => 'OH',
            'registration_status' => 'Active',
        ]);

    }
}
