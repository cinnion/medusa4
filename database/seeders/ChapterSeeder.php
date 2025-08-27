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
