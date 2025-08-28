<?php

namespace Database\Seeders;

use App\Models\Chapter;
use Illuminate\Database\Seeder;

class ChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chapters = [
            [
                'assigned_to' => '55fa1800e4bed82e078b4784',
                'branch' => 'RMN',
                'chapter_name' => 'HMSS Hephaestus',
                'chapter_type' => 'station',
                'created_at' => '2015-09-17 01:31:44',
                'hull_number' => 'SS-001',
                'joinable' => '1',
                'updated_at' => '2024-01-07 20:29:11',
                'id' => '55fa1800e4bed82e078b4794',
            ],
            [
                'chapter_name' => 'GNSS Katherine Mayhew',
                'chapter_type' => 'station',
                'hull_number' => 'SS-002',
                'branch' => 'GSN',
                'joinable' => '1',
                'updated_at' => '2024-01-07 20:29:04',
                'created_at' => '2015-09-17 01:31:44',
                'assigned_to' => '560dc143e4bed8b9748b45e0',
                'id' => '55fa1800e4bed82e078b4796',
            ],
            [
                'branch' => 'RMN',
                'chapter_name' => 'HMS Truculent',
                'chapter_type' => 'ship',
                'hull_number' => 'BC-593',
                'ship_class' => 'Nike',
                'commission_date' => '2012-07-05',
                'assigned_to' => '55fa18a3e4bed83f078b456e',
                'updated_at' => '2022-01-09 14:00:41',
                'created_at' => '2015-09-17 01:32:35',
                'idcards_printed' => true,
                'id' => '55fa1833e4bed832078b457e',
            ],
            [
                'branch' => 'RMN',
                'chapter_name' => 'HMS Achilles',
                'chapter_type' => 'ship',
                'hull_number' => 'BC-549',
                'ship_class' => 'Agamemnon',
                'commission_date' => '2014-11-01',
                'assigned_to' => '55fa18a3e4bed83f078b459e',
                'updated_at' => '2016-08-06 21:57:16',
                'created_at' => '2015-09-17 01:32:35',
                'idcards_printed' => true,
                'id' => '55fa1833e4bed832078b45dc',
            ],
            [
                'branch' => 'RMN',
                'chapter_name' => 'HMS Gallant',
                'chapter_type' => 'ship',
                'hull_number' => 'CL-315',
                'ship_class' => 'Valiant',
                'updated_at' => '2020-04-21 18:36:46',
                'created_at' => '2015-09-17 01:32:35',
                'assigned_to' => '58ee7bf8493ea9db6d8b4590',
                'decommission_date' => '2020-04-21',
                'id' => '55fa1833e4bed832078b45f4',
            ],
            [
                'chapter_name' => 'HMS Tartarus',
                'chapter_type' => 'SU',
                'hull_number' => 'Expelled',
                'branch' => 'RMN',
                'joinable' => false,
                'updated_at' => '2015-09-17 01:31:44',
                'created_at' => '2015-09-17 01:31:44',
                'id' => '55fa1800e4bed82e078b47a0',
            ],
            [
                'chapter_name' => 'HMS Charon',
                'chapter_type' => 'SU',
                'hull_number' => 'Withdrawn',
                'branch' => 'RMN',
                'joinable' => false,
                'updated_at' => '2015-09-17 01:31:44',
                'created_at' => '2015-09-17 01:31:44',
                'id' => '55fa1800e4bed82e078b47a2',
            ],
            [
                'chapter_name' => 'HMS Valhalla',
                'chapter_type' => 'SU',
                'hull_number' => 'Passed Away',
                'branch' => 'RMN',
                'joinable' => false,
                'updated_at' => '2015-09-17 01:31:44',
                'created_at' => '2015-09-17 01:31:44',
                'id' => '55fa1800e4bed82e078b479e',
            ],
            [
                'chapter_name' => 'Admiralty House',
                'chapter_type' => 'headquarters',
                'hull_number' => 'AH',
                'branch' => 'RMN',
                'joinable' => false,
                'updated_at' => '2024-01-07 19:11:45',
                'created_at' => '2015-09-17 01:31:44',
                'assigned_to' => '659af5a09c6b7f408f09e775',
                'id' => '55fa1800e4bed82e078b4782',
            ],
            [
                'chapter_name' => 'San Martino Fleet',
                'chapter_type' => 'fleet',
                'hull_number' => '3',
                'assigned_to' => '55fa1800e4bed82e078b475e',
                'joinable' => false,
                'updated_at' => '2015-09-17 01:31:44',
                'created_at' => '2015-09-17 01:31:44',
                'id' => '55fa1800e4bed82e078b4772',
            ],
            [
                'chapter_type' => 'barony',
                'chapter_name' => 'Serpent Head Point',
                'joinable' => false,
                'updated_at' => '2017-07-31 15:38:42',
                'created_at' => '2017-07-31 15:38:42',
                'id' => '597f4f024b3df7b8212343f5',
            ],
            [
                'chapter_name' => 'New Gilwell',
                'chapter_type' => 'barony',
                'commission_date' => '2021-12-31',
                'joinable' => false,
                'updated_at' => '2022-01-17 12:44:51',
                'created_at' => '2022-01-17 12:44:51',
                'id' => '61e564c39c6b7f0b29232f2c',
            ],
            [
                'chapter_type' => 'keep',
                'chapter_name' => 'Lochen Keep',
                'joinable' => false,
                'updated_at' => '2017-07-31 15:38:41',
                'created_at' => '2017-07-31 15:38:41',
                'id' => '597f4f014b3df7b8212343c7',
            ],
        ];

        foreach ($chapters as $chapter) {
            $rec = new Chapter($chapter);
            $rec->created_at = $chapter['created_at'];
            $rec->updated_at = $chapter['updated_at'];
            if (isset($chapter['deleted'])) {
                $rec->deleted_at = $chapter['deleted_at'];
            }
            $rec->timestamps = false;
            $rec->save();
        }
    }
}
