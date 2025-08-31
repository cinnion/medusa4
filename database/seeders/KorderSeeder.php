<?php

namespace Database\Seeders;

use App\Models\Korder;
use Illuminate\Database\Seeder;

class KorderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $korders = [
            [
                'order' => 'Most Honorable Order of King Roger',
                'filename' => 'Order-of-King-Roger.svg',
                'classes' => [
                    [
                        'class' => 'Knight Grand Cross',
                        'precedence' => 4,
                        'postnominal' => 'GCR',
                    ],
                    [
                        'class' => 'Knight Commander',
                        'precedence' => 7,
                        'postnominal' => 'KDR',
                    ],
                    [
                        'class' => 'Knight Companion',
                        'precedence' => 9,
                        'postnominal' => 'KCR',
                    ],
                    [
                        'class' => 'Knight',
                        'precedence' => 13,
                        'postnominal' => 'KR',
                    ],
                    [
                        'class' => 'Companion',
                        'precedence' => 15,
                        'postnominal' => 'CR',
                    ],
                    [
                        'class' => 'Officer',
                        'precedence' => 19,
                        'postnominal' => 'OR',
                    ],
                    [
                        'class' => 'Member',
                        'precedence' => 24,
                        'postnominal' => 'MR',
                    ],
                    [
                        'class' => 'Medal',
                        'precedence' => 35,
                        'postnominal' => 'RM',
                    ],
                ],
                'updated_at' => '2016-03-08 18:18:05',
                'created_at' => '2016-03-08 18:18:05',
                'id' => '56df175de4bed83d328b456a',
            ],
            [
                'order' => 'Most Regal Order of Queen Elizabeth',
                'filename' => 'Order-of-Queen-Elizabeth.svg',
                'classes' => [
                    [
                        'class' => 'Knight Grand Cross',
                        'precedence' => 5,
                        'postnominal' => 'GCE',
                    ],
                    [
                        'class' => 'Knight Commander',
                        'precedence' => 8,
                        'postnominal' => 'KDE',
                    ],
                    [
                        'class' => 'Knight Companion',
                        'precedence' => 10,
                        'postnominal' => 'KCE',
                    ],
                    [
                        'class' => 'Knight',
                        'precedence' => 14,
                        'postnominal' => 'KE',
                    ],
                    [
                        'class' => 'Companion',
                        'precedence' => 16,
                        'postnominal' => 'CE',
                    ],
                    [
                        'class' => 'Officer',
                        'precedence' => 20,
                        'postnominal' => 'OE',
                    ],
                    [
                        'class' => 'Member',
                        'precedence' => 25,
                        'postnominal' => 'ME',
                    ],
                    [
                        'class' => 'Medal',
                        'precedence' => 36,
                        'postnominal' => 'EM',
                    ],
                ],
                'updated_at' => '2016-03-08 18:18:05',
                'created_at' => '2016-03-08 18:18:05',
                'id' => '56df175de4bed83d328b456e',
            ],
            [
                'order' => 'The Most Eminent Order of the Golden Lion',
                'filename' => 'Order-of-the-Golden-Lion.svg',
                'classes' => [
                    [
                        'class' => 'Knight Grand Cross',
                        'precedence' => 4.5,
                        'postnominal' => 'GCGL',
                    ],
                    [
                        'class' => 'Knight Commander',
                        'precedence' => 7.6,
                        'postnominal' => 'KDGL',
                    ],
                    [
                        'class' => 'Knight Companion',
                        'precedence' => 9.5,
                        'postnominal' => 'KCGL',
                    ],
                    [
                        'class' => 'Knight',
                        'precedence' => 13.5,
                        'postnominal' => 'KGL',
                    ],
                    [
                        'class' => 'Companion',
                        'precedence' => 15.5,
                        'postnominal' => 'CGL',
                    ],
                    [
                        'class' => 'Officer',
                        'precedence' => 19.5,
                        'postnominal' => 'OGL',
                    ],
                    [
                        'class' => 'Member',
                        'precedence' => 24.5,
                        'postnominal' => 'MGL',
                    ],
                    [
                        'class' => 'Medal',
                        'precedence' => 35.5,
                        'postnominal' => 'GLM',
                    ],
                ],
                'updated_at' => '2016-03-08 18:18:05',
                'created_at' => '2016-03-08 18:18:05',
                'id' => '56df175de4bed83d328b456c',
            ],
            [
                'order' => 'Most Noble Order of the Star Kingdom',
                'filename' => 'Order-of-the-Star-Kingdom.svg',
                'classes' => [
                    [
                        'class' => 'Knight',
                        'precedence' => 3,
                        'postnominal' => 'KSK',
                    ],
                ],
                'updated_at' => '2016-03-08 18:18:05',
                'created_at' => '2016-03-08 18:18:05',
                'id' => '56df175de4bed83d328b4568',
            ],
            [
                'order' => 'The Most Distinguished Order of Merit',
                'filename' => 'Order-of-Merit.svg',
                'classes' => [
                    [
                        'class' => 'Knight',
                        'precedence' => 6,
                        'postnominal' => 'OM',
                    ],
                ],
                'updated_at' => '2016-03-08 18:18:05',
                'created_at' => '2016-03-08 18:18:05',
                'id' => '56df175de4bed83d328b4570',
            ],
        ];

        foreach ($korders as $korder) {
            $rec = new Korder($korder);
            $rec->created_at = $korder['created_at'];
            $rec->updated_at = $korder['updated_at'];
            if (isset($korder['deleted'])) {
                $rec->deleted_at = $korder['deleted_at'];
            }
            $rec->timestamps = false;
            $rec->save();
        }
    }
}
