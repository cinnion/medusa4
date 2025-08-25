<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedusaConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('config')->insert([
            [
                'key' => 'some.key',
                'value' => 'Some value'
            ],
            [
                'key' => 'some.other-with-sub-key',
                'value' => [
                    'subkey1' => 'Some other value 1',
                    'subkey2' => 'Some other value 2'
                ]
            ],
            [
                'key' => 'chapter.naval',
                'value' => array(
                    0 => 'RMN',
                    1 => 'GSN',
                    2 => 'IAN',
                    3 => 'RHN',
                    4 => 'RMMM',
                    5 => 'RMACS',
                    6 => 'CIVIL',
                ),
            ],
            [
                'key' => 'memberlist.branches',
                'value' => array(
                    'RMN' => 'RMN',
                    'RMMC' => 'RMMC',
                    'RMA' => 'RMA',
                    'GSN' => 'GSN',
                    'RHN' => 'RHN',
                    'IAN' => 'IAN',
                    'SFC' => 'SFC',
                    'RMACS' => 'RMACS',
                    'CIVIL' => 'Civilian',
                    'RMMM' => 'Merchant Marine',
                ),
            ],
            [
                'key' => 'pp.requirements',
                'value' => [
                    'E-2' => [
                        'tig' => 2,
                        'line' => [
                            'points' => 3,
                            'exam' => [
                                '(00)?01',
                            ],
                        ],
                        'staff' => [
                            'points' => 3,
                            'exam' => [],
                        ],
                        'service' => [
                            'points' => 3,
                            'exam' => [],
                        ],
                    ]
                ]
            ]
        ]);
    }
}
