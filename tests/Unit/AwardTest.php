<?php

namespace Tests\Unit;

use App\Models\Award;
use Database\Seeders\AwardSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AwardTest extends TestCase
{
    use DatabaseMigrations;

    public function testGetAwardsJustQEExpectGrouped(): void
    {
        // Arrange
        $this->seed(AwardSeeder::class);

        // Act
        $awards = Award::_getAwards('L', ['CE', 'KE', 'ME', 'OE', 'EM']);

        // Assert
        $this->assertIsArray($awards);
        $this->assertCount(1, $awards); // Only one group expected
        $this->assertArrayHasKey(0, $awards);
        $this->assertArrayHasKey('group', $awards[0]);
        $this->count(5, $awards[0]['group']['awards']);
        $this->assertEquals('Most Regal Order of Queen Elizabeth', $awards[0]['group']['label']);
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
        $this->assertFalse($awards[0]['group']['multiple']);
    }

    public function testGetAwardsWithMultipleAwardsWithUnknownExpectedResults(): void
    {
        // Arrange
        $this->seed(AwardSeeder::class);

        // Act
        $awards = Award::_getAwards('L', ['HWC', 'PMV', 'CE', 'KE', 'ME', 'OE', 'EM', 'MtSM', 'GCM', 'ZZ']);

        // Assert
        $this->assertIsArray($awards);
        $this->assertCount(4, $awards); // Three groups expected
        $this->assertInstanceOf(Award::class, $awards[0]);
        $this->assertEquals('PMV', $awards[0]->code, 'First award should be PMV');
        $this->count(5, $awards[1]['group']['awards']);
        $this->assertEquals('Most Regal Order of Queen Elizabeth', $awards[1]['group']['label']);
        $this->assertInstanceOf(Award::class, $awards[1]['group']['awards'][0]);
        $this->assertInstanceOf(Award::class, $awards[1]['group']['awards'][1]);
        $this->assertInstanceOf(Award::class, $awards[1]['group']['awards'][2]);
        $this->assertInstanceOf(Award::class, $awards[1]['group']['awards'][3]);
        $this->assertInstanceOf(Award::class, $awards[1]['group']['awards'][4]);
        $this->assertEquals('KE',  $awards[1]['group']['awards'][0]->code);
        $this->assertEquals('CE',  $awards[1]['group']['awards'][1]->code);
        $this->assertEquals('OE',  $awards[1]['group']['awards'][2]->code);
        $this->assertEquals('ME',  $awards[1]['group']['awards'][3]->code);
        $this->assertEquals('EM',  $awards[1]['group']['awards'][4]->code);
        $this->assertFalse($awards[1]['group']['multiple']);
        $this->assertInstanceOf(Award::class, $awards[2]);
        $this->assertEquals('HWC', $awards[2]->code, 'Third award should be HWC');
        $this->assertIsArray($awards[3]['group']['awards']);
        $this->assertCount(2, $awards[3]['group']['awards']);
        $this->assertInstanceOf(Award::class, $awards[3]['group']['awards'][0]);
        $this->assertEquals('MtSM',  $awards[3]['group']['awards'][0]->code);
        $this->assertInstanceOf(Award::class, $awards[3]['group']['awards'][1]);
        $this->assertEquals('GCM',  $awards[3]['group']['awards'][1]->code);
        $this->assertEquals('Length of Service Awards', $awards[3]['group']['label']);
        $this->assertTrue($awards[3]['group']['multiple']);
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

    public function testUpdateDisplayOrderKnownAwardExpectTrue(): void
    {
        // Arrange
        $this->seed(AwardSeeder::class);

        // Act
        $actual = Award::updateDisplayOrder('OE', 99);

        // Assert
        $this->assertTrue($actual);
        $this->assertEquals(99, Award::getDisplayOrder('OE'));
    }

    public function testUpdateDisplayOrderUnnownAwardExpectFalse(): void
    {
        // Arrange
        $this->seed(AwardSeeder::class);

        // Act
        $actual = Award::updateDisplayOrder('ZZ', 99);

        // Assert
        $this->assertFalse($actual);
    }
}
