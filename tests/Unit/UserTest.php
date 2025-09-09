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


    // Test getByBilletId

    // Test getGreetingAndNameByBilletId

    // Test getFullName

    // Test getGreeting

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

    // Test getDisplayRank

    // Test getRate

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
