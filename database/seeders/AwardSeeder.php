<?php

namespace Database\Seeders;

use App\Models\Award;
use Illuminate\Database\Seeder;

class AwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $awards = [
            [
                'display_order' => 1,
                'name' => 'Parliamentary Medal of Valor',
                'code' => 'PMV',
                'post_nominal' => 'PMV',
                'replaces' => '',
                'location' => 'L',
                'multiple' => true,
                'updated_at' => '2018-05-28 18:35:30',
                'created_at' => '2016-11-13 22:16:46',
                'points' => 5,
                'star_nation' => 'manticore',
                'id' => '5828e64ee4bed8314b8b4567',
            ],
            [
                'display_order' => 20,
                'name' => 'Knight of the Most Regal Order of Queen Elizabeth',
                'code' => 'KE',
                'post_nominal' => 'KE',
                'replaces' => 'CE,OE,ME,EM',
                'location' => 'L',
                'multiple' => false,
                'group_label' => 'Most Regal Order of Queen Elizabeth',
                'updated_at' => '2018-05-28 18:35:30',
                'created_at' => '2016-11-13 22:16:46',
                'points' => 2.5,
                'star_nation' => 'manticore',
                'id' => '5828e64ee4bed8314b8b4574',
            ],
            [
                'display_order' => 23,
                'name' => 'Companion of the Most Regal Order of Queen Elizabeth',
                'code' => 'CE',
                'post_nominal' => 'CE',
                'replaces' => 'OE,ME,EM',
                'location' => 'L',
                'multiple' => false,
                'group_label' => 'Most Regal Order of Queen Elizabeth',
                'updated_at' => '2018-05-28 18:35:30',
                'created_at' => '2016-11-13 22:16:46',
                'points' => 2,
                'star_nation' => 'manticore',
                'id' => '5828e64ee4bed8314b8b4576',
            ],
            [
                'display_order' => 29,
                'name' => 'Officer of the Order of Queen Elizabeth',
                'code' => 'OE',
                'post_nominal' => 'OE',
                'replaces' => 'ME,EM',
                'location' => 'L',
                'multiple' => false,
                'group_label' => 'Most Regal Order of Queen Elizabeth',
                'updated_at' => '2018-05-28 18:35:30',
                'created_at' => '2016-11-13 22:16:46',
                'points' => 1.5,
                'star_nation' => 'manticore',
                'id' => '5828e64ee4bed8314b8b457a',
            ],
            [
                'display_order' => 37,
                'name' => 'Member of the Most Regal Order of Queen Elizabeth',
                'code' => 'ME',
                'post_nominal' => 'ME',
                'replaces' => 'EM',
                'location' => 'L',
                'multiple' => false,
                'group_label' => 'Most Regal Order of Queen Elizabeth',
                'updated_at' => '2018-05-28 18:35:30',
                'created_at' => '2016-11-13 22:16:46',
                'points' => 1,
                'star_nation' => 'manticore',
                'id' => '5828e64ee4bed8314b8b457f',
            ],
            [
                'display_order' => 55,
                'name' => 'Medal,Most Regal Order of Queen Elizabeth',
                'code' => 'EM',
                'post_nominal' => 'EM',
                'replaces' => '',
                'location' => 'L',
                'multiple' => false,
                'group_label' => 'Most Regal Order of Queen Elizabeth',
                'updated_at' => '2018-05-28 18:35:30',
                'created_at' => '2016-11-13 22:16:46',
                'points' => 0.5,
                'star_nation' => 'manticore',
                'id' => '5828e64ee4bed8314b8b458a',
            ],
            [
                'display_order' => 70,
                'name' => 'Havenite War Campaign Medal',
                'code' => 'HWC',
                'post_nominal' => '',
                'replaces' => '',
                'location' => 'L',
                'multiple' => true,
                'updated_at' => '2018-05-28 18:35:30',
                'created_at' => '2016-11-13 22:16:46',
                'points' => 1,
                'star_nation' => 'manticore',
                'id' => '5828e64ee4bed8314b8b4598',
            ],
            [
                'display_order' => 80,
                'name' => 'Manticoran Service Medal',
                'code' => 'MtSM',
                'post_nominal' => '',
                'replaces' => 'MRSM,GCM',
                'location' => 'L',
                'multiple' => true,
                'group_label' => 'Length of Service Awards',
                'updated_at' => '2024-02-20 02:51:42',
                'created_at' => '2016-11-13 22:16:46',
                'points' => 2,
                'star_nation' => 'manticore',
                'id' => '5828e64ee4bed8314b8b459f',
            ],
            [
                'display_order' => 82,
                'name' => 'Good Conduct Medal',
                'code' => 'GCM',
                'post_nominal' => '',
                'replaces' => 'MtSM,MRSM',
                'location' => 'L',
                'multiple' => true,
                'group_label' => 'Length of Service Awards',
                'updated_at' => '2024-02-20 02:51:42',
                'created_at' => '2016-11-13 22:16:46',
                'points' => 2,
                'star_nation' => 'manticore',
                'id' => '5828e64ee4bed8314b8b45a1',
            ],
            [
                'display_order' => 4000,
                'name' => 'Army Grenade High Expert Rating',
                'code' => 'AGHER',
                'post_nominal' => '',
                'replaces' => 'AGER,AGSR,AGMR',
                'location' => 'AWQ',
                'multiple' => false,
                'group_label' => 'Army Grenade Marksmanship',
                'image' => 'AHER.png',
                'updated_at' => '2018-05-28 18:36:14',
                'created_at' => '2018-05-28 18:35:30',
                'star_nation' => 'manticore',
                'points' => 4,
                'id' => '5b0c4bf2cbe77603d215d96c',
            ],
        ];

        foreach ($awards as $award) {
            $rec = new Award($award);
            $rec->created_at = $award['created_at'];
            $rec->updated_at = $award['updated_at'];
            $rec->timestamps = false;
            $rec->save();
        }
    }
}
