<?php

namespace Tests\Unit;

use App\Models\Award;
use Database\Seeders\AwardSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AwardTest extends TestCase
{
    use DatabaseMigrations;

    public function testGetAwards(): void
    {
        // Arrange
        $this->seed(AwardSeeder::class);

        // Act
        $awards = Award::_getAwards('L', ['CE', 'KE', 'ME', 'OE', 'EM']);

        // Assert
        $this->assertIsArray($awards);
        $this->count(5, $awards[0]['group']['awards']);
        $this->assertInstanceOf(Award::class, $awards[0]['group']['awards'][0]);
        $this->assertInstanceOf(Award::class, $awards[0]['group']['awards'][1]);
        $this->assertInstanceOf(Award::class, $awards[0]['group']['awards'][2]);
        $this->assertInstanceOf(Award::class, $awards[0]['group']['awards'][3]);
        $this->assertInstanceOf(Award::class, $awards[0]['group']['awards'][4]);
        $this->assertEquals('KE',  $awards[0]['group']['awards'][0]->code);
        $this->assertEquals('CE',  $awards[0]['group']['awards'][1]->code);
        $this->assertEquals('OE',  $awards[0]['group']['awards'][2]->code);
        $this->assertEquals('ME',  $awards[0]['group']['awards'][3]->code);
        $this->assertEquals('EM',  $awards[0]['group']['awards'][4]->code);
    }

    public function testGetDisplayOrderKnownAwardExpect29(): void
    {
        // Arrange
        $this->seed(AwardSeeder::class);

        // Act
        $actual = Award::getDisplayOrder('OE');

        // Assert
        $this->assertEquals(29, $actual);
    }

    public function testGetDisplayOrderUnknownAwardExpectNull(): void
    {
        // Arrange
        $this->seed(AwardSeeder::class);

        // Act
        $actual = Award::getDisplayOrder('ZZ');

        // Assert
        $this->assertNull($actual);
    }

    public function testGetAwardByCodeKnownAwardExpectAward(): void
    {
        // Arrange
        $this->seed(AwardSeeder::class);

        // Act
        $actual = Award::getAwardByCode('OE');

        // Assert
        $this->assertInstanceOf(Award::class, $actual);
        $this->assertEquals('OE', $actual->code);
    }

    public function testGetAwardByCodeUnknownAwardExpectNull(): void
    {
        // Arrange
        $this->seed(AwardSeeder::class);

        // Act
        $actual = Award::getPointsForAward('ZZ');

        // Assert
        $this->assertNull($actual);
    }

    public function testGetPointsForAwardKnownAwardExpect15(): void
    {
        // Arrange
        $this->seed(AwardSeeder::class);

        // Act
        $actual = Award::getPointsForAward('OE');

        // Assert
        $this->assertEquals(1.5, $actual);
    }

    public function testGetPointsForAwardUnknownAwardExpectNull(): void
    {
        // Arrange
        $this->seed(AwardSeeder::class);

        // Act
        $actual = Award::getPointsForAward('ZZ');

        // Assert
        $this->assertNull($actual);
    }

    public function testGetAwardNameKnownAwardExpectName(): void
    {
        // Arrange
        $this->seed(AwardSeeder::class);

        // Act
        $actual = Award::getAwardName('OE');

        // Assert
        $this->assertEquals('Officer of the Order of Queen Elizabeth', $actual);
    }

    public function testGetAwardNameUnknownAwardExpectNull(): void
    {
        // Arrange
        $this->seed(AwardSeeder::class);

        // Act
        $actual = Award::getAwardName('ZZ');

        // Assert
        $this->assertNull($actual);
    }
    public function testGetAwardImageKnownAwardWithoutImageExpectName(): void
    {
        // Arrange
        $this->seed(AwardSeeder::class);

        // Act
        $actual = Award::getAwardImage('OE');

        // Assert
        $this->assertNull($actual);
    }

    public function testGetAwardImageWithImageExpectImageName(): void
    {
        // Arrange
        $this->seed(AwardSeeder::class);

        // Act
        $actual = Award::getAwardImage('AGHER');

        // Assert
        $this->assertEquals('AHER.png', $actual);
    }

    public function testGetAwardImageUnknownAwardExpectNull(): void
    {
        // Arrange
        $this->seed(AwardSeeder::class);

        // Act
        $actual = Award::getAwardImage('ZZ');

        // Assert
        $this->assertNull($actual);
    }
}
