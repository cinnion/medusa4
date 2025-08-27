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
                            'call' => 'App\\Chapter::getHoldingChapters',
                        ),
                    1 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Fleet Holding Chapters',
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'fstation',
                        ),
                    2 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Headquarters',
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'headquarters',
                        ),
                    3 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Bureaus',
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'bureau',
                        ),
                    4 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Offices',
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'office',
                        ),
                    5 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Academies',
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'academy',
                        ),
                    6 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Institutes',
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'institute',
                        ),
                    7 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Universities',
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'university',
                        ),
                    8 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'University Systems',
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'university_system',
                        ),
                    9 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Colleges',
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'college',
                        ),
                    10 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Training Centers',
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'center',
                        ),
                    11 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Fleets',
                            'url' => '/api/fleet',
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'fleet',
                        ),
                    12 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Task Forces',
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'task_force',
                        ),
                    13 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Task Groups',
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'task_group',
                        ),
                    14 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Squadrons',
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'squadron',
                        ),
                    15 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Marine Expeditionary Forces ',
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'exp_force',
                        ),
                    16 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Divisions',
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'division',
                        ),
                    17 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Separation Units',
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'SU',
                        ),
                    18 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Keeps',
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'keep',
                        ),
                    19 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Baronies',
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'barony',
                        ),
                    20 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Counties',
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'county',
                        ),
                    21 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Duchy',
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'duchy',
                        ),
                    22 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Steadings',
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'steadings',
                        ),
                    23 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Grand Duchy',
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'grand_duchy',
                        ),
                    24 =>
                        array(
                            'unjoinable' => false,
                            'label' => 'RMN',
                            'call' => 'App\\Chapter::getChapters',
                            'args' => 'RMN',
                        ),
                    25 =>
                        array(
                            'unjoinable' => false,
                            'label' => 'RMMC',
                            'call' => 'App\\Chapter::getChapters',
                            'args' => 'RMMC',
                        ),
                    26 =>
                        array(
                            'unjoinable' => false,
                            'label' => 'RMA',
                            'call' => 'App\\Chapter::getChapters',
                            'args' => 'RMA',
                        ),
                    27 =>
                        array(
                            'unjoinable' => false,
                            'label' => 'GSN',
                            'call' => 'App\\Chapter::getChapters',
                            'args' => 'GSN',
                        ),
                    28 =>
                        array(
                            'unjoinable' => false,
                            'label' => 'IAN',
                            'call' => 'App\\Chapter::getChapters',
                            'args' => 'IAN',
                        ),
                    29 =>
                        array(
                            'unjoinable' => false,
                            'label' => 'RHN',
                            'call' => 'App\\Chapter::getChapters',
                            'args' => 'RHN',
                        ),
                    30 =>
                        array(
                            'unjoinable' => false,
                            'label' => 'SFS',
                            'call' => 'App\\Chapter::getChapters',
                            'args' => 'SFS',
                        ),
                    31 =>
                        array(
                            'unjoinable' => false,
                            'label' => 'CIVIL',
                            'call' => 'App\\Chapter::getChapters',
                            'args' => 'CIVIL',
                        ),
                    32 =>
                        array(
                            'unjoinable' => false,
                            'label' => 'INTEL',
                            'call' => 'App\\Chapter::getChapters',
                            'args' => 'INTEL',
                        ),
                    33 =>
                        array(
                            'unjoinable' => false,
                            'label' => 'RMMM',
                            'call' => 'App\\Chapter::getChapters',
                            'args' => 'RMMM',
                        ),
                    34 =>
                        array(
                            'unjoinable' => false,
                            'label' => 'RMACS',
                            'call' => 'App\\Chapter::getChapters',
                            'args' => 'RMACS',
                        ),
                    35 =>
                        array(
                            'unjoinable' => true,
                            'label' => 'Civilian Quadrants',
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'quadrant',
                        ),
                    36 =>
                        array(
                            'unjoinable' => true,
                            'call' => 'App\\Chapter::getChaptersByType',
                            'label' => 'Civilian Clusters',
                            'args' => 'cluster',
                        ),
                    37 =>
                        array(
                            'unjoinable' => true,
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'sector',
                            'label' => 'Civilian Sectors',
                        ),
                    38 =>
                        array(
                            'unjoinable' => true,
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'region',
                            'label' => 'Civilian Regions',
                        ),
                    39 =>
                        array(
                            'unjoinable' => true,
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'system',
                            'label' => 'Civilian Systems',
                        ),
                    40 =>
                        array(
                            'unjoinable' => true,
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'civ_planetary',
                            'label' => 'Civilian Planetary',
                        ),
                    41 =>
                        array(
                            'unjoinable' => true,
                            'call' => 'App\\Chapter::getChaptersByType',
                            'args' => 'board',
                            'label' => 'Corporate Board',
                        ),
                    42 =>
                        array(
                            'unjoinable' => true,
                            'call' => 'App\\Chapter::getChaptersByType',
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
        ]);
    }
}
