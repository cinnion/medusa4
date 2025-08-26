<?php

namespace Tests\Unit;

use App\Models\Billet;
use Database\Seeders\BilletSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class BilletTest extends TestCase
{
    use DatabaseMigrations;

    public function testGetBilletsExpectedResults()
    {
        // Arrange
        $this->seed(BilletSeeder::class);
        $expected = [
            'Fourth Space Lord' => 'Fourth Space Lord',
            'President' => 'President',
        ];

        // Act
        $billets = Billet::getBillets();

        // Assert
        $this->assertEquals($expected, $billets);
    }
}
