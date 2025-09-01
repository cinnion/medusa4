<?php

namespace Tests\Unit;

use App\Models\RegStatus;
use Database\Seeders\RegStatusSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RegStatusTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(RegStatusSeeder::class);
    }

    public function testGetRegStatusesExpectedReturn(): void
    {
        // Arrange

        // Act
        $statuses = RegStatus::getRegStatuses();

        // Assert
        $this->assertIsArray($statuses);
        $this->assertCount(6, $statuses);
        $this->assertArrayHasKey('Active', $statuses);
        $this->assertEquals('Active', $statuses['Active']);
        $this->assertArrayHasKey('Expelled', $statuses);
        $this->assertEquals('Expelled', $statuses['Expelled']);
        $this->assertArrayHasKey('Inactive', $statuses);
        $this->assertEquals('Inactive', $statuses['Inactive']);
        $this->assertArrayHasKey('Pending', $statuses);
        $this->assertEquals('Pending', $statuses['Pending']);
        $this->assertArrayHasKey('Suspended', $statuses);
        $this->assertEquals('Suspended', $statuses['Suspended']);
        $this->assertArrayHasKey('', $statuses);
        $this->assertEquals('Select a status', $statuses['']);

    }
}
