<?php

namespace App\Models;

/**
 * Mock date function to use in the testing of the User model.
 *
 * @param string $format
 * @param int|null $timestamp
 * @return string
 */
function date(string $format, ?int $timestamp = null): string
{
    if ($format == 'Y-m-d') {
        if (is_null($timestamp)) {
            return '2025-08-21';
        } elseif ($timestamp == 1752235994) {
            return '2025-07-11';
        } else {
            return '2025-08-07';
        }
    } else {
        if (is_null($timestamp)) {
            return '2025-08-21 20:24:05';
        } else {
            return '2025-08-07 20:24:05';
        }
    }
}

namespace Tests\Unit;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Mockery;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        Carbon::setTestNow(Carbon::create(2025, 9, 1, 10, 0, 0));
    }

    public function testGetAgeExpectedAgeReturned(): void
    {
        // Arrange
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->dob = Carbon::now()->subYears(20);

        // Act
        $age = $mockUser->getAge();

        // Assert
        $this->assertEquals(20, $age);
    }

    public function testGetNumExamsReturnsPassingGradeCountOnly(): void
    {
        // Arrange
        $mockUser = Mockery::mock(User::class)->makePartial();
        $exams = [
            'SIA-SRN-01C' => [
                'score' => '100%'
            ],
            'SIA-SRN-31C' => [
                'score' => '100%'
            ],
            'SIA-SRN-05D' => [
                'score' => '100%'
            ],
            'SIA-SRN-06D' => [
                'score' => '100%'
            ],
            'SIA-SRN-11D' => [
                'score' => '100%'
            ],
            'SIA-SRN-14D' => [
                'score' => '60%'
            ],
        ];
        $mockUser->shouldReceive('getExamList')
            ->once()
            ->andReturn($exams);

        // Act
        $numExams = $mockUser->getNumExams();

        // Assert
        $this->assertEquals(5, $numExams);
    }


    public function testGetGreetingArrayReturnsCorrectArray(): void
    {
        // Arrange
        $user = User::factory()->create([
            'rank' => [
                'grade' => 'Commander',
            ],
            'last_name' => 'Spock',
        ]);

        // Act
        $array = $user->getGreetingArray();

        // Assert
        $this->assertEquals($array['rank'], 'Commander', 'Rank is incorrect');
        $this->assertEquals($array['last_name'], 'Spock', 'Last name is incorrect');
    }

    public function testUpdateFirstLoginLastLoginUpdatesRecordInDatabase(): void
    {
        // Arrange
        $user = User::factory()->create();

        // Act
        $user->updateLastLogin();

        // Assert
        $actualUser = User::find($user->id);

        $this->assertNull($actualUser->previous_login, 'Previous login value is incorrect');
        $this->assertEquals('2025-08-21 20:24:05', $actualUser->last_login, 'Last login value is incorrect');
    }

    public function testUpdateFirstLoginLastLoginSavedAsPreviousLoginInRecordInDatabase(): void
    {
        // Arrange
        $user = User::factory()->create([
            'last_login' => '2025-08-19 11:12:13'
        ]);

        // Act
        $user->updateLastLogin();

        // Assert
        $actualUser = User::find($user->id);

        $this->assertEquals('2025-08-19 11:12:13', $actualUser->previous_login, 'Previous login value is incorrect');
        $this->assertEquals('2025-08-21 20:24:05', $actualUser->last_login, 'Last login value is incorrect');
    }

    public function testGetPreviousLoginPreviousUnsetDateReturned(): void
    {
        // Arrange
        $user = User::factory()->create();

        // Act
        $result = $user->getPreviousLogin();

        // Assert
        $this->assertEquals('2025-08-07', $result, 'Previous login value is incorrect');
    }

    public function testGetPreviousLoginPreviousSetDateReturned(): void
    {
        // Arrange
        $user = User::factory()->create([
            'previous_login' => '2025-07-11 12:13:14',
        ]);

        // Act
        $result = $user->getPreviousLogin();

        // Assert
        $this->assertEquals('2025-07-11', $result, 'Previous login value is incorrect');
    }
}
