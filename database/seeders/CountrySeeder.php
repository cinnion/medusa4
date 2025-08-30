<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            [
                '_id' => '55fa17ffe4bed82e078b45b0',
                'capital' => 'Ottawa',
                'citizenship' => 'Canadian',
                'country_code' => '124',
                'currency' => 'Canadian dollar',
                'currency_code' => 'CAD',
                'currency_sub_unit' => 'cent',
                'full_name' => 'Canada',
                'iso_3166_2' => 'CA',
                'iso_3166_3' => 'CAN',
                'name' => 'Canada',
                'region_code' => '019',
                'sub_region_code' => '021',
                'eea' => false,
            ],
            [
                '_id' => '55fa1800e4bed82e078b4746',
                'capital' => 'Washington DC',
                'citizenship' => 'American',
                'country_code' => '840',
                'currency' => 'US dollar',
                'currency_code' => 'USD',
                'currency_sub_unit' => 'cent',
                'full_name' => 'United States of America',
                'iso_3166_2' => 'US',
                'iso_3166_3' => 'USA',
                'name' => 'United States',
                'region_code' => '019',
                'sub_region_code' => '021',
                'eea' => false,
            ],
        ];

        foreach ($countries as $country) {
            $rec = new Country($country);
            if (isset($country['created_at'])) {
                $rec->created_at = $country['created_at'];
            }
            if (isset($country['updated_at'])) {
                $rec->updated_at = $country['updated_at'];
            }
            if (isset($country['deleted'])) {
                $rec->deleted_at = $country['deleted_at'];
            }
            $rec->timestamps = false;
            $rec->save();
        }
    }
}
