<?php

namespace Database\Seeders;

use App\Models\Billet;
use Illuminate\Database\Seeder;

class BilletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $billets = [
            [
                'billet_name' => 'Fourth Space Lord',
                'updated_at' => '2015-09-17 01:31:44',
                'created_at' => '2015-09-17 01:31:44',
                'id' => '55fa1800e4bed82e078b4972',
            ],
            [
                'billet_name' => 'President',
                'updated_at' => '2024-01-04 14:49:05',
                'created_at' => '2024-01-04 14:49:05',
                'id' => '6596c5619c6b7f60f72cb97f',
            ],
        ];

        foreach ($billets as $billet) {
            $rec = new Billet($billet);
            $rec->created_at = $billet['created_at'];
            $rec->updated_at = $billet['updated_at'];
            $rec->timestamps = false;
            $rec->save();
        }
    }
}
