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
            [
                'rate_code' => 'LORDS',
                'rate' => array(
                    'description' => 'House of Lords',
                    'CIVIL' =>
                        array(
                            'C-4' => 'Administrative Specialist',
                            'C-5' => 'Clerk',
                            'C-9' => 'Aide',
                            'C-10' => 'Chief Aide',
                            'C-11' => 'Local Office Staffer',
                            'C-16' => 'Chief of Staff',
                            'C-20' => 'Member of the Lords',
                            'C-22' => 'Lord Speaker',
                        ),
                )
            ],
            [
                'rate_code' => 'DECK',
                'rate' => array(
                    'description' => 'RMMM Deck Division',
                    'RMMM' =>
                        array(
                            'C-1' => 'Apprentice Spacer',
                            'C-2' => 'General Vessel Assistant',
                            'C-3' => 'Ordinary Spacer',
                            'C-4' => 'Senior Ordinary Spacer',
                            'C-5' => 'Efficient Spacer',
                            'C-6' => 'Able Spacer',
                            'C-7' => 'Leading Spacer',
                            'C-8' => 'Certified Bosun',
                            'C-9' => 'Patrolman',
                            'C-10' => 'President',
                            'C-11' => 'Fourth Officer',
                            'C-12' => 'Third Officer',
                            'C-13' => 'Second Officer',
                            'C-14' => 'Senior Second Officer',
                            'C-15' => 'First Officer',
                            'C-16' => 'Master',
                            'C-17' => 'Fleet Manager',
                            'C-18' => 'Superintendent',
                            'C-19' => 'Managing Director',
                            'C-20' => 'Owner',
                            'C-21' => 'Board Director',
                            'C-22' => 'Home Secretary',
                        ),
                )
            ],
        ];

        foreach ($ratings as $rating) {
            Rating::create($rating);
        }
    }
}
