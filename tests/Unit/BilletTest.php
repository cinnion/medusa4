<?php

namespace Tests\Unit;

use App\Models\Billet;
use Database\Seeders\BilletSeeder;
use Database\Seeders\UserSeeder;
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

    public  function testGetAssignedCountExpectedResults()
    {
        // Arrange
        $this->seed(BilletSeeder::class);
        $this->seed(UserSeeder::class);
        $billet = Billet::where('billet_name', 'President')->first();

        // Act
        $count = $billet->getAssignedCount();

        // Assert
        $this->assertEquals(1, $count);
    }
}
