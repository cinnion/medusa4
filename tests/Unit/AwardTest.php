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

    {
    }
}
