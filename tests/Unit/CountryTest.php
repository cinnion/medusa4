<?php

namespace Tests\Unit;

use Tests\TestCase;

class CountryTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(CountrySeeder::class);
    }

}
