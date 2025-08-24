<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ratings = [
            [
                'rate_code' => 'RMAT-04',
                'rate' => array(
                    'description' => 'Reconnaissance Specialist',
                    'RMA' =>
                        array(),
                )
            ],
            [
                'rate_code' => 'SRN-05',
                'rate' => array(
                    'description' => 'Coxswain',
                    'RMN' =>
                        array(
                            'E-1' => 'Coxswain 3/c',
                            'E-2' => 'Coxswain 2/c',
                            'E-3' => 'Coxswain 1/c',
                            'E-4' => 'Coxswain Petty Officer 3/c',
                            'E-5' => 'Coxswain Petty Officer 2/c',
                            'E-6' => 'Coxswain Petty Officer 1/c',
                            'E-7' => 'Chief Coxswain',
                            'E-8' => 'Senior Chief Coxswain',
                            'E-9' => 'Master Chief Coxswain',
                            'E-10' => 'Senior Master Chief Coxswain',
                        ),
                    'GSN' =>
                        array(
                            'E-1' => 'Coxswain 3/c',
                            'E-2' => 'Coxswain 2/c',
                            'E-3' => 'Coxswain 1/c',
                            'E-4' => 'Coxswain Petty Officer 3/c',
                            'E-5' => 'Coxswain Petty Officer 2/c',
                            'E-6' => 'Coxswain Petty Officer 1/c',
                            'E-7' => 'Chief Coxswain',
                            'E-8' => 'Senior Chief Coxswain',
                            'E-9' => 'Master Chief Coxswain',
                            'E-10' => 'Senior Master Chief Coxswain',
                        ),
                    'RHN' =>
                        array(
                            'E-1' => 'Coxswain 3/c',
                            'E-2' => 'Coxswain 2/c',
                            'E-3' => 'Coxswain 1/c',
                            'E-4' => 'Coxswain Petty Officer 3/c',
                            'E-5' => 'Coxswain Petty Officer 2/c',
                            'E-6' => 'Coxswain Petty Officer 1/c',
                            'E-7' => 'Chief Coxswain',
                            'E-8' => 'Senior Chief Coxswain',
                            'E-9' => 'Master Chief Coxswain',
                            'E-10' => 'Senior Master Chief Coxswain',
                        ),
                    'RMACS' =>
                        array(
                            'C-1' => 'Coxswain 3/c',
                            'C-4' => 'Coxswain Petty Officer 3/c',
                            'C-5' => 'Coxswain Petty Officer 2/c',
                            'C-6' => 'Coxswain Petty Officer 1/c',
                            'C-7' => 'Chief Coxswain',
                            'C-8' => 'Senior Chief Coxswain',
                            'C-9' => 'Master Chief Coxswain',
                        ),
                )
            ],
        ];

        foreach ($ratings as $rating) {
            Rating::create($rating);
        }
    }
}
