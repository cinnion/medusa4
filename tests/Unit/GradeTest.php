<?php

namespace Tests\Unit;

use App\Models\Grade;
use Database\Seeders\GradeSeeder;
use Database\Seeders\MedusaConfigSeeder;
use Database\Seeders\RatingSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class GradeTest extends TestCase
{
    use DatabaseMigrations;

    public function testGetRequirements()
    {
        // Arrange
        $this->seed(MedusaConfigSeeder::class);

        // Act
        $requirements = Grade::getRequirements('E-2');

        // Assert
        $this->assertIsArray($requirements);
        $this->assertArrayHasKey('tig', $requirements);
        $this->assertEquals(2, $requirements['tig']);
        $this->assertArrayHasKey('line', $requirements);
        $this->assertIsArray($requirements['line']);
        $this->assertIsArray($requirements['line']['exam']);
        $this->assertEquals($requirements['line']['points'], 3);
        $this->assertEquals($requirements['line']['exam'], ['(00)?01']);
    }

    public function testGetRankTitleRMNE5GetsCorrectTitle()
    {
        // Arrange
        $this->seed(GradeSeeder::class);
        $this->seed(RatingSeeder::class);

        // Act
        $rankTitle = Grade::getRankTitle('E-5', 'SRN-05', 'RMN');

        // Assert
        $this->assertIsString($rankTitle);
        $this->assertEquals('Coxswain Petty Officer 2/c', $rankTitle);
    }

    public function testGetRankTitleCIVILC5GetsCorrectTitle()
    {
        // Arrange
        $this->seed(GradeSeeder::class);
        $this->seed(RatingSeeder::class);

        // Act
        $rankTitle = Grade::getRankTitle('C-5', null, 'CIVIL');

        // Assert
        $this->assertIsString($rankTitle);
        $this->assertEquals('Consular Attaché', $rankTitle);
    }

    public function testGetRankTitleRMMMC5DefaultRateGetsCorrectTitle()
    {
        // Arrange
        $this->seed(GradeSeeder::class);
        $this->seed(RatingSeeder::class);

        // Act
        $rankTitle = Grade::getRankTitle('C-5', null, 'RMMM');

        // Assert
        $this->assertIsString($rankTitle);
        $this->assertEquals('Steward', $rankTitle);
    }
    public function testGetRankTitleRMMMC5DeckRateGetsCorrectTitle()
    {
        // Arrange
        $this->seed(GradeSeeder::class);
        $this->seed(RatingSeeder::class);

        // Act
        $rankTitle = Grade::getRankTitle('C-5', 'DECK', 'RMMM');

        // Assert
        $this->assertIsString($rankTitle);
        $this->assertEquals('Efficient Spacer', $rankTitle);
    }
}
