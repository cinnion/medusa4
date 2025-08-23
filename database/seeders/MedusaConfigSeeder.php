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
            ], [
                'key' => 'some.other-with-sub-key',
                'value' => [
                    'subkey1' => 'Some other value 1',
                    'subkey2' => 'Some other value 2'
                ]
            ]
        ]);
    }
}
