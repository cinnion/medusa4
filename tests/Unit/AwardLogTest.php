<?php

namespace Tests\Unit;

use App\Models\AwardLog;
use Database\Seeders\AwardLogSeeder;
use Database\Seeders\AwardSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AwardLogTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(AwardSeeder::class);
        $this->seed(UserSeeder::class);
        $this->seed(AwardLogSeeder::class);
    }

    public function testGetAwardLogDataNoArgumentsAllRecordsReturned()
    {
        // Arrange

        // Act
        $results = AwardLog::getAwardLogData();

        // Assert
        $this->assertInstanceOf(Collection::class, $results);
        $this->assertCount(20, $results);
        foreach ($results as $record) {
            $this->assertInstanceOf(AwardLog::class, $record);
        }
    }

    public function testGetAwardLogDataStartSpecifiedExpectedRecordsReturned()
    {
        // Arrange

        // Act
        $results = AwardLog::getAwardLogData(['start' => date('Y-m-d H:i:s', time()-31*86400)]);

        // Assert
        $this->assertInstanceOf(Collection::class, $results);
        $this->assertCount(10, $results);
        foreach ($results as $record) {
            $this->assertInstanceOf(AwardLog::class, $record);
        }
    }

    public function testGetAwardLogDataEndSpecifiedExpectedRecordsReturned()
    {
        // Arrange

        // Act
        $results = AwardLog::getAwardLogData(['end' => date('Y-m-d H:i:s', time()-31*86400)]);

        // Assert
        $this->assertInstanceOf(Collection::class, $results);
        $this->assertCount(10, $results);
        foreach ($results as $record) {
            $this->assertInstanceOf(AwardLog::class, $record);
        }
    }

    public function testGetAwardLogDataMemberSpecifiedExpectedRecordsReturned()
    {
        // Arrange

        // Act
        $results = AwardLog::getAwardLogData(['member_id' => 'B0001']);

        // Assert
        $this->assertInstanceOf(Collection::class, $results);
        $this->assertCount(1, $results);
        $this->assertInstanceOf(AwardLog::class, $results[0]);
        $this->assertEquals('B0001', $results[0]->member_id);
    }

    public function testGetAwardLogDataAwardSpecifiedExpectedRecordsReturned()
    {
        // Arrange

        // Act
        $results = AwardLog::getAwardLogData(['award' => 'XYZ']);

        // Assert
        $this->assertInstanceOf(Collection::class, $results);
        $this->assertCount(1, $results);
        $this->assertInstanceOf(AwardLog::class, $results[0]);
        $this->assertEquals('XYZ', $results[0]->award);
    }
}
