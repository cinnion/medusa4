<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('grades')->insert([
            [
                'grade' => 'C-1',
                'rank' => [
                    "CIVIL" => "Civilian One",
                    "RMMM" => "Apprentice Spacer",
                    "RMACS" => "Recruit",
                    "SFC" => "Assistant Ranger",
                ],
            ],
            [
                'grade' => 'C-2',
                'rank' => [
                    "CIVIL" => "Civilian Two",
                    "RMMM" => "Spacer 2",
                    "SFC" => "Ranger",
                    "RMACS" => "Trainee",
                ],
            ],
            [
                'grade' => 'C-3',
                'rank' => [
                    "CIVIL" => "Civilian Three",
                    "RMMM" => "Spacer 3",
                    "SFC" => "Ranger II",
                    "RMACS" => "Candidate",
                ],
            ],
            [
                'grade' => 'C-4',
                'rank' => [
                    "CIVIL" => "Civilian Four",
                    "RMACS" => "Petty Officer Third Class",
                    "SFC" => "Ranger III",
                ],
            ],
            [
                'grade' => 'C-5',
                'rank' => [
                    "CIVIL" => "Civilian Five",
                    "RMACS" => "Petty Officer Second Class",
                    "SFC" => "Senior Ranger",
                ],
            ],
            [
                'grade' => 'C-6',
                'rank' => [
                    "CIVIL" => "Civilian Six",
                    "RMMM" => "Spacer 4",
                    "RMACS" => "Petty Officer First Class",
                    "SFC" => "Senior Ranger II",
                ],
            ],
            [
                'grade' => 'C-7',
                'rank' => [
                    "CIVIL" => "Civilian Seven",
                    "RMMM" => "Spacer 5",
                    "RMACS" => "Chief Petty Officer",
                    "SFC" => "Senior Ranger III",
                ],
            ],
            [
                'grade' => 'C-8',
                'rank' => [
                    "CIVIL" => "Civilian Eight",
                    "RMMM" => "Spacer 6",
                    "RMACS" => "Senior Chief Petty Officer",
                    "SFC" => "Deputy Chief Ranger",
                ],
            ],
            [
                'grade' => 'C-9',
                'rank' => [
                    "CIVIL" => "Civilian Nine",
                    "RMACS" => "Master Chief Petty Officer",
                    "SFC" => "Chief Ranger",
                ],
            ],
            [
                'grade' => 'C-10',
                'rank' => [
                    "CIVIL" => "Civilian Ten",
                    "SFC" => "Senior Chief Ranger",
                    "RMACS" => "Senior Master Chief Petty Officer",
                ],
            ],
            [
                'grade' => 'C-11',
                'rank' => [
                    "CIVIL" => "Civilian Eleven",
                    "RMACS" => "Ensign",
                    "SFC" => "Ranger 2nd Lieutenant",
                ],
            ],
            [
                'grade' => 'C-12',
                'rank' => [
                    "CIVIL" => "Civilian Twelve",
                    "RMMM" => "Fourth Officer",
                    "RMACS" => "Lieutenant (JG)",
                    "SFC" => "Ranger 1st Lieutenant",
                ],
            ],
            [
                'grade' => 'C-13',
                'rank' => [
                    "CIVIL" => "Civilian Thirteen",
                    "RMMM" => "Civilian 13",
                    "RMACS" => "Lieutenant (SG)",
                    "SFC" => "Ranger Captain",
                ],
            ],
            [
                'grade' => 'C-14',
                'rank' => [
                    "CIVIL" => "Civilian Fourteen",
                    "RMMM" => "Civilian 14",
                    "RMACS" => "Lieutenant Commander",
                    "SFC" => "Ranger Major",
                ],
            ],
            [
                'grade' => 'C-15',
                'rank' => [
                    "CIVIL" => "Civilian Fifteen",
                    "RMMM" => "Civilian 15",
                    "RMACS" => "Commander",
                    "SFC" => "Ranger Lieutenant Colonel",
                ],
            ],
            [
                'grade' => 'C-16',
                'rank' => [
                    "CIVIL" => "Civilian Sixteen",
                    "RMMM" => "Civilian 16",
                    "RMACS" => "Captain",
                    "SFC" => "Ranger Colonel",
                ],
            ],
            [
                'grade' => 'C-17',
                'rank' => [
                    "CIVIL" => "Civilian Seventeen",
                    "RMMM" => "Civilian 17",
                    "RMACS" => "Commodore",
                    "SFC" => "Ranger Brigadier General",
                ],
            ],
            [
                'grade' => 'C-18',
                'rank' => [
                    "CIVIL" => "Civilian Eighteen",
                    "RMMM" => "Civilian 18",
                    "RMACS" => "Rear Admiral",
                    "SFC" => "Ranger Major General",
                ],
            ],
            [
                'grade' => 'C-19',
                'rank' => [
                    "CIVIL" => "Civilian Nineteen",
                    "RMMM" => "Superintendent",
                    "RMACS" => "Vice Admiral",
                    "SFC" => "Ranger Lieutenant General",
                ],
            ],
            [
                'grade' => 'C-20',
                'rank' => [
                    "CIVIL" => "Civilian Twenty",
                    "RMMM" => "Managing Director",
                    "RMACS" => "Admiral",
                    "SFC" => "Ranger General",
                ],
            ],
            [
                'grade' => 'C-21',
                'rank' => [
                    "CIVIL" => "Civilian Twenty-one",
                    "RMMM" => "Owner",
                    "RMACS" => "Fleet Admiral",
                    "SFC" => "Ranger Marshal",
                ],
            ],
            [
                'grade' => 'C-22',
                'rank' => [
                    "CIVIL" => "Civilian Twenty-two",
                    "RMMM" => "Trade Minister",
                    "SFC" => "Home Secretary",
                    "RMACS" => "Home Secretary",
                ],
            ],
            [
                'grade' => 'C-22-B',
                'rank' => [
                    "CIVIL" => "Deputy Home Secretary",
                ],
            ],
            [
                'grade' => 'C-23',
                'rank' => [
                    "CIVIL" => "Civilian Twenty-three",
                ],
            ],
            [
                'grade' => 'E-1',
                'rank' => [
                    "RMN" => "Spacer 3rd Class",
                    "RMMC" => "Private",
                    "RMA" => "Private",
                    "GSN" => "Spacer 3rd Class",
                    "RHN" => "Spacer 3rd Class",
                    "IAN" => "Gefreiter",
                ],
            ],
            [
                'grade' => 'E-2',
                'rank' => [
                    "RMN" => "Spacer 2nd Class",
                    "RMMC" => "Private First Class",
                    "RMA" => "Private First Class",
                    "GSN" => "Spacer 2nd Class",
                    "RHN" => "Spacer 2nd Class",
                    "IAN" => "Obergefreiter",
                ],
            ],
            [
                'grade' => 'E-3',
                'rank' => [
                    "RMN" => "Spacer 1st Class",
                    "RMMC" => "Lance Corporal",
                    "RMA" => "Lance Corporal",
                    "GSN" => "Spacer 1st Class",
                    "RHN" => "Spacer 1st Class",
                    "IAN" => "Hauptgefreiter",
                ],
            ],
            [
                'grade' => 'E-4',
                'rank' => [
                    "RMN" => "Petty Officer 3rd Class",
                    "RMMC" => "Corporal",
                    "RMA" => "Corporal",
                    "GSN" => "Petty Officer 3rd Class",
                    "RHN" => "Petty Officer 3rd Class",
                    "IAN" => "Maat",
                ],
            ],
            [
                'grade' => 'E-5',
                'rank' => [
                    "RMN" => "Petty Officer 2nd Class",
                    "RMMC" => "Platoon Sergeant",
                    "RMA" => "Platoon Sergeant",
                    "GSN" => "Petty Officer 2nd Class",
                    "RHN" => "Petty Officer 2nd Class",
                    "IAN" => "Obermaat",
                ],
            ],
            [
                'grade' => 'E-6',
                'rank' => [
                    "RMN" => "Petty Officer 1st Class",
                    "RMMC" => "Staff Sergeant",
                    "RMA" => "Staff Sergeant",
                    "GSN" => "Petty Officer 1st Class",
                    "RHN" => "Petty Officer 1st Class",
                    "IAN" => "Bootsmann",
                ],
            ],
            [
                'grade' => 'E-7',
                'rank' => [
                    "RMN" => "Chief Petty Officer",
                    "RMMC" => "Master Sergeant",
                    "RMA" => "Master Sergeant",
                    "GSN" => "Chief Petty Officer",
                    "RHN" => "Chief Petty Officer",
                    "IAN" => "Oberbootsmann",
                ],
            ],
            [
                'grade' => 'E-8',
                'rank' => [
                    "RMN" => "Senior Chief Petty Officer",
                    "RMMC" => "First Sergeant",
                    "RMA" => "First Sergeant",
                    "GSN" => "Senior Chief Petty Officer",
                    "RHN" => "Senior Chief Petty Officer",
                    "IAN" => "Hauptbootsmann",
                ],
            ],
            [
                'grade' => 'E-9',
                'rank' => [
                    "RMN" => "Master Chief Petty Officer",
                    "RMMC" => "Sergeant Major",
                    "RMA" => "Sergeant Major",
                    "GSN" => "Master Chief Petty Officer",
                    "RHN" => "Master Chief Petty Officer",
                    "IAN" => "Stabsbootsmann",
                ],
            ],
            [
                'grade' => 'E-10',
                'rank' => [
                    "RMN" => "Senior Master Chief Petty Officer",
                    "RMMC" => "Regimental Sergeant Major",
                    "RMA" => "Regimental Sergeant Major",
                    "GSN" => "Senior Master Chief Petty Officer",
                    "RHN" => "Senior Master Chief Petty Officer",
                    "IAN" => "Oberstabsbootsmann",
                ],
            ],
            [
                'grade' => 'E-11',
                'rank' => [
                    "RMA" => "Command Sergeant Major",
                ],
            ],
            [
                'grade' => 'E-12',
                'rank' => [
                    "RMA" => "Sergeant Major of the Army",
                ],
            ],
            [
                'grade' => 'F-1',
                'rank' => [
                    "RMN" => "Commodore",
                    "RMMC" => "Brigadier General",
                    "RMA" => "Brigadier General",
                    "GSN" => "Commodore",
                    "RHN" => "Commodore",
                    "IAN" => "Flotillenadmiral",
                ],
            ],
            [
                'grade' => 'F-2',
                'rank' => [
                    "RMMC" => "Major General",
                    "RMA" => "Major General",
                    "GSN" => "Rear Admiral",
                    "RHN" => "Rear Admiral",
                    "IAN" => "Konteradmiral",
                ],
            ],
            [
                'grade' => 'F-2-A',
                'rank' => [
                    "RMN" => "Rear Admiral of the Red",
                ],
            ],
            [
                'grade' => 'F-2-B',
                'rank' => [
                    "RMN" => "Rear Admiral of the Green",
                ],
            ],
            [
                'grade' => 'F-3',
                'rank' => [
                    "RMMC" => "Lieutenant General",
                    "RMA" => "Lieutenant General",
                    "GSN" => "Vice Admiral",
                    "RHN" => "Vice Admiral",
                    "IAN" => "Vizeadmiral",
                ],
            ],
            [
                'grade' => 'F-3-A',
                'rank' => [
                    "RMN" => "Vice Admiral of the Red",
                ],
            ],
            [
                'grade' => 'F-3-B',
                'rank' => [
                    "RMN" => "Vice Admiral of the Green",
                ],
            ],
            [
                'grade' => 'F-4',
                'rank' => [
                    "RMMC" => "General",
                    "RMA" => "General",
                    "GSN" => "Admiral",
                    "RHN" => "Admiral",
                    "IAN" => "Admiral",
                ],
            ],
            [
                'grade' => 'F-4-A',
                'rank' => [
                    "RMN" => "Admiral of the Red",
                ],
            ],
            [
                'grade' => 'F-4-B',
                'rank' => [
                    "RMN" => "Admiral of the Green",
                ],
            ],
            [
                'grade' => 'F-5',
                'rank' => [
                    "RMMC" => "Field Marshal",
                    "RMA" => "Field Marshal",
                    "GSN" => "Fleet Admiral",
                    "IAN" => "Großadmiral",
                    "RHN" => "Fleet Admiral",
                ],
            ],
            [
                'grade' => 'F-5-A',
                'rank' => [
                    "RMN" => "Fleet Admiral of the Red",
                ],
            ],
            [
                'grade' => 'F-5-B',
                'rank' => [
                    "RMN" => "Fleet Admiral of the Green",
                ],
            ],
            [
                'grade' => 'F-6',
                'rank' => [
                    "RMN" => "Admiral of the Fleet",
                    "RMMC" => "Marshal of the Corps",
                    "RMA" => "Marshal of the Army",
                    "GSN" => "Admiral of the Fleet",
                    "IAN" => "Großadmiral der Flotte",
                    "RHN" => "Admiral of the Fleet",
                ],
            ],
            [
                'grade' => 'MID',
                'rank' => [
                    "RMN" => "Midshipman",
                    "GSN" => "Midshipman",
                ],
            ],
            [
                'grade' => 'O-1',
                'rank' => [
                    "RMN" => "Ensign",
                    "RMMC" => "2nd Lieutenant",
                    "RMA" => "2nd Lieutenant",
                    "GSN" => "Ensign",
                    "RHN" => "Ensign",
                    "IAN" => "Leutnant der Sterne",
                ],
            ],
            [
                'grade' => 'O-2',
                'rank' => [
                    "RMN" => "Lieutenant (JG)",
                    "RMMC" => "1st Lieutenant",
                    "RMA" => "1st Lieutenant",
                    "GSN" => "Lieutenant (JG)",
                    "RHN" => "Lieutenant (JG)",
                    "IAN" => "Oberleutnant der Sterne",
                ],
            ],
            [
                'grade' => 'O-3',
                'rank' => [
                    "RMN" => "Lieutenant (SG)",
                    "RMMC" => "Captain",
                    "RMA" => "Captain",
                    "GSN" => "Lieutenant (SG)",
                    "RHN" => "Lieutenant (SG)",
                    "IAN" => "Kapitänleutnant",
                ],
            ],
            [
                'grade' => 'O-4',
                'rank' => [
                    "RMN" => "Lieutenant Commander",
                    "RMMC" => "Major",
                    "RMA" => "Major",
                    "GSN" => "Lieutenant Commander",
                    "RHN" => "Lieutenant Commander",
                    "IAN" => "Korvettenkapitän",
                ],
            ],
            [
                'grade' => 'O-5',
                'rank' => [
                    "RMN" => "Commander",
                    "RMMC" => "Lieutenant Colonel",
                    "RMA" => "Lieutenant Colonel",
                    "GSN" => "Commander",
                    "RHN" => "Commander",
                    "IAN" => "Fregattenkapitän",
                ],
            ],
            [
                'grade' => 'O-6',
                'rank' => [
                    "RMMC" => "Colonel",
                    "RMA" => "Colonel",
                    "GSN" => "Captain",
                    "RHN" => "Captain",
                    "IAN" => "Kapitän der Sterne",
                ],
            ],
            [
                'grade' => 'O-6-A',
                'rank' => [
                    "RMN" => "Captain (JG)",
                ],
            ],
            [
                'grade' => 'O-6-B',
                'rank' => [
                    "RMN" => "Captain (SG)",
                ],
            ],
            [
                'grade' => 'P-1',
                'rank' => [
                    "SFC" => "Provisional Ranger I",
                ],
            ],
            [
                'grade' => 'P-2',
                'rank' => [
                    "SFC" => "Provisional Ranger II",
                ],
            ],
            [
                'grade' => 'P-3',
                'rank' => [
                    "SFC" => "Provisional Ranger III",
                ],
            ],
            [
                'grade' => 'P-4',
                'rank' => [
                    "SFC" => "Senior Provisional Ranger",
                ],
            ],
            [
                'grade' => 'WO-1',
                'rank' => [
                    "RMN" => "Warrant Officer",
                    "RMMC" => "Warrant Officer",
                    "RMA" => "Warrant Officer 1st Class",
                    "GSN" => "Warrant Officer",
                ],
            ],
            [
                'grade' => 'WO-2',
                'rank' => [
                    "RMN" => "Warrant Officer 1st Class",
                    "RMMC" => "Warrant Officer 1st Class",
                    "RMA" => "Warrant Officer 2nd Class",
                    "GSN" => "Chief Warrant Officer",
                ],
            ],
            [
                'grade' => 'WO-3',
                'rank' => [
                    "RMN" => "Chief Warrant Officer",
                    "RMMC" => "Chief Warrant Officer",
                    "RMA" => "Chief Warrant Officer",
                    "GSN" => "Senior Chief Warrant Officer",
                ],
            ],
            [
                'grade' => 'WO-4',
                'rank' => [
                    "RMN" => "Senior Chief Warrant Officer",
                    "RMMC" => "Senior Chief Warrant Officer",
                    "RMA" => "Senior Chief Warrant Officer",
                    "GSN" => "Master Chief Warrant Officer",
                ],
            ],
            [
                'grade' => 'WO-5',
                'rank' => [
                    "RMN" => "Master Chief Warrant Officer",
                    "RMMC" => "Master Chief Warrant Officer",
                    "RMA" => "Master Chief Warrant Officer",
                    "GSN" => "Senior Master Chief Warrant Officer",
                ],
            ],
        ]);
    }
}
