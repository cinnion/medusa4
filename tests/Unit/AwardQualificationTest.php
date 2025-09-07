<?php

namespace Tests\Unit;

use App\Awards\AwardQualification;
use App\Models\AwardLog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Mockery;
use Tests\TestCase;

class AwardQualificationTest extends TestCase
{
    use DatabaseMigrations;

    public function testMcamQualNoExamsExpectFalse(): void
    {
        // Arrange
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->shouldReceive('hasAward')
            ->once()
            ->with('ESWP')
            ->andReturn(false);
        $mockUser->shouldReceive('hasAward')
            ->once()
            ->with('OSWP')
            ->andReturn(false);

        // Act
        $results = $mockUser->mcamQual();

        // Assert
        $this->assertFalse($results);
    }

    public function testMcamQualESWP39ExamsExpectFalse(): void
    {
        // Arrange
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->shouldReceive('hasAward')
            ->once()
            ->with('ESWP')
            ->andReturn(true);
        $mockUser->shouldReceive('hasAward')
            ->never()
            ->with('OSWP')
            ->andReturn(false);
        $mockUser->shouldReceive('getNumExams')
            ->once()
            ->andReturn(39);

        // Act
        $results = $mockUser->mcamQual();

        // Assert
        $this->assertFalse($results);
    }

    public function testMcamQualESWP40ExamsNoMcamExpectedResults(): void
    {
        // Arrange
        Carbon::setTestNow(Carbon::create(2025, 9, 1, 10, 0, 0));
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->member_id = 'MEMBER-ID';
        $mockUser->shouldReceive('hasAward')
            ->once()
            ->with('ESWP')
            ->andReturn(true);
        $mockUser->shouldReceive('hasAward')
            ->never()
            ->with('OSWP')
            ->andReturn(false);
        $mockUser->shouldReceive('getNumExams')
            ->once()
            ->andReturn(40);
        $mockUser->shouldReceive('hasAward')
            ->once()
            ->with('MCAM')
            ->andReturn(false);
        $mockUser->shouldReceive('addUpdateAward')
            ->once()
            ->with([ 'MCAM' => [
                'count' => 1,
                'location' => 'L',
                'award_date' => [
                    '2025-10-01'
                ],
                'display' => true
            ]])->andReturn(true);
        $mockUser->shouldReceive('addServiceHistoryEntry')
            ->once()
            ->with([
                'timestamp' => 1759276800,
                'event' => 'First Manticore Combat Action Medal earned on 2025-10-01'
            ])->andReturn(true);

        // Act
        $results = $mockUser->mcamQual();

        // Assert
        $this->assertTrue($results);
        $this->assertDatabaseHas(
            AwardLog::class,
            [
                'timestamp' => strtotime('2025-10-01'),
                'member_id' => 'MEMBER-ID',
                'award' => 'MCAM',
                'qty' => 1
                ]);
    }

    public function testMcamQualESWP40ExamsOldMcamExpectedResults(): void
    {
        // Arrange
        Carbon::setTestNow(Carbon::create(2025, 9, 1, 10, 0, 0));
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->member_id = 'MEMBER-ID';
        $mockUser->shouldReceive('hasAward')
            ->once()
            ->with('ESWP')
            ->andReturn(true);
        $mockUser->shouldReceive('hasAward')
            ->never()
            ->with('OSWP')
            ->andReturn(false);
        $mockUser->shouldReceive('getNumExams')
            ->once()
            ->andReturn(40);
        $mockUser->shouldReceive('hasAward')
            ->once()
            ->with('MCAM')
            ->andReturn(false);
        $mockUser->shouldReceive('addUpdateAward')
            ->once()
            ->with([ 'MCAM' => [
                'count' => 1,
                'location' => 'L',
                'award_date' => [
                    '1970-01-01'
                ],
                'display' => true
            ]])->andReturn(true);
        $mockUser->shouldReceive('addServiceHistoryEntry')
            ->never()
            ->with([
                'timestamp' => 0,
                'event' => 'First Manticore Combat Action Medal earned on 1970-01-01'
            ])->andReturn(true);

        // Act
        $results = $mockUser->mcamQual(false);

        // Assert
        $this->assertFalse($results);
        $this->assertDatabaseMissing(
            AwardLog::class,
            [
                'timestamp' => strtotime('1970-01-01'),
                'member_id' => 'MEMBER-ID',
                'award' => 'MCAM',
                'qty' => 1
            ]);
    }
    public function testMcamQualOSWP45ExamsOneMcamExpectedResults(): void
    {
        // Arrange
        Carbon::setTestNow(Carbon::create(2025, 9, 1, 10, 0, 0));
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->member_id = 'MEMBER-ID';
        $awards = [
            'MCAM' => [
                'count' => 1,
                'award_date' => [
                    '1970-01-01'
                ]
            ]
        ];
        $mockUser->awards = $awards;
        $mockUser->shouldReceive('hasAward')
            ->once()
            ->with('ESWP')
            ->andReturn(false);
        $mockUser->shouldReceive('hasAward')
            ->once()
            ->with('OSWP')
            ->andReturn(true);
        $mockUser->shouldReceive('getNumExams')
            ->once()
            ->andReturn(45);
        $mockUser->shouldReceive('hasAward')
            ->once()
            ->with('MCAM')
            ->andReturn(true);
        $mockUser->shouldReceive('addUpdateAward')
            ->never()
            ->with([ 'MCAM' => [
                'count' => 2,
                'location' => 'L',
                'award_date' => [
                    '1970-01-01',
                    '2025-10-01',
                ],
                'display' => true
            ]])->andReturn(true);
        $mockUser->shouldReceive('addServiceHistoryEntry')
            ->never()
            ->with([
                'timestamp' => 1759276800,
                'event' => 'Second Manticore Combat Action Medal earned on 2025-10-01'
            ])->andReturn(true);

        // Act
        $results = $mockUser->mcamQual();

        // Assert
        $this->assertFalse($results);
        $this->assertDatabaseMissing(
            AwardLog::class,
            [
                'timestamp' => strtotime('2025-10-01'),
                'member_id' => 'MEMBER-ID',
                'award' => 'MCAM',
                'qty' => 1
            ]);
    }


    public function testMcamQualOSWP80ExamsOneMcamExpectedResults(): void
    {
        // Arrange
        Carbon::setTestNow(Carbon::create(2025, 9, 1, 10, 0, 0));
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->member_id = 'MEMBER-ID';
        $awards = [
            'MCAM' => [
                'count' => 1,
                'award_date' => [
                    '1970-01-01'
                ]
            ]
        ];
        $mockUser->awards = $awards;
        $mockUser->shouldReceive('hasAward')
            ->once()
            ->with('ESWP')
            ->andReturn(false);
        $mockUser->shouldReceive('hasAward')
            ->once()
            ->with('OSWP')
            ->andReturn(true);
        $mockUser->shouldReceive('getNumExams')
            ->once()
            ->andReturn(80);
        $mockUser->shouldReceive('hasAward')
            ->once()
            ->with('MCAM')
            ->andReturn(true);
        $mockUser->shouldReceive('addUpdateAward')
            ->once()
            ->with([ 'MCAM' => [
                'count' => 2,
                'location' => 'L',
                'award_date' => [
                    '1970-01-01',
                    '2025-10-01',
                ],
                'display' => true
            ]])->andReturn(true);
        $mockUser->shouldReceive('addServiceHistoryEntry')
            ->once()
            ->with([
                'timestamp' => 1759276800,
                'event' => 'Second Manticore Combat Action Medal earned on 2025-10-01'
            ])->andReturn(true);

        // Act
        $results = $mockUser->mcamQual();

        // Assert
        $this->assertTrue($results);
        $this->assertDatabaseHas(
            AwardLog::class,
            [
                'timestamp' => strtotime('2025-10-01'),
                'member_id' => 'MEMBER-ID',
                'award' => 'MCAM',
                'qty' => 2
            ]);
    }

    // Test numToNextMcam

    // Test percentNextMcamLeft

    // Test percentNextMcamDone

    // Test swpQual

    public function testIsPassingGrade69ReturnsFalse() : void
    {
        // Arrange
        $mock = new class {
            use AwardQualification;
        };

        // Act
        $result = $mock->isPassingGrade('69%');

        // Assert
        $this->assertFalse($result);
    }

    public function testIsPassingGrade70ReturnsTrue() : void
    {
        // Arrange
        $mock = new class {
            use AwardQualification;
        };

        // Act
        $result = $mock->isPassingGrade('70%');

        // Assert
        $this->assertTrue($result);
    }

    public function testIsPassingGradeBeta50ReturnsTrue() : void
    {
        // Arrange
        $mock = new class {
            use AwardQualification;
        };

        // Act
        $result = $mock->isPassingGrade('BETA 50%');

        // Assert
        $this->assertTrue($result);
    }

    public function testIsPassingGradePass50ReturnsTrue() : void
    {
        // Arrange
        $mock = new class {
            use AwardQualification;
        };

        // Act
        $result = $mock->isPassingGrade('PASS 50%');

        // Assert
        $this->assertTrue($result);
    }

    public function testIsPassingGradeCrea50ReturnsTrue() : void
    {
        // Arrange
        $mock = new class {
            use AwardQualification;
        };

        // Act
        $result = $mock->isPassingGrade('CREA 50%');

        // Assert
        $this->assertTrue($result);
    }
}
