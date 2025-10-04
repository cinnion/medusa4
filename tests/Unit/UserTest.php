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

use App\Models\Award;
use App\Models\Exam;
use App\Models\Grade;
use App\Models\Rating;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Mockery;
use PHPUnit\Framework\Attributes\PreserveGlobalState;
use PHPUnit\Framework\Attributes\RunInSeparateProcess;
use Tests\TestCase;

class UserTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        shell_exec('php artisan migrate:fresh --seed');
    }

    public function setUp(): void
    {
        parent::setUp();
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

        // Act
        $results = User::getByBilletId('55fa1800e4bed82e078b4972');

        // Assert
        $this->assertInstanceOf(User::class, $results);
        $this->assertEquals('A0000011', $results->member_id);
    }

    public function testGetByBilletIdBadIdReturnsNull(): void
    {
        // Arrange

        // Act
        $results = User::getByBilletId('bad-id');

        // Assert
        $this->assertNull($results);
    }

    public function testGetGreetingAndNameByBilletIdValidBilletGreetingAndNameReturned(): void
    {
        // Arrange

        // Act
        $results = User::getGreetingAndNameByBilletId('55fa1800e4bed82e078b4972');

        // Assert
        $this->assertEquals('Admiral of the Green David Kilback', $results);

    }

    public function testGetGreetingAndNameByBilletIdInvalidBilletBlankStringReturned(): void
    {
        // Arrange

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
        $user = User::where('email_address', '4sl@example.com')->first();

        // Act
        $result = $user->getGreeting();

        // Assert
        $this->assertEquals('Admiral of the Green', $result);
    }

    public function testGetGreetingWithRatingGet(): void
    {
        // Arrange
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

    #[RunInSeparateProcess]
    #[PreserveGlobalState(false)]
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
            ->with('grade', 'O-6-B')
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

    #[RunInSeparateProcess]
    #[PreserveGlobalState(false)]
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
            ->with('grade', 'C-12')
            ->once()
            ->andReturnSelf();
        $mockGrade->shouldReceive('first')
            ->once()
            ->andReturn((object)$gradeDetails);
        $this->app->instance(Grade::class, $mockGrade);

        $mockRating = Mockery::mock('alias:' . Rating::class);
        $mockRating->shouldReceive('where')
            ->with('rate_code', 'DIPLOMATIC')
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

    #[RunInSeparateProcess]
    #[PreserveGlobalState(false)]
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
            ->with('grade', 'E-3')
            ->once()
            ->andReturnSelf();
        $mockGrade->shouldReceive('first')
            ->once()
            ->andReturn((object)$gradeDetails);
        $this->app->instance(Grade::class, $mockGrade);

        $mockRating = Mockery::mock('alias:' . Rating::class);
        $mockRating->shouldReceive('where')
            ->with('rate_code', 'Some rate')
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
            'rate' => 'BAR'
        ];

        // Act
        $returns = $mockUser->getRate();

        // Assert
        $this->assertEquals('BAR', $returns);
    }

    public function testGetRateTitleRatingArrayTitleFoundReturnsTitle(): void
    {
        // Arrange
        $user = User::factory()->make([
            'branch' => 'RMN',
            'rating' => [
                'rate' => 'SRN-05',
                'description' => 'Some description'
            ]
        ]);

        // Act
        $results = $user->getRateTitle('E-10');

        // Assert
        $this->assertEquals('Senior Master Chief Coxswain', $results);
    }

    public function testGetRateTitleRatingStringTitleFoundReturnsTitle(): void
    {
        // Arrange
        $user = User::factory()->make([
            'branch' => 'RMN',
            'rating' => 'SRN-05',
        ]);

        // Act
        $results = $user->getRateTitle('E-10');

        // Assert
        $this->assertEquals('Senior Master Chief Coxswain', $results);
    }

    public function testGetRateTitleRatingStringTitleNotFoundReturnsFalse(): void
    {
        // Arrange
        $user = User::factory()->make([
            'branch' => 'RMN',
            'rating' => 'SRN-XX',
        ]);

        // Act
        $results = $user->getRateTitle('E-10');

        // Assert
        $this->assertFalse($results);
    }

    public function testGetDateOfRankGivenDateReturned(): void
    {
        // Arrange
        $user = User::factory()->make([
            'rank' => [
                'grade' => 'O-6-A',
                'date_of_rank' => '2025-09-01'
            ]
        ]);

        // Act
        $results = $user->getDateOfRank();

        // Assert
        $this->assertEquals('2025-09-01', $results);
    }

    #[RunInSeparateProcess]
    #[PreserveGlobalState(false)]
    public function testGetPostnominalsHasAwardsReturnsAwardPostnominals(): void
    {
        // Arrange
        $userMock = Mockery::mock(User::class)->makePartial();
        $userMock->awards = [
            'SC' => [
                'count' => 1,
                'location' => 'L',
                'award_date' => [ '2020-01-01' ],
                'display' => true,
            ],
            'QBM' => [
                'count' => 1,
                'location' => 'L',
                'award_date' => [ '2020-01-01' ],
                'display' => true,
            ]
        ];
        $userMock->peerages = [
            [
                'title' => 'Knight',
                'code' => 'K',
                'precedence' => 5,
                'postnominal' => 'GCE',
            ]
        ];
        $awardMock = Mockery::mock('alias:' . Award::class)->makePartial();
        $awardMock->shouldReceive('getAwardByCode')
            ->once()
            ->with('SC')
            ->andReturn((object)[
                'display_order' => 22,
                'post_nominal' => 'ABC',
            ]);
        $awardMock->shouldReceive('getAwardByCode')
            ->once()
            ->with('QBM')
            ->andReturn((object)[
                'display_order' => 33,
                'post_nominal' => 'XYZ',
            ]);
        $this->app->instance(Award::class, $awardMock);

        // Act
        $results = $userMock->getPostnominals();

        // Assert
        $this->assertEquals(', ABC, XYZ', $results);
    }

    #[RunInSeparateProcess]
    #[PreserveGlobalState(false)]
    public function testGetPostnominalsHasAwardsNoPostnominalsReturnsNull(): void
    {
        // Arrange
        $userMock = Mockery::mock(User::class)->makePartial();
        $userMock->awards = [
            'SC' => [
                'count' => 1,
                'location' => 'L',
                'award_date' => [ '2020-01-01' ],
                'display' => true,
            ],
            'QBM' => [
                'count' => 1,
                'location' => 'L',
                'award_date' => [ '2020-01-01' ],
                'display' => true,
            ]
        ];
        $userMock->peerages = [
            [
                'title' => 'Knight',
                'code' => 'K',
                'precedence' => 5,
                'postnominal' => 'GCE',
            ]
        ];
        $awardMock = Mockery::mock('alias:' . Award::class)->makePartial();
        $awardMock->shouldReceive('getAwardByCode')
            ->once()
            ->with('SC')
            ->andReturn((object)[
                'display_order' => 22,
                'post_nominal' => null,
            ]);
        $awardMock->shouldReceive('getAwardByCode')
            ->once()
            ->with('QBM')
            ->andReturn((object)[
                'display_order' => 33,
                'post_nominal' => '',
            ]);
        $this->app->instance(Award::class, $awardMock);

        // Act
        $results = $userMock->getPostnominals();

        // Assert
        $this->assertNull($results);
    }

    public function testGetPostnominalsHasNoAwardsReturnsPeeragePostnominals(): void
    {
        // Arrange
        $userMock = Mockery::mock(User::class)->makePartial();
        $userMock->shouldAllowMockingProtectedMethods();
        $userMock->awards = [];
        $userMock->peerages = [
            [
                'title' => 'Knight',
                'code' => 'K',
                'precedence' => 3,
                'postnominal' => 'KSK'
            ],
            [
                'title' => 'Knight',
                'code' => 'K',
                'precedence' => 5,
                'postnominal' => 'GCE',
            ]
        ];

        // Act
        $results = $userMock->getPostnominals();

        // Assert
        $this->assertEquals(', KSK, GCE', $results);
    }

    public function testGetPostnominalsHasNoAwardsReturnsNoPeeragePostnominalsReturnNull(): void
    {
        // Arrange
        $userMock = Mockery::mock(User::class)->makePartial();
        $userMock->awards = [];
        $userMock->peerages = [
            [
                'title' => 'Knight',
                'code' => 'K',
                'precedence' => 3,
                'postnominal' => ''
            ],
            [
                'title' => 'Knight',
                'code' => 'K',
                'precedence' => 5,
                'postnominal' => null,
            ]
        ];

        // Act
        $results = $userMock->getPostnominals();

        // Assert
        $this->assertNull($results);
    }

    public function testGetPostnominalsHasNoAwardsNoPeeragesReturnsNull(): void
    {
        // Arrange
        $userMock = Mockery::mock(User::class)->makePartial();
        $userMock->awards = [];
        $userMock->peerages = [];

        // Act
        $results = $userMock->getPostnominals();

        // Assert
        $this->assertNull($results);
    }

    public function testGetPeeragesNoPeeragesEmptyArrayReturned()
    {
        // Arrange
        $user = User::factory()->make([
            'peerages' => []
        ]);

        // Act
        $results = $user->getPeerages();

        // Assert
        $this->assertIsArray($results);
        $this->assertCount(0, $results);
    }

    public function testGetPeeragesGivenPeeragesDefaultArgumentUnifiedArrayReturned()
    {
        // Arrange
        $user = User::factory()->make([
            'peerages' => [
                [
                    'title' => 'Knight',
                    'code' => 'K',
                    'precedence' => 3,
                    'postnominal' => 'KSK'
                ],
                [
                    'title' => 'Knight',
                    'code' => 'K',
                    'precedence' => 5,
                    'postnominal' => 'GCE'
                ],
                [
                    'title' => 'Baron',
                    'code' => 'B',
                    'precedence' => 4,
                    'postnominal' => 'KSK'
                ],
                [
                    'title' => 'Knight',
                    'code' => '',
                    'precedence' => 24.5,
                    'postnominal' => 'MGL'
                ],
            ]
        ]);
        $expectedArray = [
            '24.5' => [
                'title' => 'Knight',
                'code' => '',
                'precedence' => 24.5,
                'postnominal' => 'MGL'
            ],
            0 => [
                'title' => 'Baron',
                'code' => 'B',
                'precedence' => 4,
                'postnominal' => 'KSK'
            ],
            1 => [
                'title' => 'Knight',
                'code' => 'K',
                'precedence' => 3,
                'postnominal' => 'KSK'
            ],
            2 => [
                'title' => 'Knight',
                'code' => 'K',
                'precedence' => 5,
                'postnominal' => 'GCE'
            ],
        ];

        // Act
        $results = $user->getPeerages();

        // Assert
        $this->assertIsArray($results);
        $this->assertCount(4, $results);
        $this->assertEquals($expectedArray, $results);
    }

    public function testGetPeeragesGivenPeeragesTrueArgumentAssociativeArrayReturned()
    {
        // Arrange
        $user = User::factory()->make([
            'peerages' => [
                [
                    'title' => 'Knight',
                    'code' => 'K',
                    'precedence' => 3,
                    'postnominal' => 'KSK'
                ],
                [
                    'title' => 'Knight',
                    'code' => 'K',
                    'precedence' => 5,
                    'postnominal' => 'GCE'
                ],
                [
                    'title' => 'Baron',
                    'code' => 'B',
                    'precedence' => 4,
                    'postnominal' => 'KSK'
                ],
                [
                    'title' => 'Knight',
                    'code' => '',
                    'precedence' => 24.5,
                    'postnominal' => 'MGL'
                ],
            ]
        ]);
        $expectedArray = [
            'landed' => [
                4 => [
                    'title' => 'Baron',
                    'code' => 'B',
                    'precedence' => 4,
                    'postnominal' => 'KSK'
                ],
                '24.5' => [
                    'title' => 'Knight',
                    'code' => '',
                    'precedence' => 24.5,
                    'postnominal' => 'MGL'
                ],
            ],
            'knighthoods' => [
                3 => [
                    'title' => 'Knight',
                    'code' => 'K',
                    'precedence' => 3,
                    'postnominal' => 'KSK'
                ],
                5 => [
                    'title' => 'Knight',
                    'code' => 'K',
                    'precedence' => 5,
                    'postnominal' => 'GCE'
                ],
            ]
        ];

        // Act
        $results = $user->getPeerages(true);

        // Assert
        $this->assertIsArray($results);
        $this->assertCount(2, $results);
        $this->assertEquals($expectedArray, $results);
    }

    public function testGetNameOfLandsNoLandsExpectedNameReturned(): void
    {
        // Arrange
        $user = User::factory()->make([
            'peerages' => [
                [
                    'title' => 'Knight',
                    'code' => 'K',
                    'precedence' => 3,
                    'postnominal' => 'KSK'
                ],
                [
                    'title' => 'Knight',
                    'code' => 'K',
                    'precedence' => 5,
                    'postnominal' => 'GCE'
                ],
                [
                    'title' => 'Baron',
                    'code' => 'B',
                    'precedence' => 4,
                    'postnominal' => 'KSK'
                ],
                [
                    'title' => 'Knight',
                    'code' => '',
                    'precedence' => 24.5,
                    'postnominal' => 'MGL'
                ],
            ]
        ]);

        // Act
        $results = $user->getNameofLands();

        // Assert
        $this->assertNull($results);
    }

    public function testGetNameOfLandsGivenLandsExpectedNameReturned(): void
    {
        // Arrange
        $user = User::factory()->make([
            'peerages' => [
                [
                    'title' => 'Knight',
                    'code' => 'K',
                    'precedence' => 3,
                    'postnominal' => 'KSK'
                ],
                [
                    'title' => 'Knight',
                    'code' => 'K',
                    'precedence' => 5,
                    'postnominal' => 'GCE'
                ],
                [
                    'title' => 'Baron',
                    'code' => 'B',
                    'lands' => 'Some lands',
                    'precedence' => 4,
                    'postnominal' => 'KSK'
                ],
                [
                    'title' => 'Knight',
                    'code' => '',
                    'lands' => 'Some other lands',
                    'precedence' => 24.5,
                    'postnominal' => 'MGL'
                ],
            ]
        ]);

        // Act
        $results = $user->getNameofLands();

        // Assert
        $this->assertEquals('Some lands', $results);
    }

    public function testGetAssignedShipStationExpectedChapterIdReturned(): void
    {
        // Arrange
        $user = User::factory()->make([
            'assignment' => [
                [
                    'chapter_id' => '55fa1800e4bed82e078b4794',
                    'chapter_name' => 'HMSS Hephaestus',
                    'billet' => 'Crewman',
                    'date_assigned' => '2015-12-05',
                    'primary' => true
                ]
            ]
        ]);

        // Act
        $results = $user->getAssignedShip();

        // Assert
        $this->assertEquals('55fa1800e4bed82e078b4794', $results);
    }

    public function testGetAssignedShipShipExpectedChapterIdReturned(): void
    {
        // Arrange
        $user = User::factory()->make([
            'assignment' => [
                [
                    'chapter_id' => '55fa1833e4bed832078b45dc',
                    'chapter_name' => 'HMS Achilles',
                    'billet' => 'Crewman',
                    'date_assigned' => '2015-12-05',
                    'primary' => true
                ]
            ]
        ]);

        // Act
        $results = $user->getAssignedShip();

        // Assert
        $this->assertEquals('55fa1833e4bed832078b45dc', $results);
    }

    public function testGetAssignedShipBureauExpectedFalseReturned(): void
    {
        // Arrange
        $user = User::factory()->make([
            'assignment' => [
                [
                    'chapter_id' => '55fa1800e4bed82e078b478a',
                    'chapter_name' => 'BuComm',
                    'billet' => 'Crewman',
                    'date_assigned' => '2015-12-05',
                    'primary' => true
                ]
            ]
        ]);

        // Act
        $results = $user->getAssignedShip();

        // Assert
        $this->assertFalse($results);
    }

    public function testIsFleetCONotCOReturnFalse(): void
    {
        // Arrange
        $user = User::factory()->make([
            'id' => 'ABC123',
            'assignment' => [
                [
                    'chapter_id' => '55fa1833e4bed832078b45dc',
                    'chapter_name' => 'HMS Achilles',
                    'billet' => 'Crewman',
                    'date_assigned' => '2015-12-05',
                    'primary' => true
                ]
            ]
        ]);

        // Act
        $result = $user->isFleetCO();

        // Assert
        $this->assertFalse($result);
    }


    public function testIsFleetCOIsCOReturnTrue(): void
    {
        // Arrange
        $user = User::where('email_address', 'peter@example.com')->first();

        // Act
        $result = $user->isFleetCO();

        // Assert
        $this->assertTrue($result);
    }

    public function testIsCOAssignedShipNotCOExpectFalse(): void
    {
        // Arrange
        $user = User::where('email_address', 'doug@example.com')->first();
        $authUser = User::factory()->make();
        Auth::shouldReceive('user')
            ->times(3)
            ->andReturn($authUser);

        // Act
        $results = $user->isCOAssignedShip();

        // Assert
        $this->assertFalse($results);
    }

    public function testIsCOAssignedShipNotCOAuthUserHasAllPrivExpectTrue(): void
    {
        // Arrange
        $user = User::where('email_address', 'doug@example.com')->first();
        $authUser = User::factory()->make([
            'permissions' => [
                'ALL_PERMS'
            ]
        ]);
        Auth::shouldReceive('user')
            ->times(3)
            ->andReturn($authUser);

        // Act
        $results = $user->isCOAssignedShip();

        // Assert
        $this->assertTrue($results);
    }

    public function testIsCOAssignedShipCOExpectTrue(): void
    {
        // Arrange
        $user = User::where('email_address', 'scott@example.com')->first();
        $authUser = User::factory()->make();
        Auth::shouldReceive('user')
            ->never()
            ->andReturn($authUser);

        // Act
        $results = $user->isCOAssignedShip();

        // Assert
        $this->assertTrue($results);
    }

    public function testFindAssignmentEmptyAssignmentReturnsFalse(): void
    {
        // Arrange
        $user = User::where('email_address', 'peter@example.com')->first();

        // Act
        $results = $user->findAssignment('');

        // Assert
        $this->assertFalse($results);
    }

    public function testFindAssignmentInvalidAssignmentReturnsFalse(): void
    {
        // Arrange
        $user = User::where('email_address', 'peter@example.com')->first();

        // Act
        $results = $user->findAssignment('abc123');

        // Assert
        $this->assertFalse($results);
    }

    public function testFindAssignmentValidAssignmentReturnsAssignment(): void
    {
        // Arrange
        $user = User::where('email_address', 'peter@example.com')->first();
        $expectedAssignment = [
            'chapter_id' => '55fa1833e4bed832078b4580',
            'chapter_name' => 'HSM Excalibur',
            'billet' => 'Embarked Flag Officer',
            'date_assigned' => '2015-12-06',
            'secondary' => true
        ];

        // Act
        $results = $user->findAssignment('55fa1833e4bed832078b4580');

        // Assert
        $this->assertEquals($expectedAssignment, $results);
    }

    public function testGetAssignmentIdDefaultPrimaryAssignmentReturned(): void
    {
        // Arrange
        $user = User::factory()->make([
            'assignment' => [
                [
                    'chapter_id' => 'abc',
                    'chapter_name' => 'HMS ABC',
                    'date_assigned' => '2025-09-01',
                    'billet' => 'Some billet',
                    'primary' => true,
                ],
                [
                    'chapter_id' => 'def',
                    'chapter_name' => 'DEF',
                    'date_assigned' => '2025-09-02',
                    'billet' => 'Some other billet',
                    'secondary' => true,
                ]
            ]
        ]);

        // Act
        $results = $user->getAssignmentId();

        // Assert
        $this->assertEquals('abc', $results);
    }

    public function testGetAssignmentIdSecondaryRequestedSecondaryAssignmentReturned(): void
    {
        // Arrange
        $user = User::factory()->make([
            'assignment' => [
                [
                    'chapter_id' => 'abc',
                    'chapter_name' => 'HMS ABC',
                    'date_assigned' => '2025-09-01',
                    'billet' => 'Some billet',
                    'primary' => true,
                ],
                [
                    'chapter_id' => 'def',
                    'chapter_name' => 'DEF',
                    'date_assigned' => '2025-09-02',
                    'billet' => 'Some other billet',
                    'secondary' => true,
                ]
            ]
        ]);

        // Act
        $results = $user->getAssignmentId('secondary');

        // Assert
        $this->assertEquals('def', $results);
    }

    public function testGetFullAssignmentInfoNoAssignmentsFalseReturned(): void
    {
        // Arrange
        $user = User::factory()->make([
            'assignment' => null,
        ]);

        // Act
        $results = $user->getFullAssignmentInfo();

        // Assert
        $this->assertFalse($results);
    }

    public function testGetFullAssignmentInfoNoPrimaryFieldFalseReturned(): void
    {
        // Arrange
        $user = User::factory()->make([
            'assignment' => [
                [
                    'chapter_id' => 'abc',
                    'chapter_name' => 'HMS ABC',
                    'date_assigned' => '2025-09-01',
                    'billet' => 'Some billet',
                    'secondary' => true,
                ],
                [
                    'chapter_id' => 'def',
                    'chapter_name' => 'DEF',
                    'date_assigned' => '2025-09-02',
                    'billet' => 'Some other billet',
                    'tertiary' => true,
                ]
            ]
        ]);

        // Act
        $results = $user->getFullAssignmentInfo();

        // Assert
        $this->assertFalse($results);
    }

    public function testGetFullAssignmentInfoPrimaryEmptyFieldAssignmentReturned(): void
    {
        // Arrange
        $user = User::factory()->make([
            'assignment' => [
                [
                    'chapter_id' => 'abc',
                    'chapter_name' => 'HMS ABC',
                    'date_assigned' => '2025-09-01',
                    'billet' => 'Some billet',
                    'secondary' => true,
                ],
                [
                    'chapter_id' => 'def',
                    'chapter_name' => 'DEF',
                    'date_assigned' => '2025-09-02',
                    'billet' => 'Some other billet',
                    'primary' => '',
                ]
            ]
        ]);

        // Act
        $results = $user->getFullAssignmentInfo();

        // Assert
        $this->assertFalse($results);
    }

    public function testGetFullAssignmentInfoWantingTertiaryFieldAssignmentReturned(): void
    {
        // Arrange
        $user = User::factory()->make([
            'assignment' => [
                [
                    'chapter_id' => 'abc',
                    'chapter_name' => 'HMS ABC',
                    'date_assigned' => '2025-09-01',
                    'billet' => 'Some billet',
                    'secondary' => true,
                ],
                [
                    'chapter_id' => 'def',
                    'chapter_name' => 'DEF',
                    'date_assigned' => '2025-09-02',
                    'billet' => 'Some other billet',
                    'tertiary' => true,
                ]
            ]
        ]);
        $expectedAssignment = [
            'chapter_id' => 'def',
            'chapter_name' => 'DEF',
            'date_assigned' => '2025-09-02',
            'billet' => 'Some other billet',
            'tertiary' => true,
        ];

        // Act
        $results = $user->getFullAssignmentInfo('tertiary');

        // Assert
        $this->assertEquals($expectedAssignment, $results);
    }

    public function testGetPrimaryAssignmentIdReturnsExpectedId(): void
    {
        // Arrange
        $user = User::factory()->make([
            'assignment' => [
                [
                    'chapter_id' => 'abc',
                    'chapter_name' => 'HMS ABC',
                    'date_assigned' => '2025-09-01',
                    'billet' => 'Some billet',
                    'primary' => true,
                ],
                [
                    'chapter_id' => 'def',
                    'chapter_name' => 'DEF',
                    'date_assigned' => '2025-09-02',
                    'billet' => 'Some other billet',
                    'secondary' => true,
                ]
            ]
        ]);

        // Act
        $results = $user->getPrimaryAssignmentId();

        // Assert
        $this->assertEquals('abc', $results);
    }

    public function testGetSecondaryAssignmentIdReturnsExpectedId(): void
    {
        // Arrange
        $user = User::factory()->make([
            'assignment' => [
                [
                    'chapter_id' => 'abc',
                    'chapter_name' => 'HMS ABC',
                    'date_assigned' => '2025-09-01',
                    'billet' => 'Some billet',
                    'primary' => true,
                ],
                [
                    'chapter_id' => 'def',
                    'chapter_name' => 'DEF',
                    'date_assigned' => '2025-09-02',
                    'billet' => 'Some other billet',
                    'secondary' => true,
                ]
            ]
        ]);

        // Act
        $results = $user->getSecondaryAssignmentId();

        // Assert
        $this->assertEquals('def', $results);
    }

    public function testGetAssignmentNameDefaultPositionReturnsPrimaryName(): void
    {
        // Arrange
        $user = User::where('email_address', 'peter@example.com')->first();

        // Act
        $results = $user->getAssignmentName();

        // Assert
        $this->assertEquals('San Martino Fleet', $results);
    }

    public function testGetAssignmentNameSecondaryPositionReturnsSecondaryName(): void
    {
        // Arrange
        $user = User::where('email_address', 'peter@example.com')->first();

        // Act
        $results = $user->getAssignmentName('secondary');

        // Assert
        $this->assertEquals('HMS Excalibur', $results);
    }

    public function testGetPrimaryAssignmentNameReturnsPrimaryName(): void
    {
        // Arrange
        $user = User::where('email_address', 'peter@example.com')->first();

        // Act
        $results = $user->getPrimaryAssignmentName();

        // Assert
        $this->assertEquals('San Martino Fleet', $results);
    }

    public function testGetSecondaryAssignmentNameReturnsSecondaryName(): void
    {
        // Arrange
        $user = User::where('email_address', 'peter@example.com')->first();

        // Act
        $results = $user->getSecondaryAssignmentName();

        // Assert
        $this->assertEquals('HMS Excalibur', $results);
    }

    public function testGetAssignmentDesignationDefaultReturnsPrimaryDesignation(): void
    {
        // Arrange
        $user = User::where('email_address', 'peter@example.com')->first();

        // Act
        $results = $user->getAssignmentDesignation();

        // Assert
        $this->assertEquals('3', $results);
    }

    public function testGetAssignmentDesignationSecondaryReturnsSecondaryDesignation(): void
    {
        // Arrange
        $user = User::where('email_address', 'peter@example.com')->first();

        // Act
        $results = $user->getAssignmentDesignation('secondary');

        // Assert
        $this->assertEquals('BC-749', $results);
    }

    public function testGetAssignmentTypeDefaultReturnsPrimaryType(): void
    {
        // Arrange
        $user = User::where('email_address', 'peter@example.com')->first();

        // Act
        $results = $user->getAssignmentType();

        // Assert
        $this->assertEquals('fleet', $results);
    }

    public function testGetAssignmentTypeSecondaryReturnsSecondaryType(): void
    {
        // Arrange
        $user = User::where('email_address', 'peter@example.com')->first();

        // Act
        $results = $user->getAssignmentType('secondary');

        // Assert
        $this->assertEquals('ship', $results);
    }

    public function testGetPrimaryAssignmentDesignationReturnsPrimaryDesignation(): void
    {
        // Arrange
        $user = User::where('email_address', 'peter@example.com')->first();

        // Act
        $results = $user->getPrimaryAssignmentDesignation();

        // Assert
        $this->assertEquals('3', $results);
    }

    public function testGetSecondaryAssignmentDesignationReturnsSecondaryDesignation(): void
    {
        // Arrange
        $user = User::where('email_address', 'peter@example.com')->first();

        // Act
        $results = $user->getSecondaryAssignmentDesignation();

        // Assert
        $this->assertEquals('BC-749', $results);
    }

    public function testGetBilletDefaultReturnsPrimaryBillet(): void
    {
        // Arrange
        $user = User::where('email_address', 'peter@example.com')->first();

        // Act
        $results = $user->getBillet();

        // Assert
        $this->assertEquals('Commanding Officer', $results);
    }

    public function testGetBilletSecondarySpecifiedReturnsSecondaryBillet(): void
    {
        // Arrange
        $user = User::where('email_address', 'peter@example.com')->first();

        // Act
        $results = $user->getBillet('secondary');

        // Assert
        $this->assertEquals('Embarked Flag Officer', $results);
    }

    public function testGetPrimaryBilletReturnsPrimaryBillet(): void
    {
        // Arrange
        $user = User::where('email_address', 'peter@example.com')->first();

        // Act
        $results = $user->getPrimaryBillet();

        // Assert
        $this->assertEquals('Commanding Officer', $results);
    }

    public function testGetSecondaryBilletReturnsSecondaryBillet(): void
    {
        // Arrange
        $user = User::where('email_address', 'peter@example.com')->first();

        // Act
        $results = $user->getSecondaryBillet();

        // Assert
        $this->assertEquals('Embarked Flag Officer', $results);
    }

    public function testGetDateAssignedDefaultReturnsPrimaryDateAssigned(): void
    {
        // Arrange
        $user = User::where('email_address', 'peter@example.com')->first();

        // Act
        $results = $user->getDateAssigned();

        // Assert
        $this->assertEquals('2015-12-05', $results);
    }

    public function testGetDateAssignedSecondarySpecifiedReturnsSecondaryDateAssigned(): void
    {
        // Arrange
        $user = User::where('email_address', 'peter@example.com')->first();

        // Act
        $results = $user->getDateAssigned('secondary');

        // Assert
        $this->assertEquals('2015-12-06', $results);
    }

    public function testGetPrimaryDateAssignedReturnsPrimaryDateAssigned(): void
    {
        // Arrange
        $user = User::where('email_address', 'peter@example.com')->first();

        // Act
        $results = $user->getPrimaryDateAssigned();

        // Assert
        $this->assertEquals('2015-12-05', $results);
    }

    public function testGetSecondaryDateAssignedReturnsSecondaryDateAssigned(): void
    {
        // Arrange
        $user = User::where('email_address', 'peter@example.com')->first();

        // Act
        $results = $user->getSecondaryDateAssigned();

        // Assert
        $this->assertEquals('2015-12-06', $results);
    }

    public function testGetBilletForChapterValidChapterCorrectBilletReturned(): void
    {
        // Arrange
        $user = User::where('email_address', 'peter@example.com')->first();

        // Act
        $results = $user->getBilletForChapter('55fa1800e4bed82e078b4772');

        // Assert
        $this->assertEquals('Commanding Officer', $results);
    }

    public function testGetBilletForChapterInvalidChapterFalseReturned(): void
    {
        // Arrange
        $user = User::where('email_address', 'peter@example.com')->first();

        // Act
        $results = $user->getBilletForChapter('bad-chapter-id');

        // Assert
        $this->assertFalse($results);
    }

    public function testGetTimeInGradeNoDORExpectedValueReturned(): void
    {
        // Arrange
        $user = User::where('email_address', 'doug@example.com')->first();
        $rank = [];
        $user->rank = $rank;

        // Act
        $results = $user->getTimeInGrade();

        // Assert
        $this->assertNull($results);
    }

    public function testGetTimeInGradeDefaultExpectedValueReturned(): void
    {
        // Arrange
        $user = User::where('email_address', 'doug@example.com')->first();

        // Act
        $results = $user->getTimeInGrade();

        // Assert
        $this->assertEquals('6 Year(s), 9 Month(s), 19 Day(s)', $results);
    }

    public function testGetTimeInGradeShortRoundWithCarryExpectedValueReturned(): void
    {
        // Arrange
        $user = User::where('email_address', 'doug@example.com')->first();
        $rank = $user->rank;
        $rank['date_of_rank'] = '2018-09-02';
        $user->rank = $rank;

        // Act
        $results = $user->getTimeInGrade(true);

        // Assert
        $this->assertEquals('7 Yr 0 Mo', $results);
    }

    public function testGetTimeInGradeShortMonthsExpectedValueReturned(): void
    {
        // Arrange
        $user = User::where('email_address', 'doug@example.com')->first();

        // Act
        $results = $user->getTimeInGrade('months');

        // Assert
        $this->assertEquals(81, $results);
    }

    public function testGetTimeInGradeShortExpectedValueReturned(): void
    {
        // Arrange
        $user = User::where('email_address', 'doug@example.com')->first();

        // Act
        $results = $user->getTimeInGrade(true);

        // Assert
        $this->assertEquals('6 Yr 9 Mo', $results);
    }

    public function testGetTimeInServiceEmptyRegistrationDateDefaultExpectedValueReturned(): void
    {
        // Arrange
        $user = User::where('email_address', 'doug@example.com')->first();
        $user->registration_date = '';

        // Act
        $results = $user->getTimeInService();

        // Assert
        $this->assertNull($results);
    }

    public function testGetTimeInServiceDefaultExpectedValueReturned(): void
    {
        // Arrange
        $user = User::where('email_address', 'doug@example.com')->first();
        $user->registration_date = '2014-09-23';

        // Act
        $results = $user->getTimeInService();

        // Assert
        $this->assertEquals('10 Year(s), 11 Month(s), 8 Day(s)', $results);
    }

    public function testGetTimeInServiceShortExpectedValueReturned(): void
    {
        // Arrange
        $user = User::where('email_address', 'doug@example.com')->first();
        $user->registration_date = '2014-09-03';

        // Act
        $results = $user->getTimeInService(true);

        // Assert
        $this->assertEquals('11 Yr 0 Mo', $results);
    }

    public function testGetTimeInServiceFormatMonthsExpectedValueReturned(): void
    {
        // Arrange
        $user = User::where('email_address', 'doug@example.com')->first();
        $user->registration_date = '2014-09-03';

        // Act
        $results = $user->getTimeInService(['format' => 'M']);

        // Assert
        $this->assertEquals(131.92741935483872, $results);
    }

    public function testGetTimeInServiceFormatYearsExpectedValueReturned(): void
    {
        // Arrange
        $user = User::where('email_address', 'doug@example.com')->first();
        $user->registration_date = '2014-09-03';

        // Act
        $results = $user->getTimeInService(['format' => 'Y']);

        // Assert
        $this->assertEquals(10.993835616438357, $results);
    }

    public function testGetTimeInServiceFormatDaysExpectedValueReturned(): void
    {
        // Arrange
        $user = User::where('email_address', 'doug@example.com')->first();
        $user->registration_date = '2014-09-03';

        // Act
        $results = $user->getTimeInService(['format' => 'D']);

        // Assert
        $this->assertEquals(4015.75, $results);
    }

    public function testGetTimeInServiceFormatHoursExpectedValueReturned(): void
    {
        // Arrange
        $user = User::where('email_address', 'doug@example.com')->first();
        $user->registration_date = '2014-09-03';

        // Act
        $results = $user->getTimeInService(['format' => 'H']);

        // Assert
        $this->assertEquals(96378.0, $results);
    }

    public function testGetTimeInServiceFormatMinsExpectedValueReturned(): void
    {
        // Arrange
        $user = User::where('email_address', 'doug@example.com')->first();
        $user->registration_date = '2014-09-03';

        // Act
        $results = $user->getTimeInService(['format' => 'm']);

        // Assert
        $this->assertEquals(5782680.0, $results);
    }

    public function testGetTimeInServiceShortRolloverExpectedValueReturned(): void
    {
        // Arrange
        $user = User::where('email_address', 'doug@example.com')->first();
        $user->registration_date = '2014-09-23';

        // Act
        $results = $user->getTimeInService(true);

        // Assert
        $this->assertEquals('10 Yr 11 Mo', $results);
    }

    public function testGetExamListNoExamsEmptyArrayReturned(): void
    {
        // Arrange
        $user = User::where('member_id', 'A0000001')->first();

        // Act
        $results = $user->getExamList();

        // Assert
        $this->assertIsArray($results);
        $this->assertCount(0, $results);
    }

    #[PreserveGlobalState(false)]
    #[RunInSeparateProcess]
    public function testGetExamListExamsExpectedArrayReturned(): void
    {
        // Arrange
        $user = User::where('member_id', 'A0000002')->first();
        $examList = [
            'SIA-RMN-0001' => [
                'score' => '80%',
                'date' => '2014-10-01',
                'date_entered' => '2014-10-01',
            ]
        ];
        $mockExams = Mockery::mock('alias:' . Exam::class)->makePartial();
        $mockExams->exams = $examList;
        $mockExams->shouldReceive('where')
            ->once()
            ->with('member_id', 'A0000002')
            ->andReturnSelf();
        $mockExams->shouldReceive('first')
            ->once()
            ->andReturnSelf();

        // Act
        $results = $user->getExamList();

        // Assert
        $this->assertIsArray($results);
        $this->assertEquals($examList, $results);
    }

    #[PreserveGlobalState(false)]
    #[RunInSeparateProcess]
    public function testGetExamListExamsPatternSuppliedExpectedArrayReturned(): void
    {
        // Arrange
        $user = User::where('member_id', 'A0000002')->first();
        $examList = [
            'SIA-RMN-0001' => [
                'score' => '80%',
                'date' => '2014-10-01',
                'date_entered' => '2014-10-01',
            ],
            'SIA-RMA-0001' => [
                'score' => '90%',
                'date' => '2015-10-01',
                'date_entered' => '2015-10-01',
            ],
        ];
        $expectedExams = [
            'SIA-RMN-0001' => [
                'score' => '80%',
                'date' => '2014-10-01',
                'date_entered' => '2014-10-01',
            ],
        ];
        $mockExams = Mockery::mock('alias:' . Exam::class)->makePartial();
        $mockExams->exams = $examList;
        $mockExams->shouldReceive('where')
            ->once()
            ->with('member_id', 'A0000002')
            ->andReturnSelf();
        $mockExams->shouldReceive('first')
            ->once()
            ->andReturnSelf();

        // Act
        $results = $user->getExamList('/SIA-RMN-/');

        // Assert
        $this->assertIsArray($results);
        $this->assertEquals($expectedExams, $results);
    }

    #[PreserveGlobalState(false)]
    #[RunInSeparateProcess]
    public function testGetExamListExamsPatternOptionSuppliedExpectedArrayReturned(): void
    {
        // Arrange
        $user = User::where('member_id', 'A0000002')->first();
        $examList = [
            'SIA-RMN-0001' => [
                'score' => '80%',
                'date' => '2014-10-01',
                'date_entered' => '2014-10-01',
            ],
            'SIA-RMA-0001' => [
                'score' => '90%',
                'date' => '2015-10-01',
                'date_entered' => '2015-10-01',
            ],
        ];
        $expectedExams = [
            'SIA-RMA-0001' => [
                'score' => '90%',
                'date' => '2015-10-01',
                'date_entered' => '2015-10-01',
            ],
        ];
        $mockExams = Mockery::mock('alias:' . Exam::class)->makePartial();
        $mockExams->exams = $examList;
        $mockExams->shouldReceive('where')
            ->once()
            ->with('member_id', 'A0000002')
            ->andReturnSelf();
        $mockExams->shouldReceive('first')
            ->once()
            ->andReturnSelf();

        // Act
        $results = $user->getExamList([ 'pattern' => '/SIA-RMA-/' ]);

        // Assert
        $this->assertIsArray($results);
        $this->assertEquals($expectedExams, $results);
    }

    #[PreserveGlobalState(false)]
    #[RunInSeparateProcess]
    public function testGetExamListExamsAfterSuppliedExpectedArrayReturned(): void
    {
        // Arrange
        $user = User::where('member_id', 'A0000002')->first();
        $examList = [
            'SIA-RMN-0001' => [
                'score' => '80%',
                'date' => '2014-10-01',
                'date_entered' => '2014-12-01',
            ],
            'SIA-RMA-0001' => [
                'score' => '90%',
                'date' => '2015-10-01',
                'date_entered' => '2015-10-01',
            ],
        ];
        $expectedExams = [
            'SIA-RMA-0001' => [
                'score' => '90%',
                'date' => '2015-10-01',
                'date_entered' => '2015-10-01',
            ],
        ];
        $mockExams = Mockery::mock('alias:' . Exam::class)->makePartial();
        $mockExams->exams = $examList;
        $mockExams->shouldReceive('where')
            ->once()
            ->with('member_id', 'A0000002')
            ->andReturnSelf();
        $mockExams->shouldReceive('first')
            ->once()
            ->andReturnSelf();

        // Act
        $results = $user->getExamList([ 'after' => '2015-09-01' ]);

        // Assert
        $this->assertIsArray($results);
        $this->assertEquals($expectedExams, $results);
    }

    #[PreserveGlobalState(false)]
    #[RunInSeparateProcess]
    public function testGetExamListExamsAfter2MoSuppliedExpectedArrayReturned(): void
    {
        // Arrange
        $user = User::where('member_id', 'A0000002')->first();
        $examList = [
            'SIA-RMN-0001' => [
                'score' => '80%',
                'date' => '2014-10-01',
                'date_entered' => '2014-12-01',
            ],
            'SIA-RMA-0001' => [
                'score' => '90%',
                'date' => '2015-10-01',
                'date_entered' => '2015-10-01',
            ],
        ];
        $expectedExams = [];
        $mockExams = Mockery::mock('alias:' . Exam::class)->makePartial();
        $mockExams->exams = $examList;
        $mockExams->shouldReceive('where')
            ->once()
            ->with('member_id', 'A0000002')
            ->andReturnSelf();
        $mockExams->shouldReceive('first')
            ->once()
            ->andReturnSelf();

        // Act
        $results = $user->getExamList([ 'after' => '2015-08-01' ]);

        // Assert
        $this->assertIsArray($results);
        $this->assertEquals($expectedExams, $results);
    }

    #[PreserveGlobalState(false)]
    #[RunInSeparateProcess]
    public function testGetExamListExamsSinceSuppliedExpectedArrayReturned(): void
    {
        // Arrange
        $user = User::where('member_id', 'A0000002')->first();
        $examList = [
            'SIA-RMN-0001' => [
                'score' => '80%',
                'date' => '2014-10-01',
                'date_entered' => '2014-12-01',
            ],
            'SIA-RMA-0001' => [
                'score' => '90%',
                'date' => '2015-10-01',
                'date_entered' => '2015-10-01',
            ],
            'SIA-RMA-0002' => [
                'score' => '90%',
                'date' => '2015-10-01',
            ],
        ];
        $expectedExams = [
            'SIA-RMA-0001' => [
                'score' => '90%',
                'date' => '2015-10-01',
                'date_entered' => '2015-10-01',
            ],
        ];
        $mockExams = Mockery::mock('alias:' . Exam::class)->makePartial();
        $mockExams->exams = $examList;
        $mockExams->shouldReceive('where')
            ->once()
            ->with('member_id', 'A0000002')
            ->andReturnSelf();
        $mockExams->shouldReceive('first')
            ->once()
            ->andReturnSelf();

        // Act
        $results = $user->getExamList([ 'since' => '2015-01-01' ]);

        // Assert
        $this->assertIsArray($results);
        $this->assertEquals($expectedExams, $results);
    }

    #[PreserveGlobalState(false)]
    #[RunInSeparateProcess]
    public function testGetExamListExamsExceptSuppliedExpectedArrayReturned(): void
    {
        // Arrange
        $user = User::where('member_id', 'A0000002')->first();
        $examList = [
            'SIA-RMN-0001' => [
                'score' => '80%',
                'date' => '2014-10-01',
                'date_entered' => '2014-12-01',
            ],
            'SIA-RMA-0001' => [
                'score' => '90%',
                'date' => '2015-10-01',
                'date_entered' => '2015-10-01',
            ],
        ];
        $expectedExams = [
            'SIA-RMN-0001' => [
                'score' => '80%',
                'date' => '2014-10-01',
                'date_entered' => '2014-12-01',
            ],
        ];
        $mockExams = Mockery::mock('alias:' . Exam::class)->makePartial();
        $mockExams->exams = $examList;
        $mockExams->shouldReceive('where')
            ->once()
            ->with('member_id', 'A0000002')
            ->andReturnSelf();
        $mockExams->shouldReceive('first')
            ->once()
            ->andReturnSelf();

        // Act
        $results = $user->getExamList([ 'except' => '/SIA-RMA/' ]);

        // Assert
        $this->assertIsArray($results);
        $this->assertEquals($expectedExams, $results);
    }

    #[PreserveGlobalState(false)]
    #[RunInSeparateProcess]
    public function testGetExamListExamsOnlyPassingSuppliedExpectedArrayReturned(): void
    {
        // Arrange
        $user = User::where('member_id', 'A0000002')->first();
        $examList = [
            'SIA-RMN-0001' => [
                'score' => '80%',
                'date' => '2014-10-01',
                'date_entered' => '2014-12-01',
            ],
            'SIA-RMA-0001' => [
                'score' => '60%',
                'date' => '2015-10-01',
                'date_entered' => '2015-10-01',
            ],
        ];
        $expectedExams = [
            'SIA-RMN-0001' => [
                'score' => '80%',
                'date' => '2014-10-01',
                'date_entered' => '2014-12-01',
            ],
        ];
        $mockExams = Mockery::mock('alias:' . Exam::class)->makePartial();
        $mockExams->exams = $examList;
        $mockExams->shouldReceive('where')
            ->once()
            ->with('member_id', 'A0000002')
            ->andReturnSelf();
        $mockExams->shouldReceive('first')
            ->once()
            ->andReturnSelf();

        // Act
        $results = $user->getExamList([ 'onlyPassing' => 'foo' ]);

        // Assert
        $this->assertIsArray($results);
        $this->assertEquals($expectedExams, $results);
    }

    #[PreserveGlobalState(false)]
    #[RunInSeparateProcess]
    public function testGetExamListExamsEnlistedSuppliedExpectedArrayReturned(): void
    {
        // Arrange
        $user = User::where('member_id', 'A0000002')->first();
        $examList = [
            'SIA-RMN-0001' => [
                'score' => '80%',
                'date' => '2014-10-01',
                'date_entered' => '2014-12-01',
            ],
            'SIA-RMN-0011' => [
                'score' => '90%',
                'date' => '2015-10-01',
                'date_entered' => '2015-10-01',
            ],
            'SIA-RMN-0101' => [
                'score' => '90%',
                'date' => '2016-10-01',
                'date_entered' => '2016-10-01',
            ],
            'SIA-RMN-1001' => [
                'score' => '90%',
                'date' => '2017-10-01',
                'date_entered' => '2017-10-01',
            ],
        ];
        $expectedExams = [
            'SIA-RMN-0001' => [
                'score' => '80%',
                'date' => '2014-10-01',
                'date_entered' => '2014-12-01',
            ],
        ];
        $mockExams = Mockery::mock('alias:' . Exam::class)->makePartial();
        $mockExams->exams = $examList;
        $mockExams->shouldReceive('where')
            ->once()
            ->with('member_id', 'A0000002')
            ->andReturnSelf();
        $mockExams->shouldReceive('first')
            ->once()
            ->andReturnSelf();

        // Act
        $results = $user->getExamList([ 'class' => 'enlisted' ]);

        // Assert
        $this->assertIsArray($results);
        $this->assertEquals($expectedExams, $results);
    }

    #[PreserveGlobalState(false)]
    #[RunInSeparateProcess]
    public function testGetExamListExamsWarrantSuppliedExpectedArrayReturned(): void
    {
        // Arrange
        $user = User::where('member_id', 'A0000002')->first();
        $examList = [
            'SIA-RMN-0001' => [
                'score' => '80%',
                'date' => '2014-10-01',
                'date_entered' => '2014-12-01',
            ],
            'SIA-RMN-0011' => [
                'score' => '90%',
                'date' => '2015-10-01',
                'date_entered' => '2015-10-01',
            ],
            'SIA-RMN-0101' => [
                'score' => '90%',
                'date' => '2016-10-01',
                'date_entered' => '2016-10-01',
            ],
            'SIA-RMN-1001' => [
                'score' => '90%',
                'date' => '2017-10-01',
                'date_entered' => '2017-10-01',
            ],
        ];
        $expectedExams = [
            'SIA-RMN-0011' => [
                'score' => '90%',
                'date' => '2015-10-01',
                'date_entered' => '2015-10-01',
            ],
        ];
        $mockExams = Mockery::mock('alias:' . Exam::class)->makePartial();
        $mockExams->exams = $examList;
        $mockExams->shouldReceive('where')
            ->once()
            ->with('member_id', 'A0000002')
            ->andReturnSelf();
        $mockExams->shouldReceive('first')
            ->once()
            ->andReturnSelf();

        // Act
        $results = $user->getExamList([ 'class' => 'warrant' ]);

        // Assert
        $this->assertIsArray($results);
        $this->assertEquals($expectedExams, $results);
    }

    #[PreserveGlobalState(false)]
    #[RunInSeparateProcess]
    public function testGetExamListExamsOfficerSuppliedExpectedArrayReturned(): void
    {
        // Arrange
        $user = User::where('member_id', 'A0000002')->first();
        $examList = [
            'SIA-RMN-0001' => [
                'score' => '80%',
                'date' => '2014-10-01',
                'date_entered' => '2014-12-01',
            ],
            'SIA-RMN-0011' => [
                'score' => '90%',
                'date' => '2015-10-01',
                'date_entered' => '2015-10-01',
            ],
            'SIA-RMN-0101' => [
                'score' => '90%',
                'date' => '2016-10-01',
                'date_entered' => '2016-10-01',
            ],
            'SIA-RMN-1001' => [
                'score' => '90%',
                'date' => '2017-10-01',
                'date_entered' => '2017-10-01',
            ],
        ];
        $expectedExams = [
            'SIA-RMN-0101' => [
                'score' => '90%',
                'date' => '2016-10-01',
                'date_entered' => '2016-10-01',
            ],
        ];
        $mockExams = Mockery::mock('alias:' . Exam::class)->makePartial();
        $mockExams->exams = $examList;
        $mockExams->shouldReceive('where')
            ->once()
            ->with('member_id', 'A0000002')
            ->andReturnSelf();
        $mockExams->shouldReceive('first')
            ->once()
            ->andReturnSelf();

        // Act
        $results = $user->getExamList([ 'class' => 'officer' ]);

        // Assert
        $this->assertIsArray($results);
        $this->assertEquals($expectedExams, $results);
    }

    #[PreserveGlobalState(false)]
    #[RunInSeparateProcess]
    public function testGetExamListExamsFlagSuppliedExpectedArrayReturned(): void
    {
        // Arrange
        $user = User::where('member_id', 'A0000002')->first();
        $examList = [
            'SIA-RMN-0001' => [
                'score' => '80%',
                'date' => '2014-10-01',
                'date_entered' => '2014-12-01',
            ],
            'SIA-RMN-0011' => [
                'score' => '90%',
                'date' => '2015-10-01',
                'date_entered' => '2015-10-01',
            ],
            'SIA-RMN-0101' => [
                'score' => '90%',
                'date' => '2016-10-01',
                'date_entered' => '2016-10-01',
            ],
            'SIA-RMN-1001' => [
                'score' => '90%',
                'date' => '2017-10-01',
                'date_entered' => '2017-10-01',
            ],
        ];
        $expectedExams = [
            'SIA-RMN-1001' => [
                'score' => '90%',
                'date' => '2017-10-01',
                'date_entered' => '2017-10-01',
            ],
        ];
        $mockExams = Mockery::mock('alias:' . Exam::class)->makePartial();
        $mockExams->exams = $examList;
        $mockExams->shouldReceive('where')
            ->once()
            ->with('member_id', 'A0000002')
            ->andReturnSelf();
        $mockExams->shouldReceive('first')
            ->once()
            ->andReturnSelf();

        // Act
        $results = $user->getExamList([ 'class' => 'flag' ]);

        // Assert
        $this->assertIsArray($results);
        $this->assertEquals($expectedExams, $results);
    }

    #[PreserveGlobalState(false)]
    #[RunInSeparateProcess]
    public function testGetExamListExamsOfficerFlagSuppliedExpectedArrayReturned(): void
    {
        // Arrange
        $user = User::where('member_id', 'A0000002')->first();
        $examList = [
            'SIA-RMN-0001' => [
                'score' => '80%',
                'date' => '2014-10-01',
                'date_entered' => '2014-12-01',
            ],
            'SIA-RMN-0011' => [
                'score' => '90%',
                'date' => '2015-10-01',
                'date_entered' => '2015-10-01',
            ],
            'SIA-RMN-0101' => [
                'score' => '90%',
                'date' => '2016-10-01',
                'date_entered' => '2016-10-01',
            ],
            'SIA-RMN-1001' => [
                'score' => '90%',
                'date' => '2017-10-01',
                'date_entered' => '2017-10-01',
            ],
        ];
        $expectedExams = [
            'SIA-RMN-0101' => [
                'score' => '90%',
                'date' => '2016-10-01',
                'date_entered' => '2016-10-01',
            ],
            'SIA-RMN-1001' => [
                'score' => '90%',
                'date' => '2017-10-01',
                'date_entered' => '2017-10-01',
            ],
        ];
        $mockExams = Mockery::mock('alias:' . Exam::class)->makePartial();
        $mockExams->exams = $examList;
        $mockExams->shouldReceive('where')
            ->times(3)
            ->with('member_id', 'A0000002')
            ->andReturnSelf();
        $mockExams->shouldReceive('first')
            ->times(3)
            ->andReturnSelf();

        // Act
        $results = $user->getExamList([ 'class' => 'officer+flag' ]);

        // Assert
        $this->assertIsArray($results);
        $this->assertEquals($expectedExams, $results);
    }

    public function testGetHighestMainLineExamForBranchCivilIntelExamsExpectedExamIDReturned(): void
    {
        // Arrange
        $exams = [
            'SIA-KC-0001' => [
                'score' => '80%',
                'date' => '2014-10-01',
                'date_entered' => '2014-10-01',
            ],
            'SIA-KC-0101' => [
                'score' => '80%',
                'date' => '2014-11-01',
                'date_entered' => '2014-11-01',
            ],
        ];
        $userMock = Mockery::mock(User::class)->makePartial();
        $userMock->branch = 'CIVIL';
        $userMock->rating = 'INTEL';
        $userMock->shouldReceive('getExamList')
            ->once()
            ->with([
                'pattern'=>'/^.*-KC-.*/',
                'except' => '/^.*-KC-0113|^.*-KC-0115/'
            ])
            ->andReturn($exams);

        // Act
        $results = $userMock->getHighestMainLineExamForBranch();

        // Assert
        $this->assertEquals('SIA-KC-0101', $results);
    }

    public function testGetHighestMainLineExamForBranchDiploExamsExpectedExamIDReturned(): void
    {
        // Arrange
        $exams = [
            'SIA-QC-0001' => [
                'score' => '80%',
                'date' => '2014-10-01',
                'date_entered' => '2014-10-01',
            ],
            'SIA-QC-0101' => [
                'score' => '80%',
                'date' => '2014-11-01',
                'date_entered' => '2014-11-01',
            ],
        ];
        $userMock = Mockery::mock(User::class)->makePartial();
        $userMock->branch = 'CIVIL';
        $userMock->rating = 'DIPLOMATIC';
        $userMock->shouldReceive('getExamList')
            ->once()
            ->with([
                'pattern'=>'/^.*-QC-.*/',
                'except' => '/^.*-QC-0113|^.*-QC-0115/'
            ])
            ->andReturn($exams);

        // Act
        $results = $userMock->getHighestMainLineExamForBranch();

        // Assert
        $this->assertEquals('SIA-QC-0101', $results);
    }

    public function testGetHighestMainLineExamForBranchCivilNoCollegeButCoreExamsExpectedExamIDReturned(): void
    {
        // Arrange
        $exams = [
            'SKU-CORE-0001' => [
                'score' => '80%',
                'date' => '2014-10-01',
                'date_entered' => '2014-10-01',
            ],
        ];
        $userMock = Mockery::mock(User::class)->makePartial();
        $userMock->branch = 'CIVIL';
        $userMock->rating = 'DIPLOMATIC';
        $userMock->shouldReceive('getExamList')
            ->once()
            ->with([
                'pattern'=>'/^.*-QC-.*/',
                'except' => '/^.*-QC-0113|^.*-QC-0115/'
            ])
            ->andReturn([]);

        $userMock->shouldReceive('getExamList')
            ->once()
            ->with([
                'pattern'=>'/^SKU-CORE-.*/',
                'except' => '/^.*-QC-0113|^.*-QC-0115/'
            ])
            ->andReturn($exams);

        // Act
        $results = $userMock->getHighestMainLineExamForBranch();

        // Assert
        $this->assertEquals('SKU-CORE-0001', $results);
    }

    public function testGetHighestMainLineExamForBranchCivilNoCollegeNoCoreButRMNExamsExpectedExamIDReturned(): void
    {
        // Arrange
        $exams = [
            'SIA-RMN-0001' => [
                'score' => '80%',
                'date' => '2014-10-01',
                'date_entered' => '2014-10-01',
            ],
        ];
        $userMock = Mockery::mock(User::class)->makePartial();
        $userMock->branch = 'CIVIL';
        $userMock->rating = 'DIPLOMATIC';
        $userMock->shouldReceive('getExamList')
            ->once()
            ->with([
                'pattern'=>'/^.*-QC-.*/',
                'except' => '/^.*-QC-0113|^.*-QC-0115/'
            ])
            ->andReturn([]);

        $userMock->shouldReceive('getExamList')
            ->once()
            ->with([
                'pattern'=>'/^SKU-CORE-.*/',
                'except' => '/^.*-QC-0113|^.*-QC-0115/'
            ])
            ->andReturn([]);

        $userMock->shouldReceive('getExamList')
        ->once()
        ->with([
            'pattern'=>'/^SIA-RMN-.*/',
            'except' => '/^SIA-RMN-0113|^SIA-RMN-0115/'
        ])
        ->andReturn($exams);

        // Act
        $results = $userMock->getHighestMainLineExamForBranch();

        // Assert
        $this->assertEquals('SIA-RMN-0001', $results);
    }

    public function testGetHighestMainLineExamForBranchRMMMNoCollegeButRMNExamsExpectedExamIDReturned(): void
    {
        // Arrange
        $exams = [
            'SIA-RMN-0001' => [
                'score' => '80%',
                'date' => '2014-10-01',
                'date_entered' => '2014-10-01',
            ],
        ];
        $userMock = Mockery::mock(User::class)->makePartial();
        $userMock->branch = 'RMMM';
        $userMock->shouldReceive('getExamList')
            ->once()
            ->with([
                'pattern'=>'/^.*-RMMM-.*/',
                'except' => '/^.*-RMMM-0113|^.*-RMMM-0115/',
                'class' => 'officer'
            ])
            ->andReturn([]);

        $userMock->shouldReceive('getExamList')
            ->never()
            ->with([
                'pattern'=>'/^SKU-CORE-.*/',
                'except' => '/^.*-RMMM-0113|^.*-RMMM-0115/',
                'class' => 'officer'
            ]);

        $userMock->shouldReceive('getExamList')
            ->once()
            ->with([
                'pattern'=>'/^SIA-RMN-.*/',
                'except' => '/^SIA-RMN-0113|^SIA-RMN-0115/',
                'class' => 'officer'
            ])
            ->andReturn($exams);

        // Act
        $results = $userMock->getHighestMainLineExamForBranch('officer');

        // Assert
        $this->assertEquals('SIA-RMN-0001', $results);
    }

    public function testGetHighestMainLineExamForBranchRMMMNoCollegeNoRMNExamsExpectedNullReturned(): void
    {
        // Arrange
        $exams = [
            'SIA-RMN-0001' => [
                'score' => '80%',
                'date' => '2014-10-01',
                'date_entered' => '2014-10-01',
            ],
        ];
        $userMock = Mockery::mock(User::class)->makePartial();
        $userMock->branch = 'RMMM';
        $userMock->shouldReceive('getExamList')
            ->once()
            ->with([
                'pattern'=>'/^.*-RMMM-.*/',
                'except' => '/^.*-RMMM-0113|^.*-RMMM-0115/',
                'class' => 'officer'
            ])
            ->andReturn([]);

        $userMock->shouldReceive('getExamList')
            ->never()
            ->with([
                'pattern'=>'/^SKU-CORE-.*/',
                'except' => '/^.*-RMMM-0113|^.*-RMMM-0115/',
                'class' => 'officer'
            ]);

        $userMock->shouldReceive('getExamList')
            ->once()
            ->with([
                'pattern'=>'/^SIA-RMN-.*/',
                'except' => '/^SIA-RMN-0113|^SIA-RMN-0115/',
                'class' => 'officer'
            ])
            ->andReturn([]);

        // Act
        $results = $userMock->getHighestMainLineExamForBranch('officer');

        // Assert
        $this->assertNull($results);
    }

    public function testGetHighestEnlistedExamExpectedCallsAndResultsReturned(): void
    {
        // Arrange
        $exams = [
            'SIA-RMN-0001' => [
                'exam data'
            ],
            'SIA-RMN-0002' => [
                'more exam data'
            ]
        ];
        $userMock = Mockery::mock(User::class)->makePartial();
        $userMock->shouldReceive('getExamList')
            ->once()
            ->with([
                'class'=>'enlisted'
            ])
            ->andReturn($exams);

        // Act
        $results = $userMock->getHighestEnlistedExam();

        // Assert
        $this->assertEquals(['SIA-RMN-0002' => ['more exam data']], $results);
    }

    public function testGetHighestWarrantExamExpectedCallsAndResultsReturned(): void
    {
        // Arrange
        $exams = [
            'SIA-RMN-0011' => [
                'exam data'
            ],
            'SIA-RMN-0012' => [
                'more exam data'
            ]
        ];
        $userMock = Mockery::mock(User::class)->makePartial();
        $userMock->shouldReceive('getExamList')
            ->once()
            ->with([
                'class'=>'warrant'
            ])
            ->andReturn($exams);

        // Act
        $results = $userMock->getHighestWarrantExam();

        // Assert
        $this->assertEquals(['SIA-RMN-0012' => ['more exam data']], $results);
    }

    public function testGetHighestOfficerExamExpectedCallsAndResultsReturned(): void
    {
        // Arrange
        $exams = [
            'SIA-RMN-0101' => [
                'exam data'
            ],
            'SIA-RMN-0102' => [
                'more exam data'
            ]
        ];
        $userMock = Mockery::mock(User::class)->makePartial();
        $userMock->shouldReceive('getExamList')
            ->once()
            ->with([
                'class'=>'officer+flag'
            ])
            ->andReturn($exams);

        // Act
        $results = $userMock->getHighestOfficerExam();

        // Assert
        $this->assertEquals(['SIA-RMN-0102' => ['more exam data']], $results);
    }

    public function testGetHighestFlagExamExpectedCallsAndResultsReturned(): void
    {
        // Arrange
        $exams = [
            'SIA-RMN-1001' => [
                'exam data'
            ],
            'SIA-RMN-1002' => [
                'more exam data'
            ]
        ];
        $userMock = Mockery::mock(User::class)->makePartial();
        $userMock->shouldReceive('getExamList')
            ->once()
            ->with([
                'class'=>'flag'
            ])
            ->andReturn($exams);

        // Act
        $results = $userMock->getHighestFlagExam();

        // Assert
        $this->assertEquals(['SIA-RMN-1002' => ['more exam data']], $results);
    }

    public function testGetHighestExamsExpectedCallsAndResultsReturned(): void
    {
        // Arrange
        $enlistedExams = [
            'SIA-RMN-0001' => [
                'exam data'
            ],
            'SIA-RMN-0002' => [
                'more exam data'
            ]
        ];
        $warrantExams = [
            'SIA-RMN-0011' => [
                'exam data'
            ],
            'SIA-RMN-0012' => [
                'more exam data'
            ]
        ];
        $officerExams = [
            'SIA-RMN-0101' => [
                'exam data'
            ],
            'SIA-RMN-0102' => [
                'more exam data'
            ]
        ];
        $userMock = Mockery::mock(User::class)->makePartial();
        $userMock->shouldReceive('getExamList')
            ->once()
            ->with([
                'class'=>'enlisted'
            ])
            ->andReturn($enlistedExams);
        $userMock->shouldReceive('getExamList')
            ->once()
            ->with([
                'class'=>'warrant'
            ])
            ->andReturn($warrantExams);
        $userMock->shouldReceive('getExamList')
            ->once()
            ->with([
                'class'=>'officer+flag'
            ])
            ->andReturn($officerExams);

        $expectedResults = [
            'E' => 'SIA-RMN-0002',
            'W' => 'SIA-RMN-0012',
            'O' => 'SIA-RMN-0102',
        ];

        // Act
        $results = $userMock->getHighestExams();

        // Assert
        $this->assertEquals($expectedResults, $results);
    }

    public function testGetCompletedExamsPassingExamsReturnsNewPassingExams(): void
    {
        // Arrange
        $userMock = Mockery::mock(User::class)->makePartial();
        $userMock->shouldReceive('getExamList')
            ->once()
            ->with([
                'after' => 'after timestamp',
            ])
            ->andReturn([
                'SIA-RMA-0001' => [
                    'score' => 'PASS',
                    'date' => '2015-10-01',
                    'date_entered' => '2015-10-01',
                ],
                'SIA-RMN-0001' => [
                    'score' => '70%',
                    'date' => '2014-10-01',
                    'date_entered' => '2014-12-01',
                ],
                'SIA-RMN-0002' => [
                    'score' => '69%',
                    'date' => '2015-10-01',
                    'date_entered' => '2015-10-01',
                ],
            ]);

        // Act
        $results = $userMock->getCompletedExams('after timestamp');

        // Assert
        $this->assertEquals('SIA-RMA-0001, SIA-RMN-0001', $results);
    }

    public function testGetCompletedExamsNoExamsReturnsEmptyString(): void
    {
        // Arrange
        $userMock = Mockery::mock(User::class)->makePartial();
        $userMock->shouldReceive('getExamList')
            ->once()
            ->with([
                'after' => 'after timestamp',
            ])
            ->andReturn([]);

        // Act
        $results = $userMock->getCompletedExams('after timestamp');

        // Assert
        $this->assertEquals('', $results);
    }

    #[RunInSeparateProcess]
    #[PreserveGlobalState(false)]
    public function testGetExamLastUpdatedExamReturnedLastUpdatedReturns(): void
    {
        // Arrange
        $examMock = Mockery::mock('alias:' . Exam::class)->makePartial();
        $examMock->shouldReceive('where')
            ->once()
            ->with('member_id', 'A0000002')
            ->andReturnSelf();
        $examMock->shouldReceive('first')
            ->once()
            ->andReturn([
                'updated_at' => '2025-08-15 12:34:56'
            ]);
        $this->app->instance(Exam::class, $examMock);
        $user = User::factory()->make(['member_id' => 'A0000002']);

        // Act
        $results = $user->getExamLastUpdated();

        // Assert
        $this->assertEquals('2025-08-15 12:34:56', $results);
    }

    #[RunInSeparateProcess]
    #[PreserveGlobalState(false)]
    public function testGetExamLastUpdatedNoExamReturnedReturnsFalse(): void
    {
        // Arrange
        $examMock = Mockery::mock('alias:' . Exam::class)->makePartial();
        $examMock->shouldReceive('where')
            ->once()
            ->with('member_id', 'A0000002')
            ->andReturnSelf();
        $examMock->shouldReceive('first')
            ->once()
            ->andReturn(null);
        $this->app->instance(Exam::class, $examMock);
        $user = User::factory()->make(['member_id' => 'A0000002']);

        // Act
        $results = $user->getExamLastUpdated();

        // Assert
        $this->assertFalse($results);
    }

    public function testHasNewExamsNoRegexNoExamsReturnsFalse(): void
    {
        // Arrange
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->shouldReceive('getPreviousLogin')
            ->once()
            ->andReturn('2025-08-01 12:34:56');
        Auth::shouldReceive('user')
            ->once()
            ->andReturn($mockUser);

        $mockUser->shouldReceive('getExamList')
            ->once()
            ->with(['since' => '2025-08-01 12:34:56'])
            ->andReturn([]);

        // Act
        $results = $mockUser->hasNewExams();

        // Assert
        $this->assertFalse($results);
    }

    public function testHasNewExamsNoRegexHasExamsReturnsTrue(): void
    {
        // Arrange
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->shouldReceive('getPreviousLogin')
            ->once()
            ->andReturn('2025-08-01 12:34:56');
        Auth::shouldReceive('user')
            ->once()
            ->andReturn($mockUser);

        $mockUser->shouldReceive('getExamList')
            ->once()
            ->with(['since' => '2025-08-01 12:34:56'])
            ->andReturn([1, 2, 3]);

        // Act
        $results = $mockUser->hasNewExams();

        // Assert
        $this->assertTrue($results);
    }

    public function testHasNewExamsWithRegexHasExamsReturnsTrue(): void
    {
        // Arrange
        $mockUser = Mockery::mock(User::class)->makePartial();
        $mockUser->shouldReceive('getPreviousLogin')
            ->once()
            ->andReturn('2025-08-01 12:34:56');
        Auth::shouldReceive('user')
            ->once()
            ->andReturn($mockUser);

        $mockUser->shouldReceive('getExamList')
            ->once()
            ->with([
                'since' => '2025-08-01 12:34:56',
                'pattern' => '/^SIA-RMN-.*/',
            ])
            ->andReturn([1, 2, 2]);

        // Act
        $results = $mockUser->hasNewExams('/^SIA-RMN-.*/');

        // Assert
        $this->assertTrue($results);
    }

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
