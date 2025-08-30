<?php

namespace Tests\Unit;

use App\Models\Country;
use Database\Seeders\CountrySeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CountryTest extends TestCase
{
    use DatabaseMigrations;

    public function testGetCountriesExpectedReturn (): void
    {
        // Arrange
        $ca = Country::where('name', 'Canada')->first();
        $us = Country::where('name', 'United States')->first();

        // Act
        $countries = Country::getCountries();

        // Assert
        $this->assertIsArray($countries);
        $this->assertCount(250, $countries);
        $this->assertEquals('Canada', $countries['CAN']);
        $this->assertEquals('United States', $countries['USA']);
    }
}
