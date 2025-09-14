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

use App\Models\Grade;
use App\Models\Rating;
use App\Models\User;
use Carbon\Carbon;
use Database\Seeders\BilletSeeder;
use Database\Seeders\GradeSeeder;
use Database\Seeders\RatingSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Mockery;
use PHPUnit\Framework\Attributes\PreserveGlobalState;
use PHPUnit\Framework\Attributes\RunClassInSeparateProcess;
use Tests\TestCase;

#[PreserveGlobalState(false)]
#[RunClassInSeparateProcess]
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

    public function testRouteNotificationForMailGivenEmailReturned(): void
    {
        // Arrange
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->email_address = 'someone@example.com';

        // Act
        $email = $mockUser->routeNotificationForMail();

        // Assert
        $this->assertEquals('someone@example.com', $email);
    }

    public function testGetEmailForPasswordResetGivenEmailReturned(): void
    {
        // Arrange
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->email_address = 'someone@example.com';

        // Act
        $email = $mockUser->getEmailForPasswordReset();

        // Assert
        $this->assertEquals('someone@example.com', $email);
    }

    public function testGetGreetingAndNameReturnsCorrectValue(): void
    {
        // Arrange
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->shouldReceive('getGreeting')
            ->once()
            ->andReturn('Greeting');
        $mockUser->shouldReceive('getFullName')
            ->once()
            ->andReturn('Fullname');

        // Act
        $result = $mockUser->getGreetingAndName();

        //
        $this->assertEquals('Greeting Fullname', $result);
    }

    public function testGetByBilletIdPresidentIdReturnsPresident(): void
    {
        // Arrange
        $this->seed(BilletSeeder::class);
        $this->seed(UserSeeder::class);

        // Act
        $results = User::getByBilletId('55fa1800e4bed82e078b4972');

        // Assert
        $this->assertInstanceOf(User::class, $results);
        $this->assertEquals('A0000011', $results->member_id);
    }

    public function testGetByBilletIdBadIdReturnsNull(): void
    {
        // Arrange
        $this->seed(BilletSeeder::class);
        $this->seed(UserSeeder::class);

        // Act
        $results = User::getByBilletId('bad-id');

        // Assert
        $this->assertNull($results);
    }

    public function testGetGreetingAndNameByBilletIdValidBilletGreetingAndNameReturned(): void
    {
        // Arrange
        $this->seed(BilletSeeder::class);
        $this->seed(GradeSeeder::class);
        $this->seed(RatingSeeder::class);
        $this->seed(UserSeeder::class);

        // Act
        $results = User::getGreetingAndNameByBilletId('55fa1800e4bed82e078b4972');

        // Assert
        $this->assertEquals('Admiral of the Green David Kilback', $results);

    }

    public function testGetGreetingAndNameByBilletIdInvalidBilletBlankStringReturned(): void
    {
        // Arrange
        $this->seed(BilletSeeder::class);
        $this->seed(GradeSeeder::class);
        $this->seed(RatingSeeder::class);
        $this->seed(UserSeeder::class);

        // Act
        $results = User::getGreetingAndNameByBilletId('bad-id');

        // Assert
        $this->assertEquals('', $results);

    }

    public function testGetFullNameFirstNoMiddleLastNoSuffixExpectedReturn(): void
    {
        // Arrange
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->first_name = 'First';
        $mockUser->last_name = 'Last';

        // Act
        $result = $mockUser->getFullName();

        // Assert
        $this->assertEquals('First Last', $result);
    }

    public function testGetFullNameFirstNoMiddleLastSuffixExpectedReturn()
    {
        // Arrange
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->first_name = 'First';
        $mockUser->last_name = 'Last';
        $mockUser->suffix = 'Jr';

        // Act
        $result = $mockUser->getFullName();

        // Assert
        $this->assertEquals('First Last Jr', $result);
    }

    public function testGetFullNameFirstMiddleLastSuffixExpectedReturn()
    {
        // Arrange
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->first_name = 'First';
        $mockUser->middle_name = 'Middle';
        $mockUser->last_name = 'Last';
        $mockUser->suffix = 'Jr';

        // Act
        $result = $mockUser->getFullName();

        // Assert
        $this->assertEquals('First Middle Last Jr', $result);
    }

    public function testGetFullNameFirstNoMiddleLastNoSuffixLastFirstExpectedReturn()
    {
        // Arrange
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->first_name = 'First';
        $mockUser->last_name = 'Last';

        // Act
        $result = $mockUser->getFullName(true);

        // Assert
        $this->assertEquals('Last, First', $result);
    }

    public function testGetFullNameFirstNoMiddleLastSuffixLastFirstExpectedReturn()
    {
        // Arrange
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->first_name = 'First';
        $mockUser->last_name = 'Last';
        $mockUser->suffix = 'Jr';

        // Act
        $result = $mockUser->getFullName(true);

        // Assert
        $this->assertEquals('Last Jr, First', $result);
    }

    public function testGetFullNameFirstMiddleLastSuffixLastFirstExpectedReturn()
    {
        // Arrange
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->first_name = 'First';
        $mockUser->middle_name = 'Middle';
        $mockUser->last_name = 'Last';
        $mockUser->suffix = 'Jr';

        // Act
        $result = $mockUser->getFullName(true);

        // Assert
        $this->assertEquals('Last Jr, First Middle', $result);
    }

    public function testGetGreetingNoRatingGetRank(): void
    {
        // Arrange
        $this->seed(GradeSeeder::class);
        $this->seed(UserSeeder::class);
        $user = User::where('email_address', '4sl@example.com')->first();

        // Act
        $result = $user->getGreeting();

        // Assert
        $this->assertEquals('Admiral of the Green', $result);
    }

    public function testGetGreetingWithRatingGet(): void
    {
        // Arrange
        $this->seed(GradeSeeder::class);
        $this->seed(UserSeeder::class);
        $this->seed(RatingSeeder::class);
        $user = User::where('email_address', 'robin1@example.com')->first();
        $user->rating = 'SRN-05';

        // Act
        $result = $user->getGreeting();

        // Assert
        $this->assertEquals('Coxswain 3/c', $result);
    }

    public function testGetGreetingArrayReturnsCorrectArray(): void
    {
        // Arrange
        $user = User::factory()->make([
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

    public function testGetDisplayRankNoBranchRankNoRatingExpectedResult(): void
    {
        // Arrange
        $gradeDetails = [
            'grade' => 'O-6-B',
            'rank' => [
                'RMN' => 'Captain (SG)'
            ]
        ];
        $rank = [
            'grade' => 'O-6-B',
        ];
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->rank = $rank;

        $mockGrade = Mockery::mock('alias:' . Grade::class);
        $mockGrade->shouldReceive('where')
            ->with('grade', '=', 'O-6-B')
            ->once()
            ->andReturnSelf();
        $mockGrade->shouldReceive('first')
            ->once()
            ->andReturn((object)$gradeDetails);
        $this->app->instance(Grade::class, $mockGrade);

        // Act
        $results = $mockUser->getDisplayRank();

        // Assert
        $this->assertTrue($results);
        $this->assertEquals('Captain (SG)', $mockUser->rank_title);
        $this->assertEquals('RMN', $mockUser->branch);
    }

    public function testGetDisplayRankCivilianNoRatingExpectedResult(): void
    {
        // Arrange
        $gradeDetails = [
            'grade' => 'C-12',
            'rank' => [
                'CIVIL' => 'Civilian Twelve'
            ]
        ];
        $rank = [
            'grade' => 'C-12',
        ];
        $ratingDetails = [
            'rate_code' => 'DIPLOMATIC',
            'rate' => [
                'description' => 'Some description',
                'CIVIL' => [
                    'C-12' => 'Vice Consul'
                ]
            ]
        ];
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->branch = 'CIVIL';
        $mockUser->rank = $rank;
        $mockUser->shouldReceive('save')
            ->once();

        $mockGrade = Mockery::mock('alias:' . Grade::class);
        $mockGrade->shouldReceive('where')
            ->with('grade', '=', 'C-12')
            ->once()
            ->andReturnSelf();
        $mockGrade->shouldReceive('first')
            ->once()
            ->andReturn((object)$gradeDetails);
        $this->app->instance(Grade::class, $mockGrade);

        $mockRating = Mockery::mock('alias:' . Rating::class);
        $mockRating->shouldReceive('where')
            ->with('rate_code', '=', 'DIPLOMATIC')
            ->once()
            ->andReturnSelf();
        $mockRating->shouldReceive('first')
            ->once()
            ->andReturn((object)$ratingDetails);
        $this->app->instance(Rating::class, $mockRating);


        // Act
        $results = $mockUser->getDisplayRank();

        // Assert
        $this->assertTrue($results);
        $this->assertEquals('Civilian Twelve', $mockUser->rank_title);
        $this->assertEquals(['rate' => 'DIPLOMATIC', 'description' => 'Some description'], $mockUser->rating);
    }

    public function testGetDisplayRankRMNRatingExpectedResult(): void
    {
        // Arrange
        $gradeDetails = [
            'grade' => 'E-3',
            'rank' => [
                'FOO' => 'Spacer 1st Class'
            ]
        ];
        $rank = [
            'grade' => 'E-3',
        ];
        $rating = [
            'rate' => 'Some rate',
        ];
        $ratingDetails = [
            'rate_code' => 'Some rate',
            'rate' => [
                'description' => 'Some description',
                'RMN' => [
                    'E-3' => 'Some rating'
                ]
            ]
        ];
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->branch = 'RMN';
        $mockUser->rank = $rank;
        $mockUser->rating = $rating;
        $mockUser->shouldReceive('save')
            ->never();

        $mockGrade = Mockery::mock('alias:' . Grade::class);
        $mockGrade->shouldReceive('where')
            ->with('grade', '=', 'E-3')
            ->once()
            ->andReturnSelf();
        $mockGrade->shouldReceive('first')
            ->once()
            ->andReturn((object)$gradeDetails);
        $this->app->instance(Grade::class, $mockGrade);

        $mockRating = Mockery::mock('alias:' . Rating::class);
        $mockRating->shouldReceive('where')
            ->with('rate_code', '=', 'Some rate')
            ->once()
            ->andReturnSelf();
        $mockRating->shouldReceive('first')
            ->once()
            ->andReturn((object)$ratingDetails);
        $this->app->instance(Rating::class, $mockRating);

        // Act
        $results = $mockUser->getDisplayRank();

        // Assert
        $this->assertTrue($results);
        $this->assertEquals('E-3', $mockUser->rank_title);
        $this->assertEquals(['rate' => 'Some rate', 'description' => 'Some description'], $mockUser->rating);
    }

    public function testGetRateRMNNoRatingReturnsNull(): void
    {
        // Arrange
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->branch = 'RMN';

        // Act
        $returns = $mockUser->getRate();

        // Assert
        $this->assertNull($returns);
    }

    public function testGetRateCivilNoRatingReturnsDiplomatic(): void
    {
        // Arrange
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->branch = 'CIVIL';

        // Act
        $returns = $mockUser->getRate();

        // Assert
        $this->assertEquals('DIPLOMATIC', $returns);
    }

    public function testGetRateRMMMNoRatingReturnsBasic(): void
    {
        // Arrange
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->branch = 'RMMM';

        // Act
        $returns = $mockUser->getRate();

        // Assert
        $this->assertEquals('BASIC', $returns);
    }

    public function testGetRateRMMMRatingReturnsValue(): void
    {
        // Arrange
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->branch = 'RMMM';
        $mockUser->rating = 'FOO';

        // Act
        $returns = $mockUser->getRate();

        // Assert
        $this->assertEquals('FOO', $returns);
    }

    public function testGetRateRMMMRatingArrayReturnsValue(): void
    {
        // Arrange
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->branch = 'RMMM';
        $mockUser->rating = [
            'rate'  => 'BAR'
        ];

        // Act
        $returns = $mockUser->getRate();

        // Assert
        $this->assertEquals('BAR', $returns);
    }

    // Test getRateTitle

    // Test getDateOfRank

    // Test getPostNominals

    // Test getPostnominalsFromAwards

    // Test getPostnominalsFromPeerages

    // Test getPeerages

    // Test getNameofLands

    // Test getAssignedShip

    // Test isFleetCO

    // Test isCoAssignedShip

    // Test isCommandingOfficer

    // Test findAssignment

    // Test getAssignmentId

    // Test getFullAssignmentInfo

    // Test getIndividualAssignmentAttribute

    // Test getPrimaryAssignmentId

    // Test getSecondaryAssignmentId

    // Test getAssignmentName

    // Test getPrimaryAssignmentName

    // Test getSecondaryAssignmentName

    // Test getAssignmentDesignation

    // Test getAssignmentType

    // Test getChapterAssignmentAttribute

    // Test getPrimaryAssignmentDesignation

    // Test getSecondaryAssignmentDesignation

    // Test getBillet

    // Test getPrimaryBillet

    // Test getSecondaryBillet

    // Test getDateAssigned

    // Test getPrimaryDateAssigned

    // Test getSecondaryDateAssigned

    // Test getBilletForChapter

    // Test getTimeInGrade

    // Test getTimeInService

    // Test getExamList

    // Test getHighestExamFromList

    // Test getHighestMainLineExamForBranch

    // Test getHighestEnlistedExam

    // Test getHighestWarrantExam

    // Test getHighestOfficerExam

    // Test getHighestFlagExam

    // Test getHighestExams

    // Test getCompletedExams

    // Test getExamLastUpdated

    // Test hasNewExams

    // Test assignCOPerms

    // Test assignAllPerms

    // Test assignBuShipPerms

    // Test assignBuPersPerms

    // Test assignSpaceLordPerms

    // Test updatePerms

    // Test deletePerm

    // Test deletePeerage

    // Test buildIdCard

    // Test normalizeStateProvince

    // Test getNextAvailableMemberId

    // Test getFirstAvailableMemberId

    // Test getMemberIds

    // Test getReminderEmail

    // Test getAuthIdentifer

    // Test getAuthPassword

    public function testUpdateLastLoginUpdatesRecordInDatabase(): void
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

    public function testUpdateLastLoginSavedAsPreviousLoginInRecordInDatabase(): void
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

    // Test getLastUpdated

    // Test updateLastUpdated

    // Test checkRostersForNewExams

    // Test getScheduledEvents

    // Test checkMemberIn

    // Test setTimeZone

    // Test getUserByMemberId

    // Test getCurrentAwards

    // Test getRibbons

    // Test hasAwards

    // Test getUnitPatchPath

    // Test findForPassport

    // Test hasAward

    // Test addUpdateAward

    // Test setPath

    // Test setPromotionPointValue

    // Test getPointsFromAwards

    // Test getPointsFromTimeInService

    // Test getPointsFromExams

    // Test getTotalPromotionPoints

    // Test getGPA

    // Test getPath

    // Test hasRequiredExams

    // Test addServiceHistoryEntry

    // Test getActiveUsers

    // Test getArmyWeaponBadges

    // Test findByEmail

    // Test findByName
}
