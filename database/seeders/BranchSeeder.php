<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = [
            [
                'branch' => 'CIVIL',
                'branch_name' => 'Civil Service',
                'equivalent' => array(
                    'RMN' =>
                        array(
                            'C-1' => 'E-1',
                            'C-2' => 'E-2',
                            'C-3' => 'E-3',
                            'C-4' => 'E-4',
                            'C-5' => 'E-5',
                            'C-6' => 'E-6',
                            'C-7' => 'E-7',
                            'C-8' => 'E-10',
                            'C-9' => 'WO-1',
                            'C-10' => 'WO-2',
                            'C-11' => 'WO-3',
                            'C-12' => 'O-1',
                            'C-13' => 'O-2',
                            'C-14' => 'O-3',
                            'C-15' => 'O-4',
                            'C-16' => 'O-5',
                            'C-17' => 'O-6-B',
                            'C-18' => 'F-1',
                            'C-19' => 'F-2-A',
                            'C-20' => 'F-3-A',
                            'C-21' => 'F-4-A',
                            'C-22' => 'F-5-A',
                            'C-23' => 'F-6',
                        ),
                )
            ],
        ];

        foreach ($branches as $branch) {
            Branch::create($branch);
        }
    }
}
