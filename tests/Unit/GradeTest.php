<?php

namespace Tests\Unit;

use Database\Seeders\MedusaConfigSeeder;
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
        $requirements = \App\Models\Grade::getRequirements('E-2');

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
}
