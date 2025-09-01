<?php

namespace Database\Seeders;

use App\Models\RegStatus;
use Illuminate\Database\Seeder;

class RegStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            [
                'status' => 'Active',
                'updated_at' => '2015-09-17 01:31:44',
                'created_at' => '2015-09-17 01:31:44',
                'id' => '55fa1800e4bed82e078b4bc2',
            ],
            [
                'status' => 'Inactive',
                'updated_at' => '2015-09-17 01:31:44',
                'created_at' => '2015-09-17 01:31:44',
                'id' => '55fa1800e4bed82e078b4bc4',
            ],
            [
                'status' => 'Suspended',
                'updated_at' => '2015-09-17 01:31:44',
                'created_at' => '2015-09-17 01:31:44',
                'id' => '55fa1800e4bed82e078b4bc8',
            ],
            [
                'status' => 'Pending',
                'updated_at' => '2015-09-17 01:31:44',
                'created_at' => '2015-09-17 01:31:44',
                'id' => '55fa1800e4bed82e078b4bc6',
            ],
            [
                'status' => 'Expelled',
                'updated_at' => '2015-09-17 01:31:44',
                'created_at' => '2015-09-17 01:31:44',
                'id' => '55fa1800e4bed82e078b4bca',
            ],
        ];

        foreach ($statuses as $regstatus) {
            $rec = new RegStatus($regstatus);
            $rec->created_at = $regstatus['created_at'];
            $rec->updated_at = $regstatus['updated_at'];
            if (isset($regstatus['deleted'])) {
                $rec->deleted_at = $regstatus['deleted_at'];
            }
            $rec->timestamps = false;
            $rec->save();
        }
    }
}
