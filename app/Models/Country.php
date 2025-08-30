<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Webpatser\Countries\Countries;

class Country extends Model
{
    protected $fillable = [];

    public $timestamps = false;

    public static function getCountries()
    {
        $countryLister = new Countries();
        $results = $countryLister->getList();
        $countries = [];

        foreach ($results as $country) {
            $countries[$country['iso_3166_3']] = $country['name'];
        }

        asort($countries);

        $countries = ['' => 'Select a Country'] + $countries;

        return $countries;
    }
}
