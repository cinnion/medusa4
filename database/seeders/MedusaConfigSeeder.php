<?php

namespace Database\Seeders;

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
                'key' => 'anyunit.types',
                'value' => array(
                    0 => 'district',
                    1 => 'fleet',
                    2 => 'fstation',
                    3 => 'task_force',
                    4 => 'task_group',
                    5 => 'squadron',
                    6 => 'division',
                    7 => 'ship',
                    8 => 'mship',
                    9 => 'station',
                    10 => 'headquarters',
                    11 => 'bivouac',
                    12 => 'barracks',
                    13 => 'outpost',
                    14 => 'fort',
                    15 => 'planetary',
                    16 => 'theater',
                    17 => 'bureau',
                    18 => 'office',
                    19 => 'academy',
                    20 => 'school',
                    21 => 'corps',
                    22 => 'exp_force',
                    23 => 'regiment',
                    24 => 'shuttle',
                    25 => 'section',
                    26 => 'squad',
                    27 => 'platoon',
                    28 => 'company',
                    29 => 'battalion',
                    30 => 'college',
                    31 => 'institute',
                    32 => 'center',
                    33 => 'university',
                    34 => 'university_system',
                    35 => 'keep',
                    36 => 'barony',
                    37 => 'county',
                    38 => 'duchy',
                    39 => 'grand_duchy',
                    40 => 'steading',
                    41 => 'jfort',
                    42 => 'tug',
                    43 => 'jstation',
                    44 => 'brigade',
                    45 => 'posting',
                    46 => 'quadrant',
                    47 => 'cluster',
                    48 => 'sector',
                    49 => 'region',
                    50 => 'system',
                    51 => 'civ_planetary',
                    52 => 'board',
                    53 => 'committee',
                ),
                'updated_at' => '2024-02-14 03:27:55',
                'created_at' => '2017-07-31 15:38:41',
                'id' => '597f4f014b3df7b82123439c',
            ],
            [
                'key' => 'awards.display',
                'value' => array(
                    0 => 'OSWP',
                    1 => 'ESWP',
                    2 => 'SAW',
                    3 => 'EAW',
                    4 => 'OAW',
                    5 => 'ESAW',
                    6 => 'OSAW',
                    7 => 'EMAW',
                    8 => 'OMAW',
                    9 => 'ENW',
                    10 => 'ONW',
                    11 => 'ESNW',
                    12 => 'OSNW',
                    13 => 'EMNW',
                    14 => 'OMNW',
                    15 => 'EOW',
                    16 => 'OOW',
                    17 => 'ESOW',
                    18 => 'OSOW',
                    19 => 'EMOW',
                    20 => 'OMOW',
                    21 => 'ESW',
                    22 => 'OSW',
                    23 => 'ESSW',
                    24 => 'OSSW',
                    25 => 'EMSW',
                    26 => 'OMSW',
                    27 => 'HS',
                    28 => 'CIB',
                ),
                'updated_at' => '2018-05-28 18:36:14',
                'created_at' => '2018-05-28 18:36:14',
                'id' => '5b0c4c1ecbe77603d215d9b9',
            ],
            [
                'key' => 'awards.restricted',
                'value' => array(
                    0 => 'OSWP',
                    1 => 'ESWP',
                    2 => 'MCAM',
                    3 => 'KR3CM',
                    4 => 'QE3CM',
                    5 => 'QE3GJM',
                    6 => 'QE3SJM',
                    7 => 'QE3DJM',
                    8 => 'YSMR',
                ),
                'updated_at' => '2024-02-20 02:51:42',
                'created_at' => '2018-05-28 18:35:30',
                'id' => '5b0c4bf2cbe77603d215d99b',
            ],
            [
                'key' => 'awards.swp',
                'value' => array(
                    'RMN' =>
                        array(
                            'Enlisted' =>
                                array(
                                    'NumDepts' => 3,
                                    'Required' =>
                                        array(
                                            0 => 'SIA-SRN-01A',
                                            1 => 'SIA-SRN-04A',
                                        ),
                                    'Departments' =>
                                        array(
                                            'FlightOps' =>
                                                array(
                                                    0 => 'SIA-SRN-05C',
                                                ),
                                            'Astrogation' =>
                                                array(
                                                    0 => 'SIA-SRN-06C',
                                                    1 => 'SIA-SRN-07C',
                                                ),
                                            'Communications' =>
                                                array(
                                                    0 => 'SIA-SRN-11C',
                                                    1 => 'SIA-SRN-12C',
                                                    2 => 'SIA-SRN-13C',
                                                ),
                                            'Engineering' =>
                                                array(
                                                    0 => 'SIA-SRN-14C',
                                                    1 => 'SIA-SRN-15C',
                                                    2 => 'SIA-SRN-16C',
                                                    3 => 'SIA-SRN-17C',
                                                    4 => 'SIA-SRN-18C',
                                                    5 => 'SIA-SRN-19C',
                                                ),
                                            'Tactical' =>
                                                array(
                                                    0 => 'SIA-SRN-08C',
                                                    1 => 'SIA-SRN-09C',
                                                    2 => 'SIA-SRN-10C',
                                                    3 => 'SIA-SRN-27C',
                                                    4 => 'SIA-SRN-28C',
                                                    5 => 'SIA-SRN-29C',
                                                    6 => 'SIA-SRN-32C',
                                                ),
                                        ),
                                ),
                            'Officer' =>
                                array(
                                    'NumDepts' => 4,
                                    'Required' =>
                                        array(
                                            0 => 'SIA-SRN-01C',
                                            1 => 'SIA-SRN-31C',
                                        ),
                                    'Departments' =>
                                        array(
                                            'FlightOps' =>
                                                array(
                                                    0 => 'SIA-SRN-05D',
                                                ),
                                            'Astrogation' =>
                                                array(
                                                    0 => 'SIA-SRN-06D',
                                                    1 => 'SIA-SRN-07D',
                                                ),
                                            'Communications' =>
                                                array(
                                                    0 => 'SIA-SRN-11D',
                                                    1 => 'SIA-SRN-12D',
                                                    2 => 'SIA-SRN-13D',
                                                ),
                                            'Engineering' =>
                                                array(
                                                    0 => 'SIA-SRN-14D',
                                                    1 => 'SIA-SRN-15D',
                                                    2 => 'SIA-SRN-16D',
                                                    3 => 'SIA-SRN-17D',
                                                    4 => 'SIA-SRN-18D',
                                                    5 => 'SIA-SRN-19D',
                                                ),
                                            'Tactical' =>
                                                array(
                                                    0 => 'SIA-SRN-08D',
                                                    1 => 'SIA-SRN-09D',
                                                    2 => 'SIA-SRN-10D',
                                                    3 => 'SIA-SRN-27D',
                                                    4 => 'SIA-SRN-28D',
                                                    5 => 'SIA-SRN-29D',
                                                    6 => 'SIA-SRN-32D',
                                                ),
                                        ),
                                ),
                        ),
                    'RMMC' =>
                        array(
                            'Enlisted' =>
                                array(
                                    'NumDepts' => 3,
                                    'Required' =>
                                        array(
                                            0 => 'SIA-SRMC-07A',
                                            1 => 'SIA-SRN-19A',
                                        ),
                                    'Departments' =>
                                        array(
                                            'Armorer' =>
                                                array(
                                                    0 => 'SIA-SRMC-01C',
                                                ),
                                            'AssaultMarine' =>
                                                array(
                                                    0 => 'SIA-SRMC-05C',
                                                ),
                                            'HeavyWeapons' =>
                                                array(
                                                    0 => 'SIA-SRMC-08C',
                                                ),
                                            'LaserGraser' =>
                                                array(
                                                    0 => 'SIA-SRMC-04C',
                                                ),
                                            'MP' =>
                                                array(
                                                    0 => 'SIA-SRMC-02C',
                                                ),
                                            'Missile' =>
                                                array(
                                                    0 => 'SIA-SRMC-03C',
                                                ),
                                            'Recon' =>
                                                array(
                                                    0 => 'SIA-SRMC-06C',
                                                ),
                                        ),
                                ),
                            'Officer' =>
                                array(
                                    'NumDepts' => 3,
                                    'Required' =>
                                        array(
                                            0 => 'SIA-SRMC-07D',
                                            1 => 'SIA-SRN-19C',
                                            2 => 'SIA-SRMC-09C',
                                            3 => 'SIA-SRMC-02C',
                                        ),
                                    'Departments' =>
                                        array(
                                            'Armorer' =>
                                                array(
                                                    0 => 'SIA-SRMC-01D',
                                                ),
                                            'AssaultMarine' =>
                                                array(
                                                    0 => 'SIA-SRMC-05D',
                                                ),
                                            'HeavyWeapons' =>
                                                array(
                                                    0 => 'SIA-SRMC-08D',
                                                ),
                                            'LaserGraser' =>
                                                array(
                                                    0 => 'SIA-SRMC-04D',
                                                ),
                                            'MP' =>
                                                array(
                                                    0 => 'SIA-SRMC-02D',
                                                ),
                                            'Missile' =>
                                                array(
                                                    0 => 'SIA-SRMC-03D',
                                                ),
                                            'Recon' =>
                                                array(
                                                    0 => 'SIA-SRMC-06D',
                                                ),
                                        ),
                                ),
                        ),
                    'RMMM' =>
                        array(
                            'Enlisted' =>
                                array(
                                    'NumDepts' => 3,
                                    'Required' =>
                                        array(
                                            0 => 'SIA-SRN-01A',
                                            1 => 'SIA-SRN-04A',
                                        ),
                                    'Departments' =>
                                        array(
                                            'FlightOps' =>
                                                array(
                                                    0 => 'SIA-SRN-05C',
                                                ),
                                            'Astrogation' =>
                                                array(
                                                    0 => 'SIA-SRN-06C',
                                                    1 => 'SIA-SRN-07C',
                                                ),
                                            'Communications' =>
                                                array(
                                                    0 => 'SIA-SRN-11C',
                                                    1 => 'SIA-SRN-12C',
                                                    2 => 'SIA-SRN-13C',
                                                ),
                                            'Engineering' =>
                                                array(
                                                    0 => 'SIA-SRN-14C',
                                                    1 => 'SIA-SRN-15C',
                                                    2 => 'SIA-SRN-16C',
                                                    3 => 'SIA-SRN-17C',
                                                    4 => 'SIA-SRN-18C',
                                                    5 => 'SIA-SRN-19C',
                                                ),
                                            'Tactical' =>
                                                array(
                                                    0 => 'SIA-SRN-08C',
                                                    1 => 'SIA-SRN-09C',
                                                    2 => 'SIA-SRN-10C',
                                                    3 => 'SIA-SRN-27C',
                                                    4 => 'SIA-SRN-28C',
                                                    5 => 'SIA-SRN-29C',
                                                    6 => 'SIA-SRN-32C',
                                                ),
                                        ),
                                ),
                            'Officer' =>
                                array(
                                    'NumDepts' => 4,
                                    'Required' =>
                                        array(
                                            0 => 'SIA-SRN-01C',
                                            1 => 'SIA-SRN-31C',
                                        ),
                                    'Departments' =>
                                        array(
                                            'FlightOps' =>
                                                array(
                                                    0 => 'SIA-SRN-05D',
                                                ),
                                            'Astrogation' =>
                                                array(
                                                    0 => 'SIA-SRN-06D',
                                                    1 => 'SIA-SRN-07D',
                                                ),
                                            'Communications' =>
                                                array(
                                                    0 => 'SIA-SRN-11D',
                                                    1 => 'SIA-SRN-12D',
                                                    2 => 'SIA-SRN-13D',
                                                ),
                                            'Engineering' =>
                                                array(
                                                    0 => 'SIA-SRN-14D',
                                                    1 => 'SIA-SRN-15D',
                                                    2 => 'SIA-SRN-16D',
                                                    3 => 'SIA-SRN-17D',
                                                    4 => 'SIA-SRN-18D',
                                                    5 => 'SIA-SRN-19D',
                                                ),
                                            'Tactical' =>
                                                array(
                                                    0 => 'SIA-SRN-08D',
                                                    1 => 'SIA-SRN-09D',
                                                    2 => 'SIA-SRN-10D',
                                                    3 => 'SIA-SRN-27D',
                                                    4 => 'SIA-SRN-28D',
                                                    5 => 'SIA-SRN-29D',
                                                    6 => 'SIA-SRN-32D',
                                                ),
                                        ),
                                ),
                        ),
                    'IAN' =>
                        array(
                            'Enlisted' =>
                                array(
                                    'NumDepts' => 3,
                                    'Required' =>
                                        array(
                                            0 => 'SIA-SRN-01A',
                                            1 => 'SIA-SRN-04A',
                                        ),
                                    'Departments' =>
                                        array(
                                            'FlightOps' =>
                                                array(
                                                    0 => 'SIA-SRN-05C',
                                                ),
                                            'Astrogation' =>
                                                array(
                                                    0 => 'SIA-SRN-06C',
                                                    1 => 'SIA-SRN-07C',
                                                ),
                                            'Communications' =>
                                                array(
                                                    0 => 'SIA-SRN-11C',
                                                    1 => 'SIA-SRN-12C',
                                                    2 => 'SIA-SRN-13C',
                                                ),
                                            'Engineering' =>
                                                array(
                                                    0 => 'SIA-SRN-14C',
                                                    1 => 'SIA-SRN-15C',
                                                    2 => 'SIA-SRN-16C',
                                                    3 => 'SIA-SRN-17C',
                                                    4 => 'SIA-SRN-18C',
                                                    5 => 'SIA-SRN-19C',
                                                ),
                                            'Tactical' =>
                                                array(
                                                    0 => 'SIA-SRN-08C',
                                                    1 => 'SIA-SRN-09C',
                                                    2 => 'SIA-SRN-10C',
                                                    3 => 'SIA-SRN-27C',
                                                    4 => 'SIA-SRN-28C',
                                                    5 => 'SIA-SRN-29C',
                                                    6 => 'SIA-SRN-32C',
                                                ),
                                        ),
                                ),
                            'Officer' =>
                                array(
                                    'NumDepts' => 4,
                                    'Required' =>
                                        array(
                                            0 => 'SIA-SRN-01C',
                                            1 => 'SIA-SRN-31C',
                                        ),
                                    'Departments' =>
                                        array(
                                            'FlightOps' =>
                                                array(
                                                    0 => 'SIA-SRN-05D',
                                                ),
                                            'Astrogation' =>
                                                array(
                                                    0 => 'SIA-SRN-06D',
                                                    1 => 'SIA-SRN-07D',
                                                ),
                                            'Communications' =>
                                                array(
                                                    0 => 'SIA-SRN-11D',
                                                    1 => 'SIA-SRN-12D',
                                                    2 => 'SIA-SRN-13D',
                                                ),
                                            'Engineering' =>
                                                array(
                                                    0 => 'SIA-SRN-14D',
                                                    1 => 'SIA-SRN-15D',
                                                    2 => 'SIA-SRN-16D',
                                                    3 => 'SIA-SRN-17D',
                                                    4 => 'SIA-SRN-18D',
                                                    5 => 'SIA-SRN-19D',
                                                ),
                                            'Tactical' =>
                                                array(
                                                    0 => 'SIA-SRN-08D',
                                                    1 => 'SIA-SRN-09D',
                                                    2 => 'SIA-SRN-10D',
                                                    3 => 'SIA-SRN-27D',
                                                    4 => 'SIA-SRN-28D',
                                                    5 => 'SIA-SRN-29D',
                                                    6 => 'SIA-SRN-32D',
                                                ),
                                        ),
                                ),
                        ),
                    'GSN' =>
                        array(
                            'Enlisted' =>
                                array(
                                    'NumDepts' => 3,
                                    'Required' =>
                                        array(
                                            0 => 'SIA-SRN-01A',
                                            1 => 'SIA-SRN-04A',
                                        ),
                                    'Departments' =>
                                        array(
                                            'FlightOps' =>
                                                array(
                                                    0 => 'SIA-SRN-05C',
                                                ),
                                            'Astrogation' =>
                                                array(
                                                    0 => 'SIA-SRN-06C',
                                                    1 => 'SIA-SRN-07C',
                                                ),
                                            'Communications' =>
                                                array(
                                                    0 => 'SIA-SRN-11C',
                                                    1 => 'SIA-SRN-12C',
                                                    2 => 'SIA-SRN-13C',
                                                ),
                                            'Engineering' =>
                                                array(
                                                    0 => 'SIA-SRN-14C',
                                                    1 => 'SIA-SRN-15C',
                                                    2 => 'SIA-SRN-16C',
                                                    3 => 'SIA-SRN-17C',
                                                    4 => 'SIA-SRN-18C',
                                                    5 => 'SIA-SRN-19C',
                                                ),
                                            'Tactical' =>
                                                array(
                                                    0 => 'SIA-SRN-08C',
                                                    1 => 'SIA-SRN-09C',
                                                    2 => 'SIA-SRN-10C',
                                                    3 => 'SIA-SRN-27C',
                                                    4 => 'SIA-SRN-28C',
                                                    5 => 'SIA-SRN-29C',
                                                    6 => 'SIA-SRN-32C',
                                                ),
                                        ),
                                ),
                            'Officer' =>
                                array(
                                    'NumDepts' => 4,
                                    'Required' =>
                                        array(
                                            0 => 'SIA-SRN-01C',
                                            1 => 'SIA-SRN-31C',
                                        ),
                                    'Departments' =>
                                        array(
                                            'FlightOps' =>
                                                array(
                                                    0 => 'SIA-SRN-05D',
                                                ),
                                            'Astrogation' =>
                                                array(
                                                    0 => 'SIA-SRN-06D',
                                                    1 => 'SIA-SRN-07D',
                                                ),
                                            'Communications' =>
                                                array(
                                                    0 => 'SIA-SRN-11D',
                                                    1 => 'SIA-SRN-12D',
                                                    2 => 'SIA-SRN-13D',
                                                ),
                                            'Engineering' =>
                                                array(
                                                    0 => 'SIA-SRN-14D',
                                                    1 => 'SIA-SRN-15D',
                                                    2 => 'SIA-SRN-16D',
                                                    3 => 'SIA-SRN-17D',
                                                    4 => 'SIA-SRN-18D',
                                                    5 => 'SIA-SRN-19D',
                                                ),
                                            'Tactical' =>
                                                array(
                                                    0 => 'SIA-SRN-08D',
                                                    1 => 'SIA-SRN-09D',
                                                    2 => 'SIA-SRN-10D',
                                                    3 => 'SIA-SRN-27D',
                                                    4 => 'SIA-SRN-28D',
                                                    5 => 'SIA-SRN-29D',
                                                    6 => 'SIA-SRN-32D',
                                                ),
                                        ),
                                ),
                        ),
                    'RHN' =>
                        array(
                            'Enlisted' =>
                                array(
                                    'NumDepts' => 3,
                                    'Required' =>
                                        array(
                                            0 => 'SIA-SRN-01A',
                                            1 => 'SIA-SRN-04A',
                                        ),
                                    'Departments' =>
                                        array(
                                            'FlightOps' =>
                                                array(
                                                    0 => 'SIA-SRN-05C',
                                                ),
                                            'Astrogation' =>
                                                array(
                                                    0 => 'SIA-SRN-06C',
                                                    1 => 'SIA-SRN-07C',
                                                ),
                                            'Communications' =>
                                                array(
                                                    0 => 'SIA-SRN-11C',
                                                    1 => 'SIA-SRN-12C',
                                                    2 => 'SIA-SRN-13C',
                                                ),
                                            'Engineering' =>
                                                array(
                                                    0 => 'SIA-SRN-14C',
                                                    1 => 'SIA-SRN-15C',
                                                    2 => 'SIA-SRN-16C',
                                                    3 => 'SIA-SRN-17C',
                                                    4 => 'SIA-SRN-18C',
                                                    5 => 'SIA-SRN-19C',
                                                ),
                                            'Tactical' =>
                                                array(
                                                    0 => 'SIA-SRN-08C',
                                                    1 => 'SIA-SRN-09C',
                                                    2 => 'SIA-SRN-10C',
                                                    3 => 'SIA-SRN-27C',
                                                    4 => 'SIA-SRN-28C',
                                                    5 => 'SIA-SRN-29C',
                                                    6 => 'SIA-SRN-32C',
                                                ),
                                        ),
                                ),
                            'Officer' =>
                                array(
                                    'NumDepts' => 4,
                                    'Required' =>
                                        array(
                                            0 => 'SIA-SRN-01C',
                                            1 => 'SIA-SRN-31C',
                                        ),
                                    'Departments' =>
                                        array(
                                            'FlightOps' =>
                                                array(
                                                    0 => 'SIA-SRN-05D',
                                                ),
                                            'Astrogation' =>
                                                array(
                                                    0 => 'SIA-SRN-06D',
                                                    1 => 'SIA-SRN-07D',
                                                ),
                                            'Communications' =>
                                                array(
                                                    0 => 'SIA-SRN-11D',
                                                    1 => 'SIA-SRN-12D',
                                                    2 => 'SIA-SRN-13D',
                                                ),
                                            'Engineering' =>
                                                array(
                                                    0 => 'SIA-SRN-14D',
                                                    1 => 'SIA-SRN-15D',
                                                    2 => 'SIA-SRN-16D',
                                                    3 => 'SIA-SRN-17D',
                                                    4 => 'SIA-SRN-18D',
                                                    5 => 'SIA-SRN-19D',
                                                ),
                                            'Tactical' =>
                                                array(
                                                    0 => 'SIA-SRN-08D',
                                                    1 => 'SIA-SRN-09D',
                                                    2 => 'SIA-SRN-10D',
                                                    3 => 'SIA-SRN-27D',
                                                    4 => 'SIA-SRN-28D',
                                                    5 => 'SIA-SRN-29D',
                                                    6 => 'SIA-SRN-32D',
                                                ),
                                        ),
                                ),
                        ),
                    'RMACS' =>
                        array(
                            'Enlisted' =>
                                array(
                                    'NumDepts' => 3,
                                    'Required' =>
                                        array(
                                            0 => 'SIA-SRN-01A',
                                            1 => 'SIA-SRN-04A',
                                        ),
                                    'Departments' =>
                                        array(
                                            'FlightOps' =>
                                                array(
                                                    0 => 'SIA-SRN-05C',
                                                ),
                                            'Astrogation' =>
                                                array(
                                                    0 => 'SIA-SRN-06C',
                                                    1 => 'SIA-SRN-07C',
                                                ),
                                            'Communications' =>
                                                array(
                                                    0 => 'SIA-SRN-11C',
                                                    1 => 'SIA-SRN-12C',
                                                    2 => 'SIA-SRN-13C',
                                                ),
                                            'Engineering' =>
                                                array(
                                                    0 => 'SIA-SRN-14C',
                                                    1 => 'SIA-SRN-15C',
                                                    2 => 'SIA-SRN-16C',
                                                    3 => 'SIA-SRN-17C',
                                                    4 => 'SIA-SRN-18C',
                                                    5 => 'SIA-SRN-19C',
                                                ),
                                            'Tactical' =>
                                                array(
                                                    0 => 'SIA-SRN-08C',
                                                    1 => 'SIA-SRN-09C',
                                                    2 => 'SIA-SRN-10C',
                                                    3 => 'SIA-SRN-27C',
                                                    4 => 'SIA-SRN-28C',
                                                    5 => 'SIA-SRN-29C',
                                                    6 => 'SIA-SRN-32C',
                                                ),
                                        ),
                                ),
                            'Officer' =>
                                array(
                                    'NumDepts' => 4,
                                    'Required' =>
                                        array(
                                            0 => 'SIA-SRN-01C',
                                            1 => 'SIA-SRN-31C',
                                        ),
                                    'Departments' =>
                                        array(
                                            'FlightOps' =>
                                                array(
                                                    0 => 'SIA-SRN-05D',
                                                ),
                                            'Astrogation' =>
                                                array(
                                                    0 => 'SIA-SRN-06D',
                                                    1 => 'SIA-SRN-07D',
                                                ),
                                            'Communications' =>
                                                array(
                                                    0 => 'SIA-SRN-11D',
                                                    1 => 'SIA-SRN-12D',
                                                    2 => 'SIA-SRN-13D',
                                                ),
                                            'Engineering' =>
                                                array(
                                                    0 => 'SIA-SRN-14D',
                                                    1 => 'SIA-SRN-15D',
                                                    2 => 'SIA-SRN-16D',
                                                    3 => 'SIA-SRN-17D',
                                                    4 => 'SIA-SRN-18D',
                                                    5 => 'SIA-SRN-19D',
                                                ),
                                            'Tactical' =>
                                                array(
                                                    0 => 'SIA-SRN-08D',
                                                    1 => 'SIA-SRN-09D',
                                                    2 => 'SIA-SRN-10D',
                                                    3 => 'SIA-SRN-27D',
                                                    4 => 'SIA-SRN-28D',
                                                    5 => 'SIA-SRN-29D',
                                                    6 => 'SIA-SRN-32D',
                                                ),
                                        ),
                                ),
                        ),
                ),
                'updated_at' => '2018-08-08 02:12:28',
                'created_at' => '2018-05-28 18:35:32',
                'id' => '5b0c4bf4cbe77603d215d9b2',
            ],
            [
                'key' => 'awards.swp.branches',
                'value' => array(
                    0 => 'RMN',
                    1 => 'RMMC',
                    2 => 'RMACS',
                    3 => 'RMMM',
                    4 => 'IAN',
                    5 => 'GSN',
                    6 => 'RHN',
                ),
                'updated_at' => '2018-08-07 21:52:31',
                'created_at' => '2018-05-28 18:35:32',
                'id' => '5b0c4bf4cbe77603d215d9b3',
            ],
            [
                'key' => 'awards.wings',
                'value' => array(
                    'Aerospace Wings' =>
                        array(
                            0 => 'EAW',
                            1 => 'OAW',
                            2 => 'ESAW',
                            3 => 'OSAW',
                            4 => 'EMAW',
                            5 => 'OMAW',
                        ),
                    'Navigator Wings' =>
                        array(
                            0 => 'ENW',
                            1 => 'ONW',
                            2 => 'ESNW',
                            3 => 'OSNW',
                            4 => 'EMNW',
                            5 => 'OMNW',
                        ),
                    'Observer Wings' =>
                        array(
                            0 => 'EOW',
                            1 => 'OOW',
                            2 => 'ESOW',
                            3 => 'OSOW',
                            4 => 'EMOW',
                            5 => 'OMOW',
                        ),
                    'Simulator Wings' =>
                        array(
                            0 => 'ESW',
                            1 => 'OSW',
                            2 => 'ESSW',
                            3 => 'OSSW',
                            4 => 'EMSW',
                            5 => 'OMSW',
                        ),
                ),
                'updated_at' => '2018-05-28 18:35:30',
                'created_at' => '2018-05-28 18:35:30',
                'id' => '5b0c4bf2cbe77603d215d999',
            ],
            [
                'key' => 'bupers.header',
                'value' => '<table border="0">
    <tr>
        <td valign="middle"><img src="%patch%" alt="Rampant Manticore"/></td>
        <td valign="middle" align="center"><h2>THE ROYAL MANTICORAN NAVY<br/>OFFICE OF THE FIFTH SPACE LORD<br/>BUREAU OF PERSONNEL<br/>ADMIRALTY HOUSE<br/>LANDING</h2></td>
        <td valign="middle"><img src="%bupers.seal%" alt="BuPers"/></td>
    </tr>
</table>',
                'updated_at' => '2018-05-28 18:39:54',
                'created_at' => '2018-05-28 18:39:54',
                'id' => '5b0c4cfacbe77603d215d9c3',
            ],
            [
                'key' => 'bupers.sig',
                'value' => ' Geoff Zoeller
 Vizeadmiral, IAN
 Interim Director, Office of Member Services - BuPers',
                'updated_at' => '2025-06-29 17:17:01',
                'created_at' => '2017-08-14 15:50:46',
                'id' => '5991c6d6c0b51f1c5258a1ab',
            ],
            [
                'key' => 'bupers.welcome',
                'value' => '<p>%GREETING%:</p>

<p>Your application has been approved and we welcome you to The Royal Manticoran Navy: The Official Honor Harrington Fan Association (TRMN). TRMN is a chapter-based fan club, with local chapters around the world and is broken down into eight distinct branches &ndash; both military and civilian.</p>

<p>Based upon the selections you made when you applied, you are serving in the %BRANCH% assigned to %CHAPTER%.</p>

<p>New members can often feel confused or overwhelmed on what to do first and/or on how to do it. TRMN is a chapter-based organization and as such, your chapter will be your best source of information. Your commanding officer is %CO%, who can be contacted at <a href="mailto:%COEMAIL%">%COEMAIL%</a> and your Executive Officer is %XO%, whose email is <a href="mailto:%XOEMAIL%">%XOEMAIL%</a>. While we prefer that you contact and work with your CO first, you may also contact our Office of Member Services at <a href="mailto:membership@bupers.trmn.org">membership@bupers.trmn.org</a>.</p>

<p>When you have a moment, please log in to MEDUSA (our member database) and review your information. Here is where we will track the training courses you have taken and the promotion points and awards you have earned. If you need to update your personal information, just click on the &ldquo;EDIT&rdquo; button (at the bottom of the page) and make whatever changes are needed. You can also change your branch and/or chapter by clicking on the &lsquo;Member&rsquo; link in the top left-hand corner.</p>

<p>You will readily find TRMN information and resources available online. Some of the most commonly visited links can be found at:
<ul>
<li>The World Wide Web: <a href="http://www.trmn.org/">http://www.trmn.org/</a></li>
<li>The TRMN Forums (where most TRMN business is conducted): <a href="https://forums.trmn.org/">https://forums.trmn.org/</a> (This uses the same username and password you created when you joined)</li>
<li>TRMN Wiki (a Wiki of organizational knowledge and manuals): <a href="http://wiki.trmn.org/">http://wiki.trmn.org</a></li>

<li>YouTube:<ul>
    <li>First Space Lord: <a href="https://www.youtube.com/channel/UC875JVLvwn9EUGDlDDnf2uQ">https://www.youtube.com/channel/UC875JVLvwn9EUGDlDDnf2uQ</a></li>
    <li>Bureau of Personnel: <a href="https://www.youtube.com/channel/UCyD1UY584C-tNWrKVSuJqyw">https://www.youtube.com/channel/UCyD1UY584C-tNWrKVSuJqyw</a></li>
    </ul>
</li>

<li>TRMN Discord Server: <a href="https://discord.gg/AZvztKR">https://discord.gg/AZvztKR</a></li>
<li>Bureau of Supply Store: <a href="http://store.trmn.org/">http://store.trmn.org/</a></li>
</ul>

There are many others!

<p>The TRMN also has an extensive social media presence. Our main Facebook page can be found at: <a href="https://www.facebook.com/trmn.org">https://www.facebook.com/trmn.org</a>. Many branches, fleets, bureaus, and chapters also have pages. We also have a TRMN Discord server, which we use extensively for communication. Check with your chapter CO and other chapter members to find links for both Facebook and Discord.</p>

<p>We are excited to have you with us! Come join us on-line, in person, or at a convention. This is now your club as much as it is ours and we look forward to working with you to make it even better.</p>

<p>Again, welcome to TRMN and the Honorverse.</p>',
                'updated_at' => '2025-06-29 17:17:01',
                'created_at' => '2018-05-28 18:39:54',
                'id' => '5b0c4cfacbe77603d215d9c2',
            ],
            [
                'key' => 'chapter.assignable',
                'value' => array(
                    0 => 'ship',
                    1 => 'bivouac',
                    2 => 'company',
                    3 => 'station',
                    4 => 'shuttle',
                    5 => 'section',
                    6 => 'squad',
                    7 => 'platoon',
                    8 => 'battalion',
                    9 => 'barracks',
                    10 => 'outpost',
                    11 => 'fort',
                    12 => 'small_craft',
                    13 => 'lac',
                    14 => 'theater',
                    15 => 'headquarters',
                    16 => 'jstation',
                    17 => 'jfort',
                    18 => 'tug',
                    19 => 'mship',
                    20 => 'mission',
                    21 => 'imission',
                    22 => 'consulate',
                    23 => 'zone',
                    24 => 'cgeneral',
                    25 => 'isector',
                    26 => 'qembassy',
                    27 => 'qregion',
                    28 => 'quadrant',
                    29 => 'cluster',
                    30 => 'sector',
                    31 => 'region',
                    32 => 'system',
                    33 => 'civ_planetary',
                    34 => 'board',
                    35 => 'committee',
                ),
                'updated_at' => '2024-02-14 03:41:45',
                'id' => '631114de09585777714fd860',
            ],
            [
                'key' => 'chapter.holding',
                'value' => array(
                    0 => 'SS-001',
                    1 => 'SS-002',
                    2 => 'SS-101',
                    3 => 'SS-102',
                    4 => 'SS-103',
                    5 => 'SS-106',
                    6 => 'SS-108',
                    7 => 'SS-110',
                    8 => 'SS-113',
                    9 => 'RMOP-01',
                    10 => 'HC',
                    11 => 'RHSS-01',
                    12 => 'SMRS-01',
                ),
                'updated_at' => '2021-02-08 01:15:59',
                'created_at' => '2017-07-31 15:38:41',
                'id' => '597f4f014b3df7b82123439a',
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
                'updated_at' => '2018-06-11 02:19:23',
                'created_at' => '2018-06-11 01:58:10',
                'id' => '5b1dd732a016bd42c42f7007',
            ],
            [
                'key' => 'chapter.selection',
                'value' => array(
                    0 =>
                        array(
                            'unjoinable' => false,
                            'label' => 'Holding Chapters',
                            'call' => 'App\\Models\\Chapter::getHoldingChapters',
                        ),
                    1 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Fleet Holding Chapters',
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'fstation',
                        ),
                    2 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Headquarters',
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'headquarters',
                        ),
                    3 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Bureaus',
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'bureau',
                        ),
                    4 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Offices',
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'office',
                        ),
                    5 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Academies',
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'academy',
                        ),
                    6 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Institutes',
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'institute',
                        ),
                    7 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Universities',
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'university',
                        ),
                    8 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'University Systems',
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'university_system',
                        ),
                    9 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Colleges',
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'college',
                        ),
                    10 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Training Centers',
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'center',
                        ),
                    11 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Fleets',
                            'url' => '/api/fleet',
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'fleet',
                        ),
                    12 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Task Forces',
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'task_force',
                        ),
                    13 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Task Groups',
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'task_group',
                        ),
                    14 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Squadrons',
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'squadron',
                        ),
                    15 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Marine Expeditionary Forces ',
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'exp_force',
                        ),
                    16 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Divisions',
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'division',
                        ),
                    17 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Separation Units',
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'SU',
                        ),
                    18 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Keeps',
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'keep',
                        ),
                    19 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Baronies',
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'barony',
                        ),
                    20 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Counties',
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'county',
                        ),
                    21 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Duchy',
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'duchy',
                        ),
                    22 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Steadings',
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'steadings',
                        ),
                    23 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Grand Duchy',
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'grand_duchy',
                        ),
                    24 =>
                        array(
                            'unjoinable' => false,
                            'label' => 'RMN',
                            'call' => 'App\\Models\\Chapter::getChapters',
                            'args' => 'RMN',
                        ),
                    25 =>
                        array(
                            'unjoinable' => false,
                            'label' => 'RMMC',
                            'call' => 'App\\Models\\Chapter::getChapters',
                            'args' => 'RMMC',
                        ),
                    26 =>
                        array(
                            'unjoinable' => false,
                            'label' => 'RMA',
                            'call' => 'App\\Models\\Chapter::getChapters',
                            'args' => 'RMA',
                        ),
                    27 =>
                        array(
                            'unjoinable' => false,
                            'label' => 'GSN',
                            'call' => 'App\\Models\\Chapter::getChapters',
                            'args' => 'GSN',
                        ),
                    28 =>
                        array(
                            'unjoinable' => false,
                            'label' => 'IAN',
                            'call' => 'App\\Models\\Chapter::getChapters',
                            'args' => 'IAN',
                        ),
                    29 =>
                        array(
                            'unjoinable' => false,
                            'label' => 'RHN',
                            'call' => 'App\\Models\\Chapter::getChapters',
                            'args' => 'RHN',
                        ),
                    30 =>
                        array(
                            'unjoinable' => false,
                            'label' => 'SFS',
                            'call' => 'App\\Models\\Chapter::getChapters',
                            'args' => 'SFS',
                        ),
                    31 =>
                        array(
                            'unjoinable' => false,
                            'label' => 'CIVIL',
                            'call' => 'App\\Models\\Chapter::getChapters',
                            'args' => 'CIVIL',
                        ),
                    32 =>
                        array(
                            'unjoinable' => false,
                            'label' => 'INTEL',
                            'call' => 'App\\Models\\Chapter::getChapters',
                            'args' => 'INTEL',
                        ),
                    33 =>
                        array(
                            'unjoinable' => false,
                            'label' => 'RMMM',
                            'call' => 'App\\Models\\Chapter::getChapters',
                            'args' => 'RMMM',
                        ),
                    34 =>
                        array(
                            'unjoinable' => false,
                            'label' => 'RMACS',
                            'call' => 'App\\Models\\Chapter::getChapters',
                            'args' => 'RMACS',
                        ),
                    35 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Civilian Quadrants',
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'quadrant',
                        ),
                    36 =>
                        array(
                            'unjoinable' => true,
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'label' => 'Civilian Clusters',
                            'args' => 'cluster',
                        ),
                    37 =>
                        array(
                            'unjoinable' => true,
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'sector',
                            'label' => 'Civilian Sectors',
                        ),
                    38 =>
                        array(
                            'unjoinable' => true,
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'region',
                            'label' => 'Civilian Regions',
                        ),
                    39 =>
                        array(
                            'unjoinable' => true,
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'system',
                            'label' => 'Civilian Systems',
                        ),
                    40 =>
                        array(
                            'unjoinable' => true,
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'civ_planetary',
                            'label' => 'Civilian Planetary',
                        ),
                    41 =>
                        array(
                            'unjoinable' => true,
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'board',
                            'label' => 'Corporate Board',
                        ),
                    42 =>
                        array(
                            'unjoinable' => true,
                            'call' => 'App\\Models\\Chapter::getChaptersByType',
                            'args' => 'committee',
                            'label' => 'Corporate Committee',
                        ),
                ),
                'updated_at' => '2024-02-14 04:07:11',
                'created_at' => '2017-07-31 15:38:41',
                'id' => '597f4f014b3df7b821234398',
            ],
            [
                'key' => 'chapter.show',
                'value' => array(
                    'university_system' =>
                        array(
                            'Regent' =>
                                array(
                                    'billet' => 'Regent',
                                    'display_order' => 1,
                                ),
                            'Vice Regent' =>
                                array(
                                    'billet' => 'Vice Regent',
                                    'display_order' => 2,
                                ),
                        ),
                    'university' =>
                        array(
                            'Provost' =>
                                array(
                                    'billet' => 'Provost',
                                    'display_order' => 1,
                                ),
                            'Deputy Provost' =>
                                array(
                                    'billet' => 'Vice Regent',
                                    'display_order' => 2,
                                ),
                        ),
                    'college' =>
                        array(
                            'Dean' =>
                                array(
                                    'billet' => 'Dean',
                                    'display_order' => 1,
                                ),
                            'Assistant Dean' =>
                                array(
                                    'billet' => 'Vice Regent',
                                    'display_order' => 2,
                                ),
                        ),
                    'academy' =>
                        array(
                            'Commandant' =>
                                array(
                                    'billet' => 'Commandant',
                                    'display_order' => 1,
                                ),
                            'Vice Commandant' =>
                                array(
                                    'billet' => 'Vice Commandant',
                                    'display_order' => 2,
                                ),
                            'Deputy Commandant' =>
                                array(
                                    'billet' => 'Deputy Commandant',
                                    'display_order' => 2,
                                ),
                            'Chief of Staff' =>
                                array(
                                    'billet' => 'Chief of Staff',
                                    'display_order' => 3,
                                ),
                            'Flag Lieutenant' =>
                                array(
                                    'billet' => 'Flag Lieutenant',
                                    'display_order' => 4,
                                ),
                            'Senior Master Chief Petty Officer' =>
                                array(
                                    'billet' => 'Senior Master Chief',
                                    'display_order' => 5,
                                ),
                            'Command Senior Master Chief' =>
                                array(
                                    'billet' => 'Command Senior Master Chief',
                                    'display_order' => 5,
                                ),
                            'Command Sergeant Major' =>
                                array(
                                    'billet' => 'Command Sergeant Major',
                                    'display_order' => 5,
                                ),
                        ),
                    'ship' =>
                        array(
                            'Commanding Officer' =>
                                array(
                                    'billet' => 'Commanding Officer',
                                    'display_order' => 1,
                                ),
                            'Executive Officer' =>
                                array(
                                    'billet' => 'Executive Officer',
                                    'display_order' => 2,
                                ),
                            'Bosun' =>
                                array(
                                    'billet' => 'Bosun',
                                    'display_order' => 3,
                                ),
                        ),
                    'bureau' =>
                        array(
                            '%ordinal% Space Lord' =>
                                array(
                                    'billet' => '%ordinal% Space Lord',
                                    'display_order' => 1,
                                    'exact' => false,
                                ),
                            'Deputy %ordinal% Space Lord' =>
                                array(
                                    'billet' => 'Deputy Space Lord',
                                    'display_order' => 2,
                                ),
                            'Chief of Staff' =>
                                array(
                                    'billet' => 'Chief of Staff',
                                    'display_order' => 3,
                                ),
                            'Flag Lieutenant' =>
                                array(
                                    'billet' => 'Flag Lieutenant',
                                    'display_order' => 4,
                                ),
                            'Senior Master Chief Petty Officer' =>
                                array(
                                    'billet' => 'Senior Master Chief',
                                    'display_order' => 5,
                                ),
                            'Command Senior Master Chief' =>
                                array(
                                    'billet' => 'Command Senior Master Chief',
                                    'display_order' => 5,
                                ),
                        ),
                    'office' =>
                        array(
                            'President' =>
                                array(
                                    'billet' => 'President',
                                    'display_order' => 1,
                                ),
                            'Director' =>
                                array(
                                    'billet' => 'Director',
                                    'display_order' => 1,
                                ),
                            'Deputy Director' =>
                                array(
                                    'billet' => 'Deputy Director',
                                    'display_order' => 2,
                                ),
                            'Chancellor of the Exchequer' =>
                                array(
                                    'billet' => 'Chancellor of the Exchequer',
                                    'display_order' => 1,
                                    'exact' => false,
                                ),
                            'Lord Chancellor' =>
                                array(
                                    'billet' => 'Lord Chancellor',
                                    'display_order' => 1,
                                ),
                            'Deputy Lord Chancellor' =>
                                array(
                                    'billet' => 'Deputy Lord Chancellor',
                                    'display_order' => 2,
                                ),
                            'Senior Master CPO of the Navy' =>
                                array(
                                    'billet' => 'Senior Master CPO of the Navy',
                                    'display_order' => 1,
                                ),
                        ),
                    'fleet' =>
                        array(
                            'Fleet Commander' =>
                                array(
                                    'billet' => 'Commanding Officer',
                                    'display_order' => 1,
                                ),
                            'Deputy Fleet Commander' =>
                                array(
                                    'billet' => 'Deputy Fleet Commander',
                                    'display_order' => 2,
                                ),
                            'Chief of Staff' =>
                                array(
                                    'billet' => 'Chief of Staff',
                                    'display_order' => 3,
                                ),
                            'Flag Lieutenant' =>
                                array(
                                    'billet' => 'Flag Lieutenant',
                                    'display_order' => 4,
                                ),
                            'Fleet Bosun' =>
                                array(
                                    'billet' => 'Bosun',
                                    'display_order' => 5,
                                ),
                        ),
                    'platoon' =>
                        array(
                            'Commanding Officer' =>
                                array(
                                    'billet' => 'Commanding Officer',
                                    'display_order' => 1,
                                ),
                            'Gunny' =>
                                array(
                                    'billet' => 'Gunny',
                                    'display_order' => 2,
                                ),
                        ),
                    'section' =>
                        array(
                            'Section Leader' =>
                                array(
                                    'billet' => 'Section Leader',
                                    'display_order' => 1,
                                ),
                        ),
                    'shuttle' =>
                        array(
                            'Commanding Officer' =>
                                array(
                                    'billet' => 'Commanding Officer',
                                    'display_order' => 1,
                                ),
                        ),
                    'keep' =>
                        array(
                            'Knight' =>
                                array(
                                    'billet' => 'Knight',
                                    'display_order' => 1,
                                ),
                            'Dame' =>
                                array(
                                    'billet' => 'Dame',
                                    'display_order' => 1,
                                ),
                            'Majordomo' =>
                                array(
                                    'billet' => 'Majordomo',
                                    'display_order' => 2,
                                ),
                        ),
                    'barony' =>
                        array(
                            'Baron|Baroness' =>
                                array(
                                    'display_order' => 1,
                                    'allow_courtesy' => false,
                                ),
                            'Baroness|Baron' =>
                                array(
                                    'display_order' => 2,
                                ),
                            'Majordomo' =>
                                array(
                                    'billet' => 'Majordomo',
                                    'display_order' => 3,
                                ),
                        ),
                    'county' =>
                        array(
                            'Earl|Countess' =>
                                array(
                                    'allow_courtesy' => false,
                                    'display_order' => 1,
                                ),
                            'Countess|Earl' =>
                                array(
                                    'display_order' => 2,
                                ),
                            'Majordomo' =>
                                array(
                                    'billet' => 'Majordomo',
                                    'display_order' => 3,
                                ),
                        ),
                    'duchy' =>
                        array(
                            'Duke|Duchess' =>
                                array(
                                    'allow_courtesy' => false,
                                    'display_order' => 1,
                                ),
                            'Duchess|Duke' =>
                                array(
                                    'display_order' => 2,
                                ),
                            'Majordomo' =>
                                array(
                                    'billet' => 'Majordomo',
                                    'display_order' => 3,
                                ),
                        ),
                    'steading' =>
                        array(
                            'Steadholder' =>
                                array(
                                    'billet' => 'Steadholder',
                                    'display_order' => 1,
                                ),
                            'Lord|Lady' =>
                                array(
                                    'display_order' => 2,
                                ),
                            'Majordomo' =>
                                array(
                                    'billet' => 'Majordomo',
                                    'display_order' => 3,
                                ),
                        ),
                    'grand_duchy' =>
                        array(
                            'Grand Duke|Grand Duchess' =>
                                array(
                                    'allow_courtesy' => false,
                                    'display_order' => 1,
                                ),
                            'Grand Duchess|Grand Duke' =>
                                array(
                                    'display_order' => 2,
                                ),
                            'Majordomo' =>
                                array(
                                    'billet' => 'Majordomo',
                                    'display_order' => 3,
                                ),
                        ),
                    'barracks' =>
                        array(
                            'Commanding Officer' =>
                                array(
                                    'billet' => 'Commanding Officer',
                                    'display_order' => 1,
                                ),
                            'Executive Officer' =>
                                array(
                                    'billet' => 'Executive Officer',
                                    'display_order' => 2,
                                ),
                            'NCOIC' =>
                                array(
                                    'billet' => 'NCOIC',
                                    'display_order' => 3,
                                ),
                        ),
                    'bivouac' =>
                        array(
                            'Commanding Officer' =>
                                array(
                                    'billet' => 'Commanding Officer',
                                    'display_order' => 1,
                                ),
                            'Executive Officer' =>
                                array(
                                    'billet' => 'Executive Officer',
                                    'display_order' => 2,
                                ),
                            'NCOIC' =>
                                array(
                                    'billet' => 'NCOIC',
                                    'display_order' => 3,
                                ),
                        ),
                    'fort' =>
                        array(
                            'Commanding Officer' =>
                                array(
                                    'billet' => 'Commanding Officer',
                                    'display_order' => 1,
                                ),
                            'Executive Officer' =>
                                array(
                                    'billet' => 'Executive Officer',
                                    'display_order' => 2,
                                ),
                            'NCOIC' =>
                                array(
                                    'billet' => 'NCOIC',
                                    'display_order' => 3,
                                ),
                        ),
                    'outpost' =>
                        array(
                            'Commanding Officer' =>
                                array(
                                    'billet' => 'Commanding Officer',
                                    'display_order' => 1,
                                ),
                            'Executive Officer' =>
                                array(
                                    'billet' => 'Executive Officer',
                                    'display_order' => 2,
                                ),
                            'NCOIC' =>
                                array(
                                    'billet' => 'NCOIC',
                                    'display_order' => 3,
                                ),
                        ),
                    'planetary' =>
                        array(
                            'Commanding Officer' =>
                                array(
                                    'billet' => 'Commanding Officer',
                                    'display_order' => 1,
                                ),
                            'Executive Officer' =>
                                array(
                                    'billet' => 'Executive Officer',
                                    'display_order' => 2,
                                ),
                            'NCOIC' =>
                                array(
                                    'billet' => 'NCOIC',
                                    'display_order' => 3,
                                ),
                        ),
                    'theater' =>
                        array(
                            'Commanding Officer' =>
                                array(
                                    'billet' => 'Commanding Officer',
                                    'display_order' => 1,
                                ),
                            'Executive Officer' =>
                                array(
                                    'billet' => 'Executive Officer',
                                    'display_order' => 2,
                                ),
                            'NCOIC' =>
                                array(
                                    'billet' => 'NCOIC',
                                    'display_order' => 3,
                                ),
                        ),
                    'battalion' =>
                        array(
                            'Commanding Officer' =>
                                array(
                                    'billet' => 'Commanding Officer',
                                    'display_order' => 1,
                                ),
                            'Executive Officer' =>
                                array(
                                    'billet' => 'Executive Officer',
                                    'display_order' => 2,
                                ),
                            'Senior NCO' =>
                                array(
                                    'billet' => 'Senior NCO',
                                    'display_order' => 3,
                                ),
                        ),
                    'brigade' =>
                        array(
                            'Commanding Officer' =>
                                array(
                                    'billet' => 'Commanding Officer',
                                    'display_order' => 1,
                                ),
                            'Executive Officer' =>
                                array(
                                    'billet' => 'Executive Officer',
                                    'display_order' => 2,
                                ),
                            'Senior NCO' =>
                                array(
                                    'billet' => 'Senior NCO',
                                    'display_order' => 3,
                                ),
                        ),
                    'company' =>
                        array(
                            'Commanding Officer' =>
                                array(
                                    'billet' => 'Commanding Officer',
                                    'display_order' => 1,
                                ),
                            'Executive Officer' =>
                                array(
                                    'billet' => 'Executive Officer',
                                    'display_order' => 2,
                                ),
                            'Senior NCO' =>
                                array(
                                    'billet' => 'Senior NCO',
                                    'display_order' => 3,
                                ),
                        ),
                    'corps' =>
                        array(
                            'Commanding Officer' =>
                                array(
                                    'billet' => 'Commanding Officer',
                                    'display_order' => 1,
                                ),
                            'Executive Officer' =>
                                array(
                                    'billet' => 'Executive Officer',
                                    'display_order' => 2,
                                ),
                            'Senior NCO' =>
                                array(
                                    'billet' => 'Senior NCO',
                                    'display_order' => 3,
                                ),
                        ),
                    'exp_force' =>
                        array(
                            'Commanding Officer' =>
                                array(
                                    'billet' => 'Commanding Officer',
                                    'display_order' => 1,
                                ),
                            'Executive Officer' =>
                                array(
                                    'billet' => 'Executive Officer',
                                    'display_order' => 2,
                                ),
                            'Senior NCO' =>
                                array(
                                    'billet' => 'Senior NCO',
                                    'display_order' => 3,
                                ),
                        ),
                    'regiment' =>
                        array(
                            'Commanding Officer' =>
                                array(
                                    'billet' => 'Commanding Officer',
                                    'display_order' => 1,
                                ),
                            'Executive Officer' =>
                                array(
                                    'billet' => 'Executive Officer',
                                    'display_order' => 2,
                                ),
                            'Senior NCO' =>
                                array(
                                    'billet' => 'Senior NCO',
                                    'display_order' => 3,
                                ),
                        ),
                    'squad' =>
                        array(
                            'Squad Leader' =>
                                array(
                                    'billet' => 'Squad Leader',
                                    'display_order' => 1,
                                ),
                        ),
                    'posting' =>
                        array(
                            'Head of Posting' =>
                                array(
                                    'billet' => 'Head of Posting',
                                    'display_order' => 1,
                                ),
                            'Deputy Head of Posting' =>
                                array(
                                    'billet' => 'Deputy Head of Posting',
                                    'display_order' => 2,
                                ),
                            'Assistant to the Head of Posting' =>
                                array(
                                    'billet' => 'Assistant to the Head of Posting',
                                    'display_order' => 3,
                                ),
                        ),
                    'quadrant' =>
                        array(
                            'Quadrant Secretary' =>
                                array(
                                    'billet' => 'Secretary',
                                    'display_order' => 1,
                                ),
                            'Quadrant Undersecretary' =>
                                array(
                                    'billet' => 'Undersecretary',
                                    'display_order' => 2,
                                ),
                            'Chief of Staff' =>
                                array(
                                    'billet' => 'Chief of Staff',
                                    'display_order' => 3,
                                ),
                        ),
                    'cluster' =>
                        array(
                            'Cluster Secretary' =>
                                array(
                                    'billet' => 'Secretary',
                                    'display_order' => 1,
                                ),
                            'Cluster Undersecretary' =>
                                array(
                                    'billet' => 'Undersecretary',
                                    'display_order' => 2,
                                ),
                            'Chief of Staff' =>
                                array(
                                    'billet' => 'Chief of Staff',
                                    'display_order' => 3,
                                ),
                        ),
                    'sector' =>
                        array(
                            'Sector Secretary' =>
                                array(
                                    'billet' => 'Secretary',
                                    'display_order' => 1,
                                ),
                            'Sector Undersecretary' =>
                                array(
                                    'billet' => 'Undersecretary',
                                    'display_order' => 2,
                                ),
                            'Chief of Staff' =>
                                array(
                                    'billet' => 'Chief of Staff',
                                    'display_order' => 3,
                                ),
                        ),
                    'region' =>
                        array(
                            'Region Secretary' =>
                                array(
                                    'billet' => 'Secretary',
                                    'display_order' => 1,
                                ),
                            'Region Undersecretary' =>
                                array(
                                    'billet' => 'Undersecretary',
                                    'display_order' => 2,
                                ),
                            'Chief of Staff' =>
                                array(
                                    'billet' => 'Chief of Staff',
                                    'display_order' => 3,
                                ),
                        ),
                    'system' =>
                        array(
                            'System Secretary' =>
                                array(
                                    'billet' => 'Secretary',
                                    'display_order' => 1,
                                ),
                            'System Undersecretary' =>
                                array(
                                    'billet' => 'Undersecretary',
                                    'display_order' => 2,
                                ),
                            'Chief of Staff' =>
                                array(
                                    'billet' => 'Chief of Staff',
                                    'display_order' => 3,
                                ),
                        ),
                    'civ_planetary' =>
                        array(
                            'Planetary Secretary' =>
                                array(
                                    'billet' => 'Secretary',
                                    'display_order' => 1,
                                ),
                            'Planetary Undersecretary' =>
                                array(
                                    'billet' => 'Undersecretary',
                                    'display_order' => 2,
                                ),
                            'Chief of Staff' =>
                                array(
                                    'billet' => 'Chief of Staff',
                                    'display_order' => 3,
                                ),
                        ),
                    'board' =>
                        array(
                            'President' =>
                                array(
                                    'billet' => 'President',
                                    'display_order' => 1,
                                ),
                            'Executive Vice President' =>
                                array(
                                    'billet' => 'Executive Vice President',
                                    'display_order' => 2,
                                ),
                        ),
                    'committee' =>
                        array(
                            'Chair' =>
                                array(
                                    'billet' => 'Chair',
                                    'display_order' => 1,
                                ),
                            'Vice Chair' =>
                                array(
                                    'billet' => 'Vice Chair',
                                    'display_order' => 2,
                                ),
                        ),
                ),
                'updated_at' => '2024-02-14 03:22:11',
                'created_at' => '2016-10-21 15:41:06',
                'id' => '580a3712e4bed80a488b456e',
            ],
            [
                'key' => 'chapter.types',
                'value' => array(
                    0 => 'ship',
                    1 => 'mship',
                    2 => 'station',
                    3 => 'fstation',
                    4 => 'tug',
                    5 => 'jfort',
                    6 => 'lac',
                    7 => 'small_craft',
                    8 => 'posting',
                ),
                'updated_at' => '2021-02-08 16:48:48',
                'created_at' => '2018-06-11 01:58:44',
                'id' => '5b1dd754a016bd42c42f7009',
            ],
            [
                'key' => 'exam.regex',
                'value' => array(
                    'RMN' => '/^SIA-RMN-.*/',
                    'RMN Speciality' => '/^SIA-SRN-.*/',
                    'RMMC' => '/^SIA-RMMC-.*/',
                    'RMMC Speciality' => '/^SIA-SRMC-.*/',
                    'RMA' => '/^KR1MA-RMA-.*/',
                    'RMA Speciality' => '/^KR1MA-RMAT-.*/',
                    'GSN' => '/^IMNA-GSN-.*/',
                    'GSN Speciality' => '/^IMNA-(STC|AFLTC|GTSC)-.*/',
                    'Landing University' => '/^LU-.*/',
                    'RMACS' => '/^SIA-RMACS-.*/',
                    'RMACS Specialty' => '/^RMACA-(AOPA|RMACS)-.*/',
                    'RMMM' => '/^SIA-RMMM-.*/',
                    'Mannheim University' => '/^MU-.*/',
                    'IAN' => '/^PAM?A-IAN-.*/',
                    'SFC' => '/^SIA-SFC-.*/',
                    'Core College' => '/^SKU-CORE-.*/',
                    'GPU' => '/^(GPU-TRMN|GPU-ALC|TRMN-[^-]*)-/',
                ),
                'updated_at' => '2020-04-09 01:30:47',
                'created_at' => '2016-10-21 15:41:06',
                'id' => '580a3712e4bed80a488b4567',
            ],
            [
                'key' => 'gpa.patterns',
                'value' => array(
                    'services' =>
                        array(
                            'RMN' => '/^SIA-RMN-',
                            'RMMC' => '/^SIA-RMMC-',
                            'RMA' => '/^KR1MA-RMA-',
                            'GSN' => '/^IMNA-GSN-',
                            'RMACS' => '/^SIA-RMACS-',
                            'IAN' => '/^PAM?A-IAN-',
                            'RMMM' => '/^SIA-RMMM-',
                            'SFC' => '/^SIA-SFC-',
                            'GPU' => '/^(GPU-TRMN|GPU-ALC|TRMN-[^-]*)-',
                        ),
                    'courses' =>
                        array(
                            'enlisted' => '000[1-9]/',
                            'warrant' => '001[1-9]$/',
                            'officer' => '01[0-9][1-9]$/',
                            'flag' => '[12]00[1-9]S?$/',
                        ),
                ),
                'updated_at' => '2020-04-09 01:31:28',
                'created_at' => '2018-05-28 18:35:30',
                'id' => '5b0c4bf2cbe77603d215d965',
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
                'updated_at' => '2018-07-27 01:06:27',
                'created_at' => '2018-05-28 18:35:30',
                'id' => '5b0c4bf2cbe77603d215d967',
            ],
            [
                'key' => 'minor_pii_config',
                'value' => array(
                    'default' => 18,
                    'data' =>
                        array(
                            0 =>
                                array(
                                    'field' => 'state_province',
                                    'value' => 'AL',
                                    'age' => 19,
                                ),
                            1 =>
                                array(
                                    'field' => 'state_province',
                                    'value' => 'NE',
                                    'age' => 19,
                                ),
                            2 =>
                                array(
                                    'field' => 'state_province',
                                    'value' => 'MS',
                                    'age' => 21,
                                ),
                        ),
                ),
                'updated_at' => '2021-12-27 19:32:08',
                'created_at' => '2021-12-27 19:32:08',
                'id' => '61ca14b89c6b7f216755b1b8',
            ],
            [
                'key' => 'openid-configuration',
                'value' => array(
                    'issuer' => 'https://medusa.trmn.org',
                    'authorization_endpoint' => 'https://medusa.trmn.org/oauth/authorize',
                    'token_endpoint' => 'https://medusa.trmn.org/oauth/token',
                    'userinfo_endpoint' => 'https://medusa.trmn.org/oauth/profile',
                ),
                'updated_at' => '2017-08-09 15:44:36',
                'created_at' => '2017-08-09 15:43:25',
                'id' => '598b2d9dc0b51f177d3d6407',
            ],
            [
                'key' => 'pp.exams',
                'value' => array(
                    2 =>
                        array(
                            0 => '/(?>SIA|KR1MA|IMNA|PAM?A|LU)-(?>RMN|RMMC|RMA|GSN|IAN|RMMM|RMACS|KC|QC)-0[01]{2}1/',
                            1 => '/(?>SIA|IMNA)-(?>RMN|RMMC|GSN|RMACS)-0(?>006|013|106)/',
                            2 => '/KR1MA-RMA-0(?>008|014|106)/',
                            3 => '/SIA-RMMM-0005/',
                            4 => '/LU-(?>KC|QC)-0(?>006|013|105)/',
                            5 => '/(?>SIA|LU)-(?>RMN|RMMC|KC|QC)-011[35]/',
                            6 => '/(?>SIA|IMNA|RMACA)-(?>SRN|SRMC|AFLTC|GTSC|RMACS)-(?>[0-9][1-9]|[1-9][0-9])[WD]/',
                            7 => '/(?>LU|MU)-(?>CRIM|XI|ECON|HS19C|HS20C|HSAFR|HSASN|HSEUR|HSMED|HSNAM|HSTRM|PLSC)-(?>04|CZ04|XS04|XB04)/',
                            8 => '/SKU-CORE-0[1-4]/',
                            9 => '/SIA-RMMC-(>?S|G|JTC)-C/',
                            10 => '/GPU-ALC-[A-Z][0-9]+/',
                        ),
                    3 =>
                        array(
                            0 => '/(?>SIA|LU|IMNA|KR1MA|PAM?A)-(?>RMN|RMMC|RMACS|GSN|RMA|KC|QC|RMMM|IAN)-100[1-4]/',
                        ),
                    4 =>
                        array(
                            0 => '/(?>SIA|LU|IMNA|KR1MA|PAM?A)-(?>RMN|RMMC|RMACS|GSN|RMA|KC|QC|RMMM|IAN)-1005/',
                        ),
                    5 =>
                        array(
                            0 => '/SIA-RMN-2001S?/',
                        ),
                ),
                'updated_at' => '2020-04-09 01:32:27',
                'created_at' => '2018-05-28 18:35:30',
                'id' => '5b0c4bf2cbe77603d215d961',
            ],
            [
                'key' => 'pp.form-config',
                'value' => array(
                    'service' =>
                        array(
                            0 =>
                                array(
                                    'title' => 'Every 3 months in a Chapter Command Triad.  Enter total months.',
                                    'target' => 'triad',
                                    'points' => 1,
                                    'class' => 'pp-calc-3',
                                ),
                            1 =>
                                array(
                                    'title' => 'Every 3 months in a Fleet Staff role.  Enter total months/br/(includes Fleet CO\'s and their staff)',
                                    'target' => 'fleet',
                                    'points' => 1,
                                    'class' => 'pp-calc-3',
                                ),
                            2 =>
                                array(
                                    'title' => 'Every 3 months in an Admiralty House position.  Enter total months/br/(includes Royal Council, Space Lords and their staff)',
                                    'target' => 'ah',
                                    'points' => 1,
                                    'class' => 'pp-calc-3',
                                ),
                        ),
                    'events' =>
                        array(
                            0 =>
                                array(
                                    'title' => 'Chapter Meeting',
                                    'target' => 'cpm',
                                    'points' => 1,
                                    'class' => 'pp-calc',
                                ),
                            1 =>
                                array(
                                    'title' => 'Chapter Event (other than a meeting)',
                                    'target' => 'cpe',
                                    'points' => 1,
                                    'class' => 'pp-calc',
                                ),
                            2 =>
                                array(
                                    'title' => 'Charity Event (per 24 hour day)',
                                    'target' => 'che',
                                    'points' => 2,
                                    'class' => 'pp-calc',
                                ),
                            3 =>
                                array(
                                    'title' => 'Hosting a chapter meeting or event (per event)',
                                    'target' => 'cph',
                                    'points' => 2,
                                    'class' => 'pp-calc',
                                ),
                            4 =>
                                array(
                                    'title' => 'Hosting a charity event (per event)',
                                    'target' => 'chh',
                                    'points' => 4,
                                    'class' => 'pp-calc',
                                ),
                            5 =>
                                array(
                                    'title' => 'Hosting a virtual charity event (per event)',
                                    'target' => 'vch',
                                    'points' => 3,
                                    'class' => 'pp-calc',
                                ),
                            6 =>
                                array(
                                    'title' => 'Attend non-Fleet or Admiralty House con (per day)',
                                    'target' => 'con',
                                    'points' => 1,
                                    'class' => 'pp-calc',
                                ),
                            7 =>
                                array(
                                    'title' => 'Attend Fleet or Admiralty House con (per day)',
                                    'target' => 'ahcon',
                                    'points' => 2,
                                    'class' => 'pp-calc',
                                ),
                            8 =>
                                array(
                                    'title' => 'Volunteer at a non-Fleet or Admiralty House con/br/(4 hours or more, in addition to attendance points)',
                                    'target' => 'vcon',
                                    'points' => 1,
                                    'class' => 'pp-calc',
                                ),
                            9 =>
                                array(
                                    'title' => 'Volunteer at a Fleet or Admiralty House con/br/(4 hours or more, in addition to attendance points)',
                                    'target' => 'vahcon',
                                    'points' => 2,
                                    'class' => 'pp-calc',
                                ),
                        ),
                    'parliament' =>
                        array(
                            0 =>
                                array(
                                    'title' => 'Serve as a Member of Parliament (per year)',
                                    'target' => 'mp',
                                    'points' => 2,
                                    'class' => 'pp-calc',
                                ),
                            1 =>
                                array(
                                    'title' => 'Serve as Speaker of the House (per year, in addition to service as Member)',
                                    'target' => 'sh',
                                    'points' => 1,
                                    'class' => 'pp-calc',
                                ),
                            2 =>
                                array(
                                    'title' => 'Serve as Lord Speaker (per year, in addition to service as Member)',
                                    'target' => 'ls',
                                    'points' => 1,
                                    'class' => 'pp-calc',
                                ),
                        ),
                ),
                'updated_at' => '2025-08-08 00:06:14',
                'created_at' => '2018-05-28 18:35:30',
                'id' => '5b0c4bf2cbe77603d215d963',
            ],
            [
                'key' => 'pp.nextGrade',
                'value' => array(
                    'P-1' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'P-2',
                                ),
                        ),
                    'P-2' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'P-3',
                                ),
                        ),
                    'P-3' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'P-4',
                                ),
                        ),
                    'P-4' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'C-1',
                                ),
                        ),
                    'E-1' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'E-2',
                                ),
                        ),
                    'C-1' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'C-2',
                                ),
                        ),
                    'E-2' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'E-3',
                                ),
                        ),
                    'C-2' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'C-3',
                                ),
                        ),
                    'E-3' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'E-4',
                                ),
                        ),
                    'C-3' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'C-4',
                                ),
                        ),
                    'E-4' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'E-5',
                                ),
                        ),
                    'C-4' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'C-5',
                                ),
                        ),
                    'E-5' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'E-6',
                                ),
                        ),
                    'C-5' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'C-6',
                                ),
                        ),
                    'E-6' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'E-7',
                                ),
                        ),
                    'C-6' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'C-7',
                                ),
                        ),
                    'E-7' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'E-8',
                                ),
                        ),
                    'C-7' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'C-8',
                                ),
                        ),
                    'E-8' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'E-9',
                                ),
                        ),
                    'C-8' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'C-9',
                                ),
                        ),
                    'E-9' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'E-10',
                                ),
                        ),
                    'C-9' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'C-10',
                                ),
                        ),
                    'WO-1' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'WO-2',
                                ),
                        ),
                    'WO-2' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'WO-3',
                                ),
                        ),
                    'WO-3' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'WO-4',
                                ),
                        ),
                    'C-10' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'C-11',
                                ),
                        ),
                    'WO-4' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'WO-5',
                                ),
                        ),
                    'O-1' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'O-2',
                                ),
                        ),
                    'C-12' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'C-13',
                                ),
                        ),
                    'O-2' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'O-3',
                                ),
                        ),
                    'C-13' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'C-14',
                                ),
                        ),
                    'O-3' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'O-4',
                                ),
                        ),
                    'C-14' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'C-15',
                                ),
                        ),
                    'O-4' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'O-5',
                                ),
                        ),
                    'C-15' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'C-16',
                                ),
                        ),
                    'O-5' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'O-6',
                                    1 => 'O-6-A',
                                ),
                        ),
                    'C-16' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'C-17',
                                ),
                        ),
                    'O-6' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'F-1',
                                ),
                        ),
                    'C-17' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'C-18',
                                ),
                        ),
                    'O-6-A' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'O-6-B',
                                ),
                        ),
                    'O-6-B' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'F-1',
                                ),
                        ),
                    'F-1' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'F-2',
                                    1 => 'F-2-A',
                                ),
                        ),
                    'C-18' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'C-19',
                                ),
                        ),
                    'F-2' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'F-3',
                                ),
                        ),
                    'C-19' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'C-20',
                                ),
                        ),
                    'F-2-A' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'F-2-B',
                                ),
                        ),
                    'F-2-B' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'F-3-A',
                                ),
                        ),
                    'F-3' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'F-4',
                                ),
                        ),
                    'C-20' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'C-21',
                                ),
                        ),
                    'F-3-A' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'F-3-B',
                                ),
                        ),
                    'F-3-B' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'F-4-A',
                                ),
                        ),
                    'F-4' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'F-5',
                                ),
                        ),
                    'C-21' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'C-22',
                                ),
                        ),
                    'F-4-A' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'F-4-B',
                                ),
                        ),
                    'F-4-B' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'F-5-A',
                                ),
                        ),
                    'F-5' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'F-6',
                                ),
                        ),
                    'F-5-A' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'F-5-B',
                                ),
                        ),
                    'F-5-B' =>
                        array(
                            'next' =>
                                array(
                                    0 => 'F-6',
                                ),
                        ),
                ),
                'updated_at' => '2025-06-29 17:17:01',
                'created_at' => '2018-05-28 18:35:30',
                'id' => '5b0c4bf2cbe77603d215d995',
            ],
            [
                'key' => 'pp.requirements',
                'value' => array(
                    'E-2' =>
                        array(
                            'tig' => 2,
                            'line' =>
                                array(
                                    'points' => 3,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 3,
                                    'exam' =>
                                        array(),
                                ),
                            'service' =>
                                array(
                                    'points' => 3,
                                    'exam' =>
                                        array(),
                                ),
                        ),
                    'E-3' =>
                        array(
                            'tig' => 4,
                            'line' =>
                                array(
                                    'points' => 6,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 6,
                                    'exam' =>
                                        array(),
                                ),
                            'service' =>
                                array(
                                    'points' => 6,
                                    'exam' =>
                                        array(),
                                ),
                        ),
                    'E-4' =>
                        array(
                            'tig' => 5,
                            'line' =>
                                array(
                                    'points' => 9,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 9,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 9,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                        ),
                    'E-5' =>
                        array(
                            'tig' => 6,
                            'line' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 14,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 12,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                        ),
                    'E-6' =>
                        array(
                            'tig' => 7,
                            'line' =>
                                array(
                                    'points' => 36,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 26,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                        ),
                    'E-7' =>
                        array(
                            'tig' => 9,
                            'line' =>
                                array(
                                    'points' => 45,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 35,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 21,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                        ),
                    'E-8' =>
                        array(
                            'tig' => 12,
                            'line' =>
                                array(
                                    'points' => 54,
                                    'exam' =>
                                        array(
                                            0 => '(00)?04',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 42,
                                    'exam' =>
                                        array(
                                            0 => '(00)?04',
                                        ),
                                ),
                        ),
                    'E-9' =>
                        array(
                            'tig' => 15,
                            'line' =>
                                array(
                                    'points' => 63,
                                    'exam' =>
                                        array(
                                            0 => '0005',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 52,
                                    'exam' =>
                                        array(
                                            0 => '(00)?04',
                                        ),
                                ),
                        ),
                    'E-10' =>
                        array(
                            'tig' => 18,
                            'line' =>
                                array(
                                    'points' => 72,
                                    'exam' =>
                                        array(
                                            0 => '0006',
                                        ),
                                ),
                        ),
                    'WO-1' =>
                        array(
                            'tig' => 4,
                            'as' =>
                                array(
                                    0 => 'E-4',
                                    1 => 'E-5',
                                    2 => 'E-6',
                                    3 => 'E-7',
                                    4 => 'E-8',
                                    5 => 'E-9',
                                    6 => 'E-10',
                                ),
                            'line' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '0011',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '0011',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(),
                                ),
                        ),
                    'WO-2' =>
                        array(
                            'tig' => 6,
                            'line' =>
                                array(
                                    'points' => 36,
                                    'exam' =>
                                        array(
                                            0 => '0011',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 26,
                                    'exam' =>
                                        array(
                                            0 => '0011',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 24,
                                    'exam' =>
                                        array(
                                            0 => '0011',
                                        ),
                                ),
                        ),
                    'WO-3' =>
                        array(
                            'tig' => 9,
                            'line' =>
                                array(
                                    'points' => 45,
                                    'exam' =>
                                        array(
                                            0 => '0012',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 35,
                                    'exam' =>
                                        array(
                                            0 => '0012',
                                        ),
                                ),
                        ),
                    'WO-4' =>
                        array(
                            'tig' => 12,
                            'line' =>
                                array(
                                    'points' => 60,
                                    'exam' =>
                                        array(
                                            0 => '0012',
                                        ),
                                ),
                        ),
                    'WO-5' =>
                        array(
                            'tig' => 15,
                            'line' =>
                                array(
                                    'points' => 72,
                                    'exam' =>
                                        array(
                                            0 => '0013',
                                        ),
                                ),
                        ),
                    'O-1' =>
                        array(
                            'tig' => 4,
                            'as' =>
                                array(
                                    0 => 'E-4',
                                    1 => 'E-5',
                                    2 => 'E-6',
                                    3 => 'E-7',
                                    4 => 'E-8',
                                    5 => 'E-9',
                                    6 => 'E-10',
                                ),
                            'line' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                        ),
                    'O-2' =>
                        array(
                            'tig' => 6,
                            'line' =>
                                array(
                                    'points' => 24,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 24,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 24,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                        ),
                    'O-3' =>
                        array(
                            'tig' => 9,
                            'line' =>
                                array(
                                    'points' => 32,
                                    'exam' =>
                                        array(
                                            0 => '0103',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 30,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 27,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                        ),
                    'O-4' =>
                        array(
                            'tig' => 12,
                            'line' =>
                                array(
                                    'points' => 40,
                                    'exam' =>
                                        array(
                                            0 => '0104',
                                            1 => '0113',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 36,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 32,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                        ),
                    'O-5' =>
                        array(
                            'tig' => 15,
                            'line' =>
                                array(
                                    'points' => 48,
                                    'exam' =>
                                        array(
                                            0 => '0105',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 44,
                                    'exam' =>
                                        array(
                                            0 => '0103',
                                        ),
                                ),
                        ),
                    'O-6' =>
                        array(
                            'tig' => 18,
                            'line' =>
                                array(
                                    'points' => 63,
                                    'exam' =>
                                        array(
                                            0 => '0106',
                                            1 => '0115',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 63,
                                    'exam' =>
                                        array(
                                            0 => '0104',
                                            1 => '0113',
                                        ),
                                ),
                        ),
                    'O-6-A' =>
                        array(
                            'tig' => 18,
                            'line' =>
                                array(
                                    'points' => 56,
                                    'exam' =>
                                        array(
                                            0 => '0106',
                                            1 => '0113',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 52,
                                    'exam' =>
                                        array(
                                            0 => '0103',
                                        ),
                                ),
                        ),
                    'O-6-B' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 63,
                                    'exam' =>
                                        array(
                                            0 => '1001',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 63,
                                    'exam' =>
                                        array(
                                            0 => '0104',
                                            1 => '0113',
                                        ),
                                ),
                        ),
                    'F-1' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 73,
                                    'exam' =>
                                        array(
                                            0 => '1001',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 73,
                                    'exam' =>
                                        array(
                                            0 => '0106',
                                        ),
                                ),
                        ),
                    'F-2' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 93,
                                    'exam' =>
                                        array(
                                            0 => '1002',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 93,
                                    'exam' =>
                                        array(
                                            0 => '1001',
                                        ),
                                ),
                        ),
                    'F-2-A' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 83,
                                    'exam' =>
                                        array(
                                            0 => '1002',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 83,
                                    'exam' =>
                                        array(
                                            0 => '0106',
                                            1 => '0115',
                                        ),
                                ),
                        ),
                    'F-2-B' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 93,
                                    'exam' =>
                                        array(
                                            0 => '1002',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 93,
                                    'exam' =>
                                        array(
                                            0 => '1001',
                                        ),
                                ),
                        ),
                    'F-3' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 113,
                                    'exam' =>
                                        array(
                                            0 => '1003',
                                        ),
                                ),
                        ),
                    'F-3-A' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 103,
                                    'exam' =>
                                        array(
                                            0 => '1003',
                                        ),
                                ),
                        ),
                    'F-3-B' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 113,
                                    'exam' =>
                                        array(
                                            0 => '1003',
                                        ),
                                ),
                        ),
                    'F-4' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 133,
                                    'exam' =>
                                        array(
                                            0 => '1004',
                                        ),
                                ),
                        ),
                    'F-4-A' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 113,
                                    'exam' =>
                                        array(
                                            0 => '1004',
                                        ),
                                ),
                        ),
                    'F-4-B' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 123,
                                    'exam' =>
                                        array(
                                            0 => '1004',
                                        ),
                                ),
                        ),
                    'F-5' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 153,
                                    'exam' =>
                                        array(
                                            0 => '1005',
                                        ),
                                ),
                        ),
                    'F-5-A' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 143,
                                    'exam' =>
                                        array(
                                            0 => '1005',
                                        ),
                                ),
                        ),
                    'F-5-B' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 153,
                                    'exam' =>
                                        array(
                                            0 => '1005',
                                        ),
                                ),
                        ),
                    'F-6' =>
                        array(
                            'line' =>
                                array(
                                    'exam' =>
                                        array(
                                            0 => '1005',
                                        ),
                                ),
                        ),
                ),
                'updated_at' => '2025-06-29 17:17:01',
                'created_at' => '2018-05-28 18:35:30',
                'id' => '5b0c4bf2cbe77603d215d997',
            ],
            [
                'key' => 'pp.requirements.COMMONS',
                'value' => array(
                    'C-2' =>
                        array(
                            'tig' => 2,
                            'line' =>
                                array(
                                    'points' => 3,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 3,
                                    'exam' =>
                                        array(),
                                ),
                            'service' =>
                                array(
                                    'points' => 3,
                                    'exam' =>
                                        array(),
                                ),
                        ),
                    'C-3' =>
                        array(
                            'tig' => 4,
                            'line' =>
                                array(
                                    'points' => 6,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 6,
                                    'exam' =>
                                        array(),
                                ),
                            'service' =>
                                array(
                                    'points' => 6,
                                    'exam' =>
                                        array(),
                                ),
                        ),
                    'C-4' =>
                        array(
                            'tig' => 5,
                            'line' =>
                                array(
                                    'points' => 9,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 9,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 9,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                        ),
                    'C-5' =>
                        array(
                            'tig' => 6,
                            'line' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 14,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 12,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                        ),
                    'C-6' =>
                        array(
                            'tig' => 7,
                            'line' =>
                                array(
                                    'points' => 36,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 26,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                        ),
                    'C-7' =>
                        array(
                            'tig' => 9,
                            'line' =>
                                array(
                                    'points' => 45,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 35,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 21,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                        ),
                    'C-8' =>
                        array(
                            'tig' => 12,
                            'line' =>
                                array(
                                    'points' => 54,
                                    'exam' =>
                                        array(
                                            0 => '(00)?04',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 42,
                                    'exam' =>
                                        array(
                                            0 => '(00)?04',
                                        ),
                                ),
                        ),
                    'C-9' =>
                        array(
                            'tig' => 15,
                            'line' =>
                                array(
                                    'points' => 63,
                                    'exam' =>
                                        array(
                                            0 => '0005',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 52,
                                    'exam' =>
                                        array(
                                            0 => '(00)?04',
                                        ),
                                ),
                        ),
                    'C-10' =>
                        array(
                            'tig' => 18,
                            'line' =>
                                array(
                                    'points' => 72,
                                    'exam' =>
                                        array(
                                            0 => '0006',
                                        ),
                                ),
                        ),
                    'C-11' =>
                        array(
                            'tig' => 4,
                            'as' =>
                                array(
                                    0 => 'C-4',
                                    1 => 'C-5',
                                    2 => 'C-6',
                                    3 => 'C-7',
                                    4 => 'C-8',
                                    5 => 'C-9',
                                    6 => 'C-10',
                                ),
                            'line' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                        ),
                    'C-12' =>
                        array(
                            'tig' => 6,
                            'line' =>
                                array(
                                    'points' => 24,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 24,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 24,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                        ),
                    'C-13' =>
                        array(
                            'tig' => 9,
                            'line' =>
                                array(
                                    'points' => 32,
                                    'exam' =>
                                        array(
                                            0 => '0103',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 30,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 27,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                        ),
                    'C-14' =>
                        array(
                            'tig' => 12,
                            'line' =>
                                array(
                                    'points' => 40,
                                    'exam' =>
                                        array(
                                            0 => '0104',
                                            1 => '0113',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 36,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 32,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                        ),
                    'C-15' =>
                        array(
                            'tig' => 15,
                            'line' =>
                                array(
                                    'points' => 48,
                                    'exam' =>
                                        array(
                                            0 => '0105',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 44,
                                    'exam' =>
                                        array(
                                            0 => '0103',
                                        ),
                                ),
                        ),
                    'C-16' =>
                        array(
                            'tig' => 18,
                            'line' =>
                                array(
                                    'points' => 63,
                                    'exam' =>
                                        array(
                                            0 => '0106',
                                            1 => '0115',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 63,
                                    'exam' =>
                                        array(
                                            0 => '0104',
                                            1 => '0113',
                                        ),
                                ),
                        ),
                    'C-17' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 73,
                                    'exam' =>
                                        array(
                                            0 => '1001',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 73,
                                    'exam' =>
                                        array(
                                            0 => '0106',
                                        ),
                                ),
                        ),
                    'C-18' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 93,
                                    'exam' =>
                                        array(
                                            0 => '1002',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 93,
                                    'exam' =>
                                        array(
                                            0 => '1001',
                                        ),
                                ),
                        ),
                    'C-19' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 113,
                                    'exam' =>
                                        array(
                                            0 => '1003',
                                        ),
                                ),
                        ),
                    'C-20' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 133,
                                    'exam' =>
                                        array(
                                            0 => '1004',
                                        ),
                                ),
                        ),
                    'C-21' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 153,
                                    'exam' =>
                                        array(
                                            0 => '1005',
                                        ),
                                ),
                        ),
                    'C-22' =>
                        array(
                            'line' =>
                                array(
                                    'exam' =>
                                        array(
                                            0 => '1005',
                                        ),
                                ),
                        ),
                ),
                'updated_at' => '2025-06-29 17:17:01',
                'created_at' => '2019-09-28 22:45:20',
                'id' => '5d8fe2809c6b7f16eb011fa8',
            ],
            [
                'key' => 'pp.requirements.DIPLOMATIC',
                'value' => array(
                    'C-2' =>
                        array(
                            'tig' => 2,
                            'line' =>
                                array(
                                    'points' => 3,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 3,
                                    'exam' =>
                                        array(),
                                ),
                            'service' =>
                                array(
                                    'points' => 3,
                                    'exam' =>
                                        array(),
                                ),
                        ),
                    'C-3' =>
                        array(
                            'tig' => 4,
                            'line' =>
                                array(
                                    'points' => 6,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 6,
                                    'exam' =>
                                        array(),
                                ),
                            'service' =>
                                array(
                                    'points' => 6,
                                    'exam' =>
                                        array(),
                                ),
                        ),
                    'C-4' =>
                        array(
                            'tig' => 5,
                            'line' =>
                                array(
                                    'points' => 9,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 9,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 9,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                        ),
                    'C-5' =>
                        array(
                            'tig' => 6,
                            'line' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 14,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 12,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                        ),
                    'C-6' =>
                        array(
                            'tig' => 7,
                            'line' =>
                                array(
                                    'points' => 36,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 26,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                        ),
                    'C-7' =>
                        array(
                            'tig' => 9,
                            'line' =>
                                array(
                                    'points' => 45,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 35,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 21,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                        ),
                    'C-8' =>
                        array(
                            'tig' => 12,
                            'line' =>
                                array(
                                    'points' => 54,
                                    'exam' =>
                                        array(
                                            0 => '(00)?04',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 42,
                                    'exam' =>
                                        array(
                                            0 => '(00)?04',
                                        ),
                                ),
                        ),
                    'C-9' =>
                        array(
                            'tig' => 15,
                            'line' =>
                                array(
                                    'points' => 63,
                                    'exam' =>
                                        array(
                                            0 => '0005',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 52,
                                    'exam' =>
                                        array(
                                            0 => '(00)?04',
                                        ),
                                ),
                        ),
                    'C-10' =>
                        array(
                            'tig' => 18,
                            'line' =>
                                array(
                                    'points' => 72,
                                    'exam' =>
                                        array(
                                            0 => '0006',
                                        ),
                                ),
                        ),
                    'C-11' =>
                        array(
                            'tig' => 4,
                            'as' =>
                                array(
                                    0 => 'C-4',
                                    1 => 'C-5',
                                    2 => 'C-6',
                                    3 => 'C-7',
                                    4 => 'C-8',
                                    5 => 'C-9',
                                    6 => 'C-10',
                                ),
                            'line' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                        ),
                    'C-12' =>
                        array(
                            'tig' => 6,
                            'line' =>
                                array(
                                    'points' => 24,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 24,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 24,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                        ),
                    'C-13' =>
                        array(
                            'tig' => 9,
                            'line' =>
                                array(
                                    'points' => 32,
                                    'exam' =>
                                        array(
                                            0 => '0103',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 30,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 27,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                        ),
                    'C-14' =>
                        array(
                            'tig' => 12,
                            'line' =>
                                array(
                                    'points' => 40,
                                    'exam' =>
                                        array(
                                            0 => '0104',
                                            1 => '0113',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 36,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 32,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                        ),
                    'C-15' =>
                        array(
                            'tig' => 15,
                            'line' =>
                                array(
                                    'points' => 48,
                                    'exam' =>
                                        array(
                                            0 => '0105',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 44,
                                    'exam' =>
                                        array(
                                            0 => '0103',
                                        ),
                                ),
                        ),
                    'C-16' =>
                        array(
                            'tig' => 18,
                            'line' =>
                                array(
                                    'points' => 63,
                                    'exam' =>
                                        array(
                                            0 => '0106',
                                            1 => '0115',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 63,
                                    'exam' =>
                                        array(
                                            0 => '0104',
                                            1 => '0113',
                                        ),
                                ),
                        ),
                    'C-17' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 73,
                                    'exam' =>
                                        array(
                                            0 => '1001',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 73,
                                    'exam' =>
                                        array(
                                            0 => '0106',
                                        ),
                                ),
                        ),
                    'C-18' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 93,
                                    'exam' =>
                                        array(
                                            0 => '1002',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 93,
                                    'exam' =>
                                        array(
                                            0 => '1001',
                                        ),
                                ),
                        ),
                    'C-19' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 113,
                                    'exam' =>
                                        array(
                                            0 => '1003',
                                        ),
                                ),
                        ),
                    'C-20' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 133,
                                    'exam' =>
                                        array(
                                            0 => '1004',
                                        ),
                                ),
                        ),
                    'C-21' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 153,
                                    'exam' =>
                                        array(
                                            0 => '1005',
                                        ),
                                ),
                        ),
                    'C-22' =>
                        array(
                            'line' =>
                                array(
                                    'exam' =>
                                        array(
                                            0 => '1005',
                                        ),
                                ),
                        ),
                ),
                'updated_at' => '2025-06-29 17:17:01',
                'created_at' => '2019-08-12 00:30:36',
                'id' => '5d50b32c9c6b7f11984a422d',
            ],
            [
                'key' => 'pp.requirements.INTEL',
                'value' => array(
                    'C-2' =>
                        array(
                            'tig' => 2,
                            'line' =>
                                array(
                                    'points' => 3,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 3,
                                    'exam' =>
                                        array(),
                                ),
                            'service' =>
                                array(
                                    'points' => 3,
                                    'exam' =>
                                        array(),
                                ),
                        ),
                    'C-3' =>
                        array(
                            'tig' => 4,
                            'line' =>
                                array(
                                    'points' => 6,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 6,
                                    'exam' =>
                                        array(),
                                ),
                            'service' =>
                                array(
                                    'points' => 6,
                                    'exam' =>
                                        array(),
                                ),
                        ),
                    'C-4' =>
                        array(
                            'tig' => 5,
                            'line' =>
                                array(
                                    'points' => 9,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 9,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 9,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                        ),
                    'C-5' =>
                        array(
                            'tig' => 6,
                            'line' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 14,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 12,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                        ),
                    'C-6' =>
                        array(
                            'tig' => 7,
                            'line' =>
                                array(
                                    'points' => 36,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 26,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                        ),
                    'C-7' =>
                        array(
                            'tig' => 9,
                            'line' =>
                                array(
                                    'points' => 45,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 35,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 21,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                        ),
                    'C-8' =>
                        array(
                            'tig' => 12,
                            'line' =>
                                array(
                                    'points' => 54,
                                    'exam' =>
                                        array(
                                            0 => '(00)?04',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 42,
                                    'exam' =>
                                        array(
                                            0 => '(00)?04',
                                        ),
                                ),
                        ),
                    'C-9' =>
                        array(
                            'tig' => 15,
                            'line' =>
                                array(
                                    'points' => 63,
                                    'exam' =>
                                        array(
                                            0 => '0005',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 52,
                                    'exam' =>
                                        array(
                                            0 => '(00)?04',
                                        ),
                                ),
                        ),
                    'C-10' =>
                        array(
                            'tig' => 18,
                            'line' =>
                                array(
                                    'points' => 72,
                                    'exam' =>
                                        array(
                                            0 => '0006',
                                        ),
                                ),
                        ),
                    'C-11' =>
                        array(
                            'tig' => 4,
                            'as' =>
                                array(
                                    0 => 'C-4',
                                    1 => 'C-5',
                                    2 => 'C-6',
                                    3 => 'C-7',
                                    4 => 'C-8',
                                    5 => 'C-9',
                                    6 => 'C-10',
                                ),
                            'line' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                        ),
                    'C-12' =>
                        array(
                            'tig' => 6,
                            'line' =>
                                array(
                                    'points' => 24,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 24,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 24,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                        ),
                    'C-13' =>
                        array(
                            'tig' => 9,
                            'line' =>
                                array(
                                    'points' => 32,
                                    'exam' =>
                                        array(
                                            0 => '0103',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 30,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 27,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                        ),
                    'C-14' =>
                        array(
                            'tig' => 12,
                            'line' =>
                                array(
                                    'points' => 40,
                                    'exam' =>
                                        array(
                                            0 => '0104',
                                            1 => '0113',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 36,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 32,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                        ),
                    'C-15' =>
                        array(
                            'tig' => 15,
                            'line' =>
                                array(
                                    'points' => 48,
                                    'exam' =>
                                        array(
                                            0 => '0105',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 44,
                                    'exam' =>
                                        array(
                                            0 => '0103',
                                        ),
                                ),
                        ),
                    'C-16' =>
                        array(
                            'tig' => 18,
                            'line' =>
                                array(
                                    'points' => 63,
                                    'exam' =>
                                        array(
                                            0 => '0106',
                                            1 => '0115',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 63,
                                    'exam' =>
                                        array(
                                            0 => '0104',
                                            1 => '0113',
                                        ),
                                ),
                        ),
                    'C-17' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 73,
                                    'exam' =>
                                        array(
                                            0 => '1001',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 73,
                                    'exam' =>
                                        array(
                                            0 => '0106',
                                        ),
                                ),
                        ),
                    'C-18' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 93,
                                    'exam' =>
                                        array(
                                            0 => '1002',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 93,
                                    'exam' =>
                                        array(
                                            0 => '1001',
                                        ),
                                ),
                        ),
                    'C-19' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 113,
                                    'exam' =>
                                        array(
                                            0 => '1003',
                                        ),
                                ),
                        ),
                    'C-20' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 133,
                                    'exam' =>
                                        array(
                                            0 => '1004',
                                        ),
                                ),
                        ),
                    'C-21' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 153,
                                    'exam' =>
                                        array(
                                            0 => '1005',
                                        ),
                                ),
                        ),
                    'C-22' =>
                        array(
                            'line' =>
                                array(
                                    'exam' =>
                                        array(
                                            0 => '1005',
                                        ),
                                ),
                        ),
                ),
                'updated_at' => '2025-06-29 17:17:01',
                'created_at' => '2019-08-12 00:30:36',
                'id' => '5d50b32c9c6b7f11984a422e',
            ],
            [
                'key' => 'pp.requirements.LORDS',
                'value' => array(
                    'C-2' =>
                        array(
                            'tig' => 2,
                            'line' =>
                                array(
                                    'points' => 3,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 3,
                                    'exam' =>
                                        array(),
                                ),
                            'service' =>
                                array(
                                    'points' => 3,
                                    'exam' =>
                                        array(),
                                ),
                        ),
                    'C-3' =>
                        array(
                            'tig' => 4,
                            'line' =>
                                array(
                                    'points' => 6,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 6,
                                    'exam' =>
                                        array(),
                                ),
                            'service' =>
                                array(
                                    'points' => 6,
                                    'exam' =>
                                        array(),
                                ),
                        ),
                    'C-4' =>
                        array(
                            'tig' => 5,
                            'line' =>
                                array(
                                    'points' => 9,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 9,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 9,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                        ),
                    'C-5' =>
                        array(
                            'tig' => 6,
                            'line' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 14,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 12,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                        ),
                    'C-6' =>
                        array(
                            'tig' => 7,
                            'line' =>
                                array(
                                    'points' => 36,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 26,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                        ),
                    'C-7' =>
                        array(
                            'tig' => 9,
                            'line' =>
                                array(
                                    'points' => 45,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 35,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 21,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                        ),
                    'C-8' =>
                        array(
                            'tig' => 12,
                            'line' =>
                                array(
                                    'points' => 54,
                                    'exam' =>
                                        array(
                                            0 => '(00)?04',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 42,
                                    'exam' =>
                                        array(
                                            0 => '(00)?04',
                                        ),
                                ),
                        ),
                    'C-9' =>
                        array(
                            'tig' => 15,
                            'line' =>
                                array(
                                    'points' => 63,
                                    'exam' =>
                                        array(
                                            0 => '0005',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 52,
                                    'exam' =>
                                        array(
                                            0 => '(00)?04',
                                        ),
                                ),
                        ),
                    'C-10' =>
                        array(
                            'tig' => 18,
                            'line' =>
                                array(
                                    'points' => 72,
                                    'exam' =>
                                        array(
                                            0 => '0006',
                                        ),
                                ),
                        ),
                    'C-11' =>
                        array(
                            'tig' => 4,
                            'as' =>
                                array(
                                    0 => 'C-4',
                                    1 => 'C-5',
                                    2 => 'C-6',
                                    3 => 'C-7',
                                    4 => 'C-8',
                                    5 => 'C-9',
                                    6 => 'C-10',
                                ),
                            'line' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                        ),
                    'C-12' =>
                        array(
                            'tig' => 6,
                            'line' =>
                                array(
                                    'points' => 24,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 24,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 24,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                        ),
                    'C-13' =>
                        array(
                            'tig' => 9,
                            'line' =>
                                array(
                                    'points' => 32,
                                    'exam' =>
                                        array(
                                            0 => '0103',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 30,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 27,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                        ),
                    'C-14' =>
                        array(
                            'tig' => 12,
                            'line' =>
                                array(
                                    'points' => 40,
                                    'exam' =>
                                        array(
                                            0 => '0104',
                                            1 => '0113',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 36,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 32,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                        ),
                    'C-15' =>
                        array(
                            'tig' => 15,
                            'line' =>
                                array(
                                    'points' => 48,
                                    'exam' =>
                                        array(
                                            0 => '0105',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 44,
                                    'exam' =>
                                        array(
                                            0 => '0103',
                                        ),
                                ),
                        ),
                    'C-16' =>
                        array(
                            'tig' => 18,
                            'line' =>
                                array(
                                    'points' => 63,
                                    'exam' =>
                                        array(
                                            0 => '0106',
                                            1 => '0115',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 63,
                                    'exam' =>
                                        array(
                                            0 => '0104',
                                            1 => '0113',
                                        ),
                                ),
                        ),
                    'C-17' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 73,
                                    'exam' =>
                                        array(
                                            0 => '1001',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 73,
                                    'exam' =>
                                        array(
                                            0 => '0106',
                                        ),
                                ),
                        ),
                    'C-18' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 93,
                                    'exam' =>
                                        array(
                                            0 => '1002',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 93,
                                    'exam' =>
                                        array(
                                            0 => '1001',
                                        ),
                                ),
                        ),
                    'C-19' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 113,
                                    'exam' =>
                                        array(
                                            0 => '1003',
                                        ),
                                ),
                        ),
                    'C-20' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 133,
                                    'exam' =>
                                        array(
                                            0 => '1004',
                                        ),
                                ),
                        ),
                    'C-21' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 153,
                                    'exam' =>
                                        array(
                                            0 => '1005',
                                        ),
                                ),
                        ),
                    'C-22' =>
                        array(
                            'line' =>
                                array(
                                    'exam' =>
                                        array(
                                            0 => '1005',
                                        ),
                                ),
                        ),
                ),
                'updated_at' => '2025-06-29 17:17:01',
                'created_at' => '2019-09-28 23:19:46',
                'id' => '5d8fea929c6b7f26e06e1d54',
            ],
            [
                'key' => 'pp.requirements.RMACS',
                'value' => array(
                    'C-2' =>
                        array(
                            'tig' => 2,
                            'line' =>
                                array(
                                    'points' => 3,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 3,
                                    'exam' =>
                                        array(),
                                ),
                            'service' =>
                                array(
                                    'points' => 3,
                                    'exam' =>
                                        array(),
                                ),
                        ),
                    'C-3' =>
                        array(
                            'tig' => 4,
                            'line' =>
                                array(
                                    'points' => 6,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 6,
                                    'exam' =>
                                        array(),
                                ),
                            'service' =>
                                array(
                                    'points' => 6,
                                    'exam' =>
                                        array(),
                                ),
                        ),
                    'C-4' =>
                        array(
                            'tig' => 5,
                            'line' =>
                                array(
                                    'points' => 9,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 9,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 9,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                        ),
                    'C-5' =>
                        array(
                            'tig' => 6,
                            'line' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 14,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 12,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                        ),
                    'C-6' =>
                        array(
                            'tig' => 7,
                            'line' =>
                                array(
                                    'points' => 36,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 26,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                        ),
                    'C-7' =>
                        array(
                            'tig' => 9,
                            'line' =>
                                array(
                                    'points' => 45,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 35,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 21,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                        ),
                    'C-8' =>
                        array(
                            'tig' => 12,
                            'line' =>
                                array(
                                    'points' => 54,
                                    'exam' =>
                                        array(
                                            0 => '(00)?04',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 42,
                                    'exam' =>
                                        array(
                                            0 => '(00)?04',
                                        ),
                                ),
                        ),
                    'C-9' =>
                        array(
                            'tig' => 15,
                            'line' =>
                                array(
                                    'points' => 63,
                                    'exam' =>
                                        array(
                                            0 => '0005',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 52,
                                    'exam' =>
                                        array(
                                            0 => '(00)?04',
                                        ),
                                ),
                        ),
                    'C-10' =>
                        array(
                            'tig' => 18,
                            'line' =>
                                array(
                                    'points' => 72,
                                    'exam' =>
                                        array(
                                            0 => '0006',
                                        ),
                                ),
                        ),
                    'C-11' =>
                        array(
                            'tig' => 4,
                            'as' =>
                                array(
                                    0 => 'C-4',
                                    1 => 'C-5',
                                    2 => 'C-6',
                                    3 => 'C-7',
                                    4 => 'C-8',
                                    5 => 'C-9',
                                    6 => 'C-10',
                                ),
                            'line' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                        ),
                    'C-12' =>
                        array(
                            'tig' => 6,
                            'line' =>
                                array(
                                    'points' => 24,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 24,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 24,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                        ),
                    'C-13' =>
                        array(
                            'tig' => 9,
                            'line' =>
                                array(
                                    'points' => 32,
                                    'exam' =>
                                        array(
                                            0 => '0103',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 30,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 27,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                        ),
                    'C-14' =>
                        array(
                            'tig' => 12,
                            'line' =>
                                array(
                                    'points' => 40,
                                    'exam' =>
                                        array(
                                            0 => '0104',
                                            1 => '0113',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 36,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 32,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                        ),
                    'C-15' =>
                        array(
                            'tig' => 15,
                            'line' =>
                                array(
                                    'points' => 48,
                                    'exam' =>
                                        array(
                                            0 => '0105',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 44,
                                    'exam' =>
                                        array(
                                            0 => '0103',
                                        ),
                                ),
                        ),
                    'C-16' =>
                        array(
                            'tig' => 18,
                            'line' =>
                                array(
                                    'points' => 63,
                                    'exam' =>
                                        array(
                                            0 => '0106',
                                            1 => '0115',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 63,
                                    'exam' =>
                                        array(
                                            0 => '0104',
                                            1 => '0113',
                                        ),
                                ),
                        ),
                    'C-17' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 73,
                                    'exam' =>
                                        array(
                                            0 => '1001',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 73,
                                    'exam' =>
                                        array(
                                            0 => '0106',
                                        ),
                                ),
                        ),
                    'C-18' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 93,
                                    'exam' =>
                                        array(
                                            0 => '1002',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 93,
                                    'exam' =>
                                        array(
                                            0 => '1001',
                                        ),
                                ),
                        ),
                    'C-19' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 113,
                                    'exam' =>
                                        array(
                                            0 => '1003',
                                        ),
                                ),
                        ),
                    'C-20' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 133,
                                    'exam' =>
                                        array(
                                            0 => '1004',
                                        ),
                                ),
                        ),
                    'C-21' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 153,
                                    'exam' =>
                                        array(
                                            0 => '1005',
                                        ),
                                ),
                        ),
                    'C-22' =>
                        array(
                            'line' =>
                                array(
                                    'exam' =>
                                        array(
                                            0 => '1005',
                                        ),
                                ),
                        ),
                ),
                'updated_at' => '2025-06-29 17:17:01',
                'created_at' => '2019-08-12 00:30:36',
                'id' => '5d50b32c9c6b7f11984a422a',
            ],
            [
                'key' => 'pp.requirements.RMMM',
                'value' => array(
                    'C-2' =>
                        array(
                            'tig' => 2,
                            'line' =>
                                array(
                                    'points' => 3,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 3,
                                    'exam' =>
                                        array(),
                                ),
                            'service' =>
                                array(
                                    'points' => 3,
                                    'exam' =>
                                        array(),
                                ),
                        ),
                    'C-3' =>
                        array(
                            'tig' => 4,
                            'line' =>
                                array(
                                    'points' => 6,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 6,
                                    'exam' =>
                                        array(),
                                ),
                            'service' =>
                                array(
                                    'points' => 6,
                                    'exam' =>
                                        array(),
                                ),
                        ),
                    'C-4' =>
                        array(
                            'tig' => 5,
                            'line' =>
                                array(
                                    'points' => 9,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 9,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 9,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                        ),
                    'C-5' =>
                        array(
                            'tig' => 6,
                            'line' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 14,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 12,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                        ),
                    'C-6' =>
                        array(
                            'tig' => 7,
                            'line' =>
                                array(
                                    'points' => 36,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 26,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                        ),
                    'C-7' =>
                        array(
                            'tig' => 9,
                            'line' =>
                                array(
                                    'points' => 45,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 35,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 21,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                        ),
                    'C-8' =>
                        array(
                            'tig' => 12,
                            'line' =>
                                array(
                                    'points' => 54,
                                    'exam' =>
                                        array(
                                            0 => '(00)?04',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 42,
                                    'exam' =>
                                        array(
                                            0 => '(00)?04',
                                        ),
                                ),
                        ),
                    'C-9' =>
                        array(
                            'tig' => 15,
                            'line' =>
                                array(
                                    'points' => 63,
                                    'exam' =>
                                        array(
                                            0 => '0005',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 52,
                                    'exam' =>
                                        array(
                                            0 => '(00)?04',
                                        ),
                                ),
                        ),
                    'C-10' =>
                        array(
                            'tig' => 18,
                            'line' =>
                                array(
                                    'points' => 72,
                                    'exam' =>
                                        array(
                                            0 => '0006',
                                        ),
                                ),
                        ),
                    'C-11' =>
                        array(
                            'tig' => 4,
                            'as' =>
                                array(
                                    0 => 'C-4',
                                    1 => 'C-5',
                                    2 => 'C-6',
                                    3 => 'C-7',
                                    4 => 'C-8',
                                    5 => 'C-9',
                                    6 => 'C-10',
                                ),
                            'line' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                        ),
                    'C-12' =>
                        array(
                            'tig' => 6,
                            'line' =>
                                array(
                                    'points' => 24,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 24,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 24,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                        ),
                    'C-13' =>
                        array(
                            'tig' => 9,
                            'line' =>
                                array(
                                    'points' => 32,
                                    'exam' =>
                                        array(
                                            0 => '0103',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 30,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 27,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                        ),
                    'C-14' =>
                        array(
                            'tig' => 12,
                            'line' =>
                                array(
                                    'points' => 40,
                                    'exam' =>
                                        array(
                                            0 => '0104',
                                            1 => '0113',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 36,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 32,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                        ),
                    'C-15' =>
                        array(
                            'tig' => 15,
                            'line' =>
                                array(
                                    'points' => 48,
                                    'exam' =>
                                        array(
                                            0 => '0105',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 44,
                                    'exam' =>
                                        array(
                                            0 => '0103',
                                        ),
                                ),
                        ),
                    'C-16' =>
                        array(
                            'tig' => 18,
                            'line' =>
                                array(
                                    'points' => 63,
                                    'exam' =>
                                        array(
                                            0 => '0106',
                                            1 => '0115',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 63,
                                    'exam' =>
                                        array(
                                            0 => '0104',
                                            1 => '0113',
                                        ),
                                ),
                        ),
                    'C-17' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 73,
                                    'exam' =>
                                        array(
                                            0 => '1001',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 73,
                                    'exam' =>
                                        array(
                                            0 => '0106',
                                        ),
                                ),
                        ),
                    'C-18' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 93,
                                    'exam' =>
                                        array(
                                            0 => '1002',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 93,
                                    'exam' =>
                                        array(
                                            0 => '1001',
                                        ),
                                ),
                        ),
                    'C-19' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 113,
                                    'exam' =>
                                        array(
                                            0 => '1003',
                                        ),
                                ),
                        ),
                    'C-20' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 133,
                                    'exam' =>
                                        array(
                                            0 => '1004',
                                        ),
                                ),
                        ),
                    'C-21' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 153,
                                    'exam' =>
                                        array(
                                            0 => '1005',
                                        ),
                                ),
                        ),
                    'C-22' =>
                        array(
                            'line' =>
                                array(
                                    'exam' =>
                                        array(
                                            0 => '1005',
                                        ),
                                ),
                        ),
                ),
                'updated_at' => '2025-06-29 17:17:01',
                'created_at' => '2019-08-12 00:30:36',
                'id' => '5d50b32c9c6b7f11984a422b',
            ],
            [
                'key' => 'pp.requirements.SFC',
                'value' => array(
                    'C-2' =>
                        array(
                            'tig' => 2,
                            'line' =>
                                array(
                                    'points' => 3,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 3,
                                    'exam' =>
                                        array(),
                                ),
                            'service' =>
                                array(
                                    'points' => 3,
                                    'exam' =>
                                        array(),
                                ),
                        ),
                    'C-3' =>
                        array(
                            'tig' => 4,
                            'line' =>
                                array(
                                    'points' => 6,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 6,
                                    'exam' =>
                                        array(),
                                ),
                            'service' =>
                                array(
                                    'points' => 6,
                                    'exam' =>
                                        array(),
                                ),
                        ),
                    'C-4' =>
                        array(
                            'tig' => 5,
                            'line' =>
                                array(
                                    'points' => 9,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 9,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 9,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                        ),
                    'C-5' =>
                        array(
                            'tig' => 6,
                            'line' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 14,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 12,
                                    'exam' =>
                                        array(
                                            0 => '(00)?01',
                                        ),
                                ),
                        ),
                    'C-6' =>
                        array(
                            'tig' => 7,
                            'line' =>
                                array(
                                    'points' => 36,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 26,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                        ),
                    'C-7' =>
                        array(
                            'tig' => 9,
                            'line' =>
                                array(
                                    'points' => 45,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 35,
                                    'exam' =>
                                        array(
                                            0 => '(00)?03',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 21,
                                    'exam' =>
                                        array(
                                            0 => '(00)?02',
                                        ),
                                ),
                        ),
                    'C-8' =>
                        array(
                            'tig' => 12,
                            'line' =>
                                array(
                                    'points' => 54,
                                    'exam' =>
                                        array(
                                            0 => '(00)?04',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 42,
                                    'exam' =>
                                        array(
                                            0 => '(00)?04',
                                        ),
                                ),
                        ),
                    'C-9' =>
                        array(
                            'tig' => 15,
                            'line' =>
                                array(
                                    'points' => 63,
                                    'exam' =>
                                        array(
                                            0 => '0005',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 52,
                                    'exam' =>
                                        array(
                                            0 => '(00)?04',
                                        ),
                                ),
                        ),
                    'C-10' =>
                        array(
                            'tig' => 18,
                            'line' =>
                                array(
                                    'points' => 72,
                                    'exam' =>
                                        array(
                                            0 => '0006',
                                        ),
                                ),
                        ),
                    'C-11' =>
                        array(
                            'tig' => 4,
                            'as' =>
                                array(
                                    0 => 'C-4',
                                    1 => 'C-5',
                                    2 => 'C-6',
                                    3 => 'C-7',
                                    4 => 'C-8',
                                    5 => 'C-9',
                                    6 => 'C-10',
                                ),
                            'line' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 18,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                        ),
                    'C-12' =>
                        array(
                            'tig' => 6,
                            'line' =>
                                array(
                                    'points' => 24,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 24,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 24,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                        ),
                    'C-13' =>
                        array(
                            'tig' => 9,
                            'line' =>
                                array(
                                    'points' => 32,
                                    'exam' =>
                                        array(
                                            0 => '0103',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 30,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 27,
                                    'exam' =>
                                        array(
                                            0 => '0101',
                                        ),
                                ),
                        ),
                    'C-14' =>
                        array(
                            'tig' => 12,
                            'line' =>
                                array(
                                    'points' => 40,
                                    'exam' =>
                                        array(
                                            0 => '0104',
                                            1 => '0113',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 36,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                            'service' =>
                                array(
                                    'points' => 32,
                                    'exam' =>
                                        array(
                                            0 => '0102',
                                        ),
                                ),
                        ),
                    'C-15' =>
                        array(
                            'tig' => 15,
                            'line' =>
                                array(
                                    'points' => 48,
                                    'exam' =>
                                        array(
                                            0 => '0105',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 44,
                                    'exam' =>
                                        array(
                                            0 => '0103',
                                        ),
                                ),
                        ),
                    'C-16' =>
                        array(
                            'tig' => 18,
                            'line' =>
                                array(
                                    'points' => 63,
                                    'exam' =>
                                        array(
                                            0 => '0106',
                                            1 => '0115',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 63,
                                    'exam' =>
                                        array(
                                            0 => '0104',
                                            1 => '0113',
                                        ),
                                ),
                        ),
                    'C-17' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 73,
                                    'exam' =>
                                        array(
                                            0 => '1001',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 73,
                                    'exam' =>
                                        array(
                                            0 => '0106',
                                        ),
                                ),
                        ),
                    'C-18' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 93,
                                    'exam' =>
                                        array(
                                            0 => '1002',
                                        ),
                                ),
                            'staff' =>
                                array(
                                    'points' => 93,
                                    'exam' =>
                                        array(
                                            0 => '1001',
                                        ),
                                ),
                        ),
                    'C-19' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 113,
                                    'exam' =>
                                        array(
                                            0 => '1003',
                                        ),
                                ),
                        ),
                    'C-20' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 133,
                                    'exam' =>
                                        array(
                                            0 => '1004',
                                        ),
                                ),
                        ),
                    'C-21' =>
                        array(
                            'line' =>
                                array(
                                    'points' => 153,
                                    'exam' =>
                                        array(
                                            0 => '1005',
                                        ),
                                ),
                        ),
                    'C-22' =>
                        array(
                            'line' =>
                                array(
                                    'exam' =>
                                        array(
                                            0 => '1005',
                                        ),
                                ),
                        ),
                ),
                'updated_at' => '2025-06-29 17:17:01',
                'created_at' => '2019-08-12 00:30:36',
                'id' => '5d50b32c9c6b7f11984a422c',
            ],
            [
                'key' => 'promotions.enlisted',
                'value' => '<p>The Enlisted Promotions Board convenes for Enlisted Promotions for Senior Chief Petty Officer (E-8), Master Chief Petty Officer (E-9) and Senior Master Chief Petty Officer (E-10). A Commanding Officer may issue a Brevet Promotion to Chief Petty Officer (E-7) but it may be audited by this Promotions Board at its next sitting if questions arise. The Enlisted Promotions Board will meet every other Month starting in February.</p>',
                'updated_at' => '2018-05-28 18:35:30',
                'created_at' => '2018-05-28 18:35:30',
                'id' => '5b0c4bf2cbe77603d215d99e',
            ],
            [
                'key' => 'promotions.flag',
                'value' => '<p>A Flag Promotions Board shall be convened for every Flag Promotion of Rear Admiral (F-2) and higher. The Flag Officer Promotions Board will meet every other Quarter starting with April.</p>',
                'updated_at' => '2018-05-28 18:35:30',
                'created_at' => '2018-05-28 18:35:30',
                'id' => '5b0c4bf2cbe77603d215d9a1',
            ],
            [
                'key' => 'promotions.instructions',
                'value' => '<p>This page will show all eligible promotions for CHAPTER as well as
                any children/subordinate chapters. Up to five tables will be shown, and a member
                could appear in more than one. The four possible tables are:</p>
            <ul>
                <li>Eligible for Early Promotion</li>
                <li>Eligible for Promotion</li>
                <li>Eligible for Merit Promotion</li>
                <li>Recommend for Warrant</li>
                <li>Eligible for Promotion Board</li>
            </ul>
            <p>The first two should be self explanatory. A member will only show up in one of these tables if they are
                eligible to be promoted by you, To select a member for promotion, just click the checkbox to the
                left of their name. If you wish to select all of them, just click the checkbox in the header next to
                "All". If you change your mind, if you click the checkbox in the header again, they will all be
                unselected. The other two tables.</p>
             <p><strong>Eligible for Merit Promotion</strong> are NCO\'s that qualify for a merit promotion to O-1 based
             on Time in Grade, promotion points and exams. <strong>Recommend for Warrant</strong> and <strong>Eligible for
                    Promotion Board</strong> are informational. They are there to quickly show you which of your members
                should be sent to a promotion board or that you can recommend to the First Lord of the Admiralty for a
                Warrant.
            </p>',
                'updated_at' => '2018-05-28 18:35:30',
                'created_at' => '2018-05-28 18:35:30',
                'id' => '5b0c4bf2cbe77603d215d99d',
            ],
            [
                'key' => 'promotions.officer',
                'value' => '<p>The Officer One Promotions Board convenes for all Promotions for Lieutenant Senior Grade (O-3) and Lieutenant Commanders (O-4). The Officer One Promotions Board will meet every other Month starting in February.</p>
<p>The Officer Two Promotions Board convenes for all Promotions for Commander (O-5) and Captain Junior Grade (O-6a). The Officer Two Promotions Board will meet every other Month starting in January.</p>',
                'updated_at' => '2019-03-26 00:26:57',
                'created_at' => '2018-05-28 18:35:30',
                'id' => '5b0c4bf2cbe77603d215d9a0',
            ],
            [
                'key' => 'promotions.warrant',
                'value' => '<p>The Warrant Promotions Board convenes for all Warrant Officer Promotions. It does not issue original Warrants. Those are issued by the First Lord of the Admiralty. The Warrant Promotions Board will meet the first month of every Quarter starting with January.</p>',
                'updated_at' => '2018-05-28 18:35:30',
                'created_at' => '2018-05-28 18:35:30',
                'id' => '5b0c4bf2cbe77603d215d99f',
            ],
            [
                'key' => 'rank.equiv',
                'value' => array(
                    1 =>
                        array(
                            'RMN' => 'E-1',
                            'GSN' => 'E-1',
                            'IAN' => 'E-1',
                            'RHN' => 'E-1',
                            'RMMC' => 'E-1',
                            'RMA' => 'E-1',
                            'DIPLOMATIC' => 'C-1',
                            'INTEL' => 'C-1',
                            'SFC' => 'C-1',
                            'RMACS' => 'C-1',
                            'RMMM' => 'C-1',
                            'DECK' => 'NA',
                            'ENG' => 'NA',
                            'CATERING' => 'NA',
                            'MEDICAL' => 'NA',
                        ),
                    2 =>
                        array(
                            'RMN' => 'E-2',
                            'GSN' => 'E-2',
                            'IAN' => 'E-2',
                            'RHN' => 'E-2',
                            'RMMC' => 'E-2',
                            'RMA' => 'E-2',
                            'DIPLOMATIC' => 'C-2',
                            'INTEL' => 'C-2',
                            'SFC' => 'C-2',
                            'RMACS' => 'C-1',
                            'RMMM' => 'C-2',
                            'DECK' => 'C-2',
                            'ENG' => 'C-2',
                            'CATERING' => 'C-2',
                            'MEDICAL' => 'NA',
                        ),
                    3 =>
                        array(
                            'RMN' => 'E-3',
                            'GSN' => 'E-3',
                            'IAN' => 'E-3',
                            'RHN' => 'E-3',
                            'RMMC' => 'E-3',
                            'RMA' => 'E-3',
                            'DIPLOMATIC' => 'C-3',
                            'INTEL' => 'C-3',
                            'SFC' => 'C-3',
                            'RMACS' => 'C-1',
                            'RMMM' => 'C-3',
                            'DECK' => 'C-3',
                            'ENG' => 'C-3',
                            'CATERING' => 'C-3',
                            'MEDICAL' => 'NA',
                        ),
                    4 =>
                        array(
                            'RMN' => 'E-4',
                            'GSN' => 'E-4',
                            'IAN' => 'E-4',
                            'RHN' => 'E-4',
                            'RMMC' => 'E-4',
                            'RMA' => 'E-4',
                            'DIPLOMATIC' => 'C-4',
                            'INTEL' => 'C-4',
                            'SFC' => 'NA',
                            'RMACS' => 'C-4',
                            'RMMM' => 'C-3',
                            'DECK' => 'C-3',
                            'ENG' => 'C-3',
                            'CATERING' => 'C-3',
                            'MEDICAL' => 'NA',
                        ),
                    5 =>
                        array(
                            'RMN' => 'E-5',
                            'GSN' => 'E-5',
                            'IAN' => 'E-5',
                            'RHN' => 'E-5',
                            'RMMC' => 'E-5',
                            'RMA' => 'E-5',
                            'DIPLOMATIC' => 'C-5',
                            'INTEL' => 'C-5',
                            'SFC' => 'NA',
                            'RMACS' => 'C-5',
                            'RMMM' => 'C-3',
                            'DECK' => 'C-3',
                            'ENG' => 'C-3',
                            'CATERING' => 'C-3',
                            'MEDICAL' => 'NA',
                        ),
                    6 =>
                        array(
                            'RMN' => 'E-6',
                            'GSN' => 'E-6',
                            'IAN' => 'E-6',
                            'RHN' => 'E-6',
                            'RMMC' => 'E-6',
                            'RMA' => 'E-6',
                            'DIPLOMATIC' => 'C-6',
                            'INTEL' => 'C-6',
                            'SFC' => 'C-6',
                            'RMACS' => 'C-6',
                            'RMMM' => 'C-6',
                            'DECK' => 'C-6',
                            'ENG' => 'C-6',
                            'CATERING' => 'C-6',
                            'MEDICAL' => 'C-6',
                        ),
                    7 =>
                        array(
                            'RMN' => 'E-7',
                            'GSN' => 'E-7',
                            'IAN' => 'E-7',
                            'RHN' => 'E-7',
                            'RMMC' => 'E-7',
                            'RMA' => 'E-7',
                            'DIPLOMATIC' => 'C-7',
                            'INTEL' => 'C-7',
                            'SFC' => 'C-7',
                            'RMACS' => 'C-7',
                            'RMMM' => 'C-7',
                            'DECK' => 'C-7',
                            'ENG' => 'C-7',
                            'CATERING' => 'C-7',
                            'MEDICAL' => 'C-6',
                        ),
                    8 =>
                        array(
                            'RMN' => 'E-8',
                            'GSN' => 'E-8',
                            'IAN' => 'E-8',
                            'RHN' => 'E-8',
                            'RMMC' => 'E-8',
                            'RMA' => 'E-8',
                            'DIPLOMATIC' => 'C-8',
                            'INTEL' => 'C-8',
                            'SFC' => 'C-7',
                            'RMACS' => 'C-8',
                            'RMMM' => 'C-8',
                            'DECK' => 'C-8',
                            'ENG' => 'C-8',
                            'CATERING' => 'C-8',
                            'MEDICAL' => 'C-8',
                        ),
                    9 =>
                        array(
                            'RMN' => 'E-9',
                            'GSN' => 'E-9',
                            'IAN' => 'E-9',
                            'RHN' => 'E-9',
                            'RMMC' => 'E-9',
                            'RMA' => 'E-9',
                            'DIPLOMATIC' => 'C-9',
                            'INTEL' => 'C-9',
                            'SFC' => 'C-9',
                            'RMACS' => 'C-9',
                            'RMMM' => 'C-8',
                            'DECK' => 'C-8',
                            'ENG' => 'C-8',
                            'CATERING' => 'C-8',
                            'MEDICAL' => 'C-8',
                        ),
                    10 =>
                        array(
                            'RMN' => 'E-10',
                            'GSN' => 'E-10',
                            'IAN' => 'E-10',
                            'RHN' => 'E-10',
                            'RMMC' => 'E-10',
                            'RMA' => 'E-10',
                            'DIPLOMATIC' => 'C-10',
                            'INTEL' => 'C-10',
                            'SFC' => 'C-10',
                            'RMACS' => 'C-9',
                            'RMMM' => 'C-8',
                            'DECK' => 'C-8',
                            'ENG' => 'C-8',
                            'CATERING' => 'C-8',
                            'MEDICAL' => 'C-8',
                        ),
                    11 =>
                        array(
                            'RMN' => 'E-10',
                            'GSN' => 'E-10',
                            'IAN' => 'E-10',
                            'RHN' => 'E-10',
                            'RMMC' => 'E-10',
                            'RMA' => 'E-11',
                            'DIPLOMATIC' => 'C-10',
                            'INTEL' => 'C-10',
                            'SFC' => 'C-10',
                            'RMACS' => 'C-9',
                            'RMMM' => 'C-8',
                            'DECK' => 'C-8',
                            'ENG' => 'C-8',
                            'CATERING' => 'C-8',
                            'MEDICAL' => 'C-8',
                        ),
                    12 =>
                        array(
                            'RMN' => 'E-10',
                            'GSN' => 'E-10',
                            'IAN' => 'E-10',
                            'RHN' => 'E-10',
                            'RMMC' => 'E-10',
                            'RMA' => 'E-12',
                            'DIPLOMATIC' => 'C-10',
                            'INTEL' => 'C-10',
                            'SFC' => 'C-10',
                            'RMACS' => 'C-9',
                            'RMMM' => 'C-8',
                            'DECK' => 'C-8',
                            'ENG' => 'C-8',
                            'CATERING' => 'C-8',
                            'MEDICAL' => 'C-8',
                        ),
                    13 =>
                        array(
                            'RMN' => 'WO-1',
                            'GSN' => 'WO-1',
                            'IAN' => 'WO-1',
                            'RHN' => 'WO-1',
                            'RMMC' => 'WO-1',
                            'RMA' => 'WO-1',
                            'DIPLOMATIC' => 'C-10',
                            'INTEL' => 'C-10',
                            'SFC' => 'C-10',
                            'RMACS' => 'C-9',
                            'RMMM' => 'C-8',
                            'DECK' => 'C-8',
                            'ENG' => 'C-8',
                            'CATERING' => 'C-8',
                            'MEDICAL' => 'C-8',
                        ),
                    14 =>
                        array(
                            'RMN' => 'WO-2',
                            'GSN' => 'WO-2',
                            'IAN' => 'WO-2',
                            'RHN' => 'WO-2',
                            'RMMC' => 'WO-2',
                            'RMA' => 'WO-2',
                            'DIPLOMATIC' => 'C-10',
                            'INTEL' => 'C-10',
                            'SFC' => 'C-10',
                            'RMACS' => 'C-9',
                            'RMMM' => 'C-8',
                            'DECK' => 'C-8',
                            'ENG' => 'C-8',
                            'CATERING' => 'C-8',
                            'MEDICAL' => 'C-8',
                        ),
                    15 =>
                        array(
                            'RMN' => 'WO-3',
                            'GSN' => 'WO-3',
                            'IAN' => 'WO-3',
                            'RHN' => 'WO-3',
                            'RMMC' => 'WO-3',
                            'RMA' => 'WO-3',
                            'DIPLOMATIC' => 'C-11',
                            'INTEL' => 'C-11',
                            'SFC' => 'C-10',
                            'RMACS' => 'C-9',
                            'RMMM' => 'C-8',
                            'DECK' => 'C-8',
                            'ENG' => 'C-8',
                            'CATERING' => 'C-8',
                            'MEDICAL' => 'C-8',
                        ),
                    16 =>
                        array(
                            'RMN' => 'WO-4',
                            'GSN' => 'WO-4',
                            'IAN' => 'WO-4',
                            'RHN' => 'WO-4',
                            'RMMC' => 'WO-4',
                            'RMA' => 'WO-4',
                            'DIPLOMATIC' => 'C-11',
                            'INTEL' => 'C-11',
                            'SFC' => 'C-10',
                            'RMACS' => 'C-9',
                            'RMMM' => 'C-8',
                            'DECK' => 'C-8',
                            'ENG' => 'C-8',
                            'CATERING' => 'C-8',
                            'MEDICAL' => 'C-8',
                        ),
                    17 =>
                        array(
                            'RMN' => 'WO-5',
                            'GSN' => 'WO-5',
                            'IAN' => 'WO-5',
                            'RHN' => 'WO-5',
                            'RMMC' => 'WO-5',
                            'RMA' => 'WO-5',
                            'DIPLOMATIC' => 'C-11',
                            'INTEL' => 'C-11',
                            'SFC' => 'C-10',
                            'RMACS' => 'C-9',
                            'RMMM' => 'C-8',
                            'DECK' => 'C-8',
                            'ENG' => 'C-8',
                            'CATERING' => 'C-8',
                            'MEDICAL' => 'C-8',
                        ),
                    18 =>
                        array(
                            'RMN' => 'O-1',
                            'GSN' => 'O-1',
                            'IAN' => 'O-1',
                            'RHN' => 'O-1',
                            'RMMC' => 'O-1',
                            'RMA' => 'O-1',
                            'DIPLOMATIC' => 'C-12',
                            'INTEL' => 'C-12',
                            'SFC' => 'C-10',
                            'RMACS' => 'C-12',
                            'RMMM' => 'C-12',
                            'DECK' => 'C-12',
                            'ENG' => 'C-12',
                            'CATERING' => 'C-12',
                            'MEDICAL' => 'C-12',
                        ),
                    19 =>
                        array(
                            'RMN' => 'O-2',
                            'GSN' => 'O-2',
                            'IAN' => 'O-2',
                            'RHN' => 'O-2',
                            'RMMC' => 'O-2',
                            'RMA' => 'O-2',
                            'DIPLOMATIC' => 'C-13',
                            'INTEL' => 'C-13',
                            'SFC' => 'C-13',
                            'RMACS' => 'C-13',
                            'RMMM' => 'C-12',
                            'DECK' => 'C-13',
                            'ENG' => 'C-13',
                            'CATERING' => 'C-13',
                            'MEDICAL' => 'C-13',
                        ),
                    20 =>
                        array(
                            'RMN' => 'O-3',
                            'GSN' => 'O-3',
                            'IAN' => 'O-3',
                            'RHN' => 'O-3',
                            'RMMC' => 'O-3',
                            'RMA' => 'O-3',
                            'DIPLOMATIC' => 'C-14',
                            'INTEL' => 'C-14',
                            'SFC' => 'C-14',
                            'RMACS' => 'C-14',
                            'RMMM' => 'C-12',
                            'DECK' => 'C-13',
                            'ENG' => 'C-13',
                            'CATERING' => 'C-13',
                            'MEDICAL' => 'C-13',
                        ),
                    21 =>
                        array(
                            'RMN' => 'O-4',
                            'GSN' => 'O-4',
                            'IAN' => 'O-4',
                            'RHN' => 'O-4',
                            'RMMC' => 'O-4',
                            'RMA' => 'O-4',
                            'DIPLOMATIC' => 'C-15',
                            'INTEL' => 'C-15',
                            'SFC' => 'C-15',
                            'RMACS' => 'C-15',
                            'RMMM' => 'C-12',
                            'DECK' => 'C-15',
                            'ENG' => 'C-15',
                            'CATERING' => 'C-15',
                            'MEDICAL' => 'C-15',
                        ),
                    22 =>
                        array(
                            'RMN' => 'O-5',
                            'GSN' => 'O-5',
                            'IAN' => 'O-5',
                            'RHN' => 'O-5',
                            'RMMC' => 'O-5',
                            'RMA' => 'O-5',
                            'DIPLOMATIC' => 'C-16',
                            'INTEL' => 'C-16',
                            'SFC' => 'C-16',
                            'RMACS' => 'C-16',
                            'RMMM' => 'C-12',
                            'DECK' => 'C-16',
                            'ENG' => 'C-16',
                            'CATERING' => 'C-16',
                            'MEDICAL' => 'C-16',
                        ),
                    23 =>
                        array(
                            'RMN' => 'O-6-A',
                            'GSN' => 'O-6',
                            'IAN' => 'O-6',
                            'RHN' => 'O-6',
                            'RMMC' => 'O-6',
                            'RMA' => 'O-6',
                            'DIPLOMATIC' => 'C-17',
                            'INTEL' => 'C-17',
                            'SFC' => 'C-17',
                            'RMACS' => 'C-17',
                            'RMMM' => 'C-12',
                            'DECK' => 'C-17',
                            'ENG' => 'C-17',
                            'CATERING' => 'C-16',
                            'MEDICAL' => 'C-16',
                        ),
                    24 =>
                        array(
                            'RMN' => 'O-6-B',
                            'GSN' => 'O-6',
                            'IAN' => 'O-6',
                            'RHN' => 'O-6',
                            'RMMC' => 'O-6',
                            'RMA' => 'O-6',
                            'DIPLOMATIC' => 'C-17',
                            'INTEL' => 'C-17',
                            'SFC' => 'C-17',
                            'RMACS' => 'C-17',
                            'RMMM' => 'C-12',
                            'DECK' => 'C-17',
                            'ENG' => 'C-17',
                            'CATERING' => 'C-16',
                            'MEDICAL' => 'C-16',
                        ),
                    25 =>
                        array(
                            'RMN' => 'F-1',
                            'GSN' => 'F-1',
                            'IAN' => 'F-1',
                            'RHN' => 'F-1',
                            'RMMC' => 'F-1',
                            'RMA' => 'F-1',
                            'DIPLOMATIC' => 'C-18',
                            'INTEL' => 'C-18',
                            'SFC' => 'C-18',
                            'RMACS' => 'C-18',
                            'RMMM' => 'C-12',
                            'DECK' => 'C-18',
                            'ENG' => 'C-18',
                            'CATERING' => 'C-18',
                            'MEDICAL' => 'C-18',
                        ),
                    26 =>
                        array(
                            'RMN' => 'F-2-A',
                            'GSN' => 'F-2',
                            'IAN' => 'F-2',
                            'RHN' => 'F-2',
                            'RMMC' => 'F-2',
                            'RMA' => 'F-2',
                            'DIPLOMATIC' => 'C-19',
                            'INTEL' => 'C-19',
                            'SFC' => 'C-19',
                            'RMACS' => 'C-19',
                            'RMMM' => 'C-12',
                            'DECK' => 'C-19',
                            'ENG' => 'C-19',
                            'CATERING' => 'C-19',
                            'MEDICAL' => 'C-19',
                        ),
                    27 =>
                        array(
                            'RMN' => 'F-2-B',
                            'GSN' => 'F-2',
                            'IAN' => 'F-2',
                            'RHN' => 'F-2',
                            'RMMC' => 'F-2',
                            'RMA' => 'F-2',
                            'DIPLOMATIC' => 'C-19',
                            'INTEL' => 'C-19',
                            'SFC' => 'C-19',
                            'RMACS' => 'C-19',
                            'RMMM' => 'C-12',
                            'DECK' => 'C-19',
                            'ENG' => 'C-19',
                            'CATERING' => 'C-19',
                            'MEDICAL' => 'C-19',
                        ),
                    28 =>
                        array(
                            'RMN' => 'F-3-A',
                            'GSN' => 'F-3',
                            'IAN' => 'F-3',
                            'RHN' => 'F-3',
                            'RMMC' => 'F-3',
                            'RMA' => 'F-3',
                            'DIPLOMATIC' => 'C-20',
                            'INTEL' => 'C-20',
                            'SFC' => 'C-20',
                            'RMACS' => 'C-20',
                            'RMMM' => 'C-12',
                            'DECK' => 'C-20',
                            'ENG' => 'C-20',
                            'CATERING' => 'C-20',
                            'MEDICAL' => 'C-20',
                        ),
                    29 =>
                        array(
                            'RMN' => 'F-3-B',
                            'GSN' => 'F-3',
                            'IAN' => 'F-3',
                            'RHN' => 'F-3',
                            'RMMC' => 'F-3',
                            'RMA' => 'F-3',
                            'DIPLOMATIC' => 'C-20',
                            'INTEL' => 'C-20',
                            'SFC' => 'C-20',
                            'RMACS' => 'C-20',
                            'RMMM' => 'C-12',
                            'DECK' => 'C-20',
                            'ENG' => 'C-20',
                            'CATERING' => 'C-20',
                            'MEDICAL' => 'C-20',
                        ),
                    30 =>
                        array(
                            'RMN' => 'F-4-A',
                            'GSN' => 'F-4',
                            'IAN' => 'F-4',
                            'RHN' => 'F-4',
                            'RMMC' => 'F-4',
                            'RMA' => 'F-4',
                            'DIPLOMATIC' => 'C-21',
                            'INTEL' => 'C-21',
                            'SFC' => 'C-21',
                            'RMACS' => 'C-21',
                            'RMMM' => 'C-12',
                            'DECK' => 'C-21',
                            'ENG' => 'C-21',
                            'CATERING' => 'C-21',
                            'MEDICAL' => 'C-21',
                        ),
                    31 =>
                        array(
                            'RMN' => 'F-4-B',
                            'GSN' => 'F-4',
                            'IAN' => 'F-4',
                            'RHN' => 'F-4',
                            'RMMC' => 'F-4',
                            'RMA' => 'F-4',
                            'DIPLOMATIC' => 'C-21',
                            'INTEL' => 'C-21',
                            'SFC' => 'C-21',
                            'RMACS' => 'C-21',
                            'RMMM' => 'C-12',
                            'DECK' => 'C-21',
                            'ENG' => 'C-21',
                            'CATERING' => 'C-21',
                            'MEDICAL' => 'C-21',
                        ),
                    32 =>
                        array(
                            'RMN' => 'F-5-A',
                            'GSN' => 'F-5',
                            'IAN' => 'F-5',
                            'RHN' => 'F-5',
                            'RMMC' => 'F-5',
                            'RMA' => 'F-5',
                            'DIPLOMATIC' => 'C-22',
                            'INTEL' => 'C-22',
                            'SFC' => 'C-22',
                            'RMACS' => 'C-22',
                            'RMMM' => 'C-12',
                            'DECK' => 'C-22',
                            'ENG' => 'C-22',
                            'CATERING' => 'C-22',
                            'MEDICAL' => 'C-22',
                        ),
                    33 =>
                        array(
                            'RMN' => 'F-5-B',
                            'GSN' => 'F-5',
                            'IAN' => 'F-5',
                            'RHN' => 'F-5',
                            'RMMC' => 'F-5',
                            'RMA' => 'F-5',
                            'DIPLOMATIC' => 'C-22',
                            'INTEL' => 'C-22',
                            'SFC' => 'C-22',
                            'RMACS' => 'C-22',
                            'RMMM' => 'C-12',
                            'DECK' => 'C-22',
                            'ENG' => 'C-22',
                            'CATERING' => 'C-22',
                            'MEDICAL' => 'C-22',
                        ),
                    34 =>
                        array(
                            'RMN' => 'F-6',
                            'GSN' => 'F-6',
                            'IAN' => 'F-6',
                            'RHN' => 'F-5',
                            'RMMC' => 'F-6',
                            'RMA' => 'F-6',
                            'DIPLOMATIC' => 'C-23',
                            'INTEL' => 'C-23',
                            'SFC' => 'C-23',
                            'RMACS' => 'C-23',
                            'RMMM' => 'C-12',
                            'DECK' => 'C-23',
                            'ENG' => 'C-23',
                            'CATERING' => 'C-23',
                            'MEDICAL' => 'C-23',
                        ),
                ),
                'updated_at' => '2019-08-12 00:30:36',
                'created_at' => '2019-08-12 00:30:36',
                'id' => '5d50b32c9c6b7f11984a4234',
            ],
            [
                'key' => 'report.recipients',
                'value' => array(
                    0 => 'cno@trmn.org',
                    1 => 'buplan@trmn.org',
                    2 => 'buships@trmn.org',
                    3 => 'bupers@trmn.org',
                    4 => 'homesecretary@trmn.org',
                    5 => 'cno@rhn.trmn.org',
                    6 => 'dcno@rhn.trmn.org',
                    7 => 'sma@ian.trmn.org',
                    8 => 'dr.westover@gmail.com',
                    9 => 'highadm@gsn.trmn.org',
                    10 => 'bucomm@trmn.org',
                    11 => 'chapter.reports@trmn.org',
                ),
                'updated_at' => '2025-08-05 02:26:08',
                'created_at' => '2019-08-12 00:30:36',
                'id' => '5d50b32c9c6b7f11984a4232',
            ],
            [
                'key' => 'report.valid_types',
                'value' => array(
                    0 => 'ship',
                    1 => 'station',
                    2 => 'small_craft',
                    3 => 'lac',
                    4 => 'jstation',
                    5 => 'jfort',
                    6 => 'tug',
                ),
                'updated_at' => '2020-03-28 18:56:21',
                'created_at' => '2017-08-03 20:11:05',
                'id' => '59838359c0b51f79df721e60',
            ],
            [
                'key' => 'rr.instructions',
                'value' => '<p>Currently, the Ribbon Rack Builder supports RMN/RMMC and a few RMA ribbons & badges. As the artwork becomes
            available, they will be added. You many notice that some ribbons or badges don\'t have any artwork
            shown. These items were added to allow the selection of them for promotion point calculations, they will be
            saved to your record, but currently won\'t show up in your ribbon rack. Once the artwork is available they
            willautomatically show up in your ribbon rack.
        </p>

        <p>Once you save your ribbon rack, it will be record in your MEDUSA record and displayed on your Service Record.
            There will be a link under your ribbon rack that will show you the HTML required to embed your ribbon rack
            in another website.</p>

        <p>Please select your awards from the list below, then click "Save". If an award can be awarded more than once,
            you will be able to select the number of times you have received the award.</p>',
                'updated_at' => '2019-08-12 00:30:36',
                'created_at' => '2019-08-12 00:30:36',
                'id' => '5d50b32c9c6b7f11984a4227',
            ],
            [
                'key' => 'show.events',
                'value' => true,
                'updated_at' => '2016-10-22 04:07:02',
                'created_at' => '2016-10-22 04:07:02',
                'id' => '580ae5e6e4bed83a328b4593',
            ],
            [
                'key' => 'starnations',
                'value' => array(
                    'manticore' => 'Star Empire of Manticore',
                    'grayson' => 'Protectorate of Grayson',
                    'andermani' => 'Andermani Empire',
                    'haven' => 'Republic of Haven',
                ),
                'updated_at' => '2019-03-26 00:25:13',
                'created_at' => '2018-05-28 18:35:30',
                'id' => '5b0c4bf2cbe77603d215d992',
            ],
        ]);
    }
}
