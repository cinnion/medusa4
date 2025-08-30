<?php

namespace Tests\Unit;

use App\Models\Chapter;
use App\Models\User;
use Database\Seeders\ChapterSeeder;
use Database\Seeders\MedusaConfigSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ChapterTest extends TestCase
{
    use DatabaseMigrations;

    public function testGetHoldingChaptersExpectedChapters()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(MedusaConfigSeeder::class);
        $expectedChapters = [
            '55fa1800e4bed82e078b4794' => 'HMSS Hephaestus',
            '55fa1800e4bed82e078b4796' => 'GNSS Katherine Mayhew',
        ];

        // Act
        $chapters = Chapter::getHoldingChapters();

        // Assert
        $this->assertIsArray($chapters);
        $this->assertCount(2, $chapters);
        $this->assertEquals($expectedChapters, $chapters);
    }

    public function testGetChaptersByTypeNonexistentTypeReturnsEmptyArray()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);

        // Act
        $chapters = Chapter::getChaptersByType('nonexistent_type');

        // Assert
        $this->assertIsArray($chapters);
        $this->assertCount(0, $chapters);
    }

    public function testGetChaptersByTypeSuReturnsExpectedChapters()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $expectedChapters = [
            '55fa1800e4bed82e078b47a0' => 'HMS Tartarus (Expelled)',
            '55fa1800e4bed82e078b47a2' => 'HMS Charon (Withdrawn)',
            '55fa1800e4bed82e078b479e' => 'HMS Valhalla (Passed Away)',
        ];

        // Act
        $chapters = Chapter::getChaptersByType('SU');

        // Assert
        $this->assertIsArray($chapters);
        $this->assertCount(3, $chapters);
        $this->assertEquals($expectedChapters, $chapters);
    }

    public function testGetChaptersByTypeHeadquartersReturnsExpectedChapters()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(MedusaConfigSeeder::class);
        $expectedChapters = [
            '55fa1800e4bed82e078b4782' => 'Admiralty House (RMN)'
        ];

        // Act
        $chapters = Chapter::getChaptersByType('headquarters');

        // Assert
        $this->assertIsArray($chapters);
        $this->assertCount(1, $chapters);
        $this->assertEquals($expectedChapters, $chapters);
    }

    public function testGetChaptersByTypeFleetReturnsExpectedChapters()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $expectedChapters = [
            '55fa1800e4bed82e078b4772' => 'San Martino Fleet (3rd)',
        ];

        // Act
        $chapters = Chapter::getChaptersByType('fleet');

        // Assert
        $this->assertIsArray($chapters);
        $this->assertCount(1, $chapters);
        $this->assertEquals($expectedChapters, $chapters);
    }

    public function testGetChaptersByTypeStationReturnsExpectedChapters()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(MedusaConfigSeeder::class);
        $expectedChapters = [
            '55fa1800e4bed82e078b4794' => 'HMSS Hephaestus',
            '55fa1800e4bed82e078b4796' => 'GNSS Katherine Mayhew',
        ];

        // Act
        $chapters = Chapter::getChaptersByType('station');

        // Assert
        $this->assertIsArray($chapters);
        $this->assertCount(2, $chapters);
        $this->assertEquals($expectedChapters, $chapters);
    }

    public function testGetFullChapterListNoArgumentReturnsAllActiveChapters()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(MedusaConfigSeeder::class);
        $this->seed(UserSeeder::class);
        $expectedChapters = [
            'Holding Chapters' => [
                '55fa1800e4bed82e078b4796' => 'GNSS Katherine Mayhew',
                '55fa1800e4bed82e078b4794' => 'HMSS Hephaestus',
            ],
            'Fleet Holding Chapters' => [],
            'Headquarters' => [
                '55fa1800e4bed82e078b4782' => 'Admiralty House (RMN)',
            ],
            'Bureaus' => [
                '55fa1800e4bed82e078b478a' => 'Bureau of Communications',
                '55fa1800e4bed82e078b4784' => 'Office of the First Space Lord',
            ],
            'Offices' => [],
            'Academies' => [],
            'Institutes' => [],
            'Universities' => [],
            'University Systems' => [],
            'Colleges' => [],
            'Training Centers' => [],
            'Fleets' => [
                '55fa1800e4bed82e078b4772' => 'San Martino Fleet (3rd)',
            ],
            'Task Forces' => [],
            'Task Groups' => [
                '58ee7c27493ea9ea728b4569' => 'Task Group 33.1',
            ],
            'Squadrons' => [],
            'Marine Expeditionary Forces ' => [],
            'Divisions' => [
                '55fa18a3e4bed83f078b459e' => 'Battlecruiser Division 314',
            ],
            'Separation Units' => [
                '55fa1800e4bed82e078b47a2' => 'HMS Charon (Withdrawn)',
                '55fa1800e4bed82e078b47a0' => 'HMS Tartarus (Expelled)',
                '55fa1800e4bed82e078b479e' => 'HMS Valhalla (Passed Away)',
            ],
            'Keeps' => [
                '597f4f014b3df7b8212343c7' => 'Lochen Keep',
            ],
            'Baronies' => [
                '61e564c39c6b7f0b29232f2c' => 'New Gilwell',
                '597f4f024b3df7b8212343f5' => 'Serpent Head Point',
            ],
            'Counties' => [],
            'Duchy' => [],
            'Steadings' => [],
            'Grand Duchy' => [
                '597f4f024b3df7b82123441d' => 'New Montana',
            ],
            'RMN' => [
                '55fa1833e4bed832078b45dc' => 'HMS Achilles (Atlanta, GA)',
                '55fa1833e4bed832078b457e' => 'HMS Truculent',
                '55fa1833e4bed832078b4580' => 'HMS Excalibur',
            ],
            'RMMC' => [
                '560dc143e4bed8b9748b45bb' => 'MARDET Achilles',
            ],
            'RMA' => [],
            'GSN' => [],
            'IAN' => [],
            'RHN' => [],
            'SFS' => [],
            'CIVIL' => [],
            'INTEL' => [],
            'RMMM' => [],
            'RMACS' => [],
            'Civilian Quadrants' => [],
            'Civilian Clusters' => [],
            'Civilian Sectors' => [],
            'Civilian Regions' => [],
            'Civilian Systems' => [],
            'Civilian Planetary' => [],
            'Corporate Board' => [],
            'Corporate Committee' => [
                '659af5a09c6b7f408f09e775' => 'Steering Committee',
            ],
        ];

        // Act
        $chapters = Chapter::getFullChapterList();

        // Assert
        $this->assertIsArray($chapters);
        $this->assertCount(43, $chapters);
        $this->assertEquals($expectedChapters, $chapters);
    }

    public function testGetFullChapterListTrueReturnsAllActiveChapters()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(MedusaConfigSeeder::class);
        $this->seed(UserSeeder::class);
        $expectedChapters = [
            'Holding Chapters' => [
                '55fa1800e4bed82e078b4796' => 'GNSS Katherine Mayhew',
                '55fa1800e4bed82e078b4794' => 'HMSS Hephaestus',
            ],
            'Fleet Holding Chapters' => [],
            'Headquarters' => [
                '55fa1800e4bed82e078b4782' => 'Admiralty House (RMN)',
            ],
            'Bureaus' => [
                '55fa1800e4bed82e078b478a' => 'Bureau of Communications',
                '55fa1800e4bed82e078b4784' => 'Office of the First Space Lord',
            ],
            'Offices' => [],
            'Academies' => [],
            'Institutes' => [],
            'Universities' => [],
            'University Systems' => [],
            'Colleges' => [],
            'Training Centers' => [],
            'Fleets' => [
                '55fa1800e4bed82e078b4772' => 'San Martino Fleet (3rd)',
            ],
            'Task Forces' => [],
            'Task Groups' => [
                '58ee7c27493ea9ea728b4569' => 'Task Group 33.1',
            ],
            'Squadrons' => [],
            'Marine Expeditionary Forces ' => [],
            'Divisions' => [
                '55fa18a3e4bed83f078b459e' => 'Battlecruiser Division 314',
            ],
            'Separation Units' => [
                '55fa1800e4bed82e078b47a2' => 'HMS Charon (Withdrawn)',
                '55fa1800e4bed82e078b47a0' => 'HMS Tartarus (Expelled)',
                '55fa1800e4bed82e078b479e' => 'HMS Valhalla (Passed Away)',
            ],
            'Keeps' => [
                '597f4f014b3df7b8212343c7' => 'Lochen Keep',
            ],
            'Baronies' => [
                '61e564c39c6b7f0b29232f2c' => 'New Gilwell',
                '597f4f024b3df7b8212343f5' => 'Serpent Head Point',
            ],
            'Counties' => [],
            'Duchy' => [],
            'Steadings' => [],
            'Grand Duchy' => [
                '597f4f024b3df7b82123441d' => 'New Montana',
            ],
            'RMN' => [
                '55fa1833e4bed832078b45dc' => 'HMS Achilles (Atlanta, GA)',
                '55fa1833e4bed832078b457e' => 'HMS Truculent',
                '55fa1833e4bed832078b4580' => 'HMS Excalibur',
            ],
            'RMMC' => [
                '560dc143e4bed8b9748b45bb' => 'MARDET Achilles',
            ],
            'RMA' => [],
            'GSN' => [],
            'IAN' => [],
            'RHN' => [],
            'SFS' => [],
            'CIVIL' => [],
            'INTEL' => [],
            'RMMM' => [],
            'RMACS' => [],
            'Civilian Quadrants' => [],
            'Civilian Clusters' => [],
            'Civilian Sectors' => [],
            'Civilian Regions' => [],
            'Civilian Systems' => [],
            'Civilian Planetary' => [],
            'Corporate Board' => [],
            'Corporate Committee' => [
                '659af5a09c6b7f408f09e775' => 'Steering Committee',
            ],
        ];

        // Act
        $chapters = Chapter::getFullChapterList(true);

        // Assert
        $this->assertIsArray($chapters);
        $this->assertCount(43, $chapters);
        $this->assertEquals($expectedChapters, $chapters);
    }

    public function testGetFullChapterListFalseReturnsAllApplicableChapters()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(MedusaConfigSeeder::class);
        $this->seed(UserSeeder::class);
        $expectedChapters = [
            'Holding Chapters' => [
                '55fa1800e4bed82e078b4796' => 'GNSS Katherine Mayhew',
                '55fa1800e4bed82e078b4794' => 'HMSS Hephaestus',
            ],
            'RMN' => [
                '55fa1833e4bed832078b45dc' => 'HMS Achilles (Atlanta, GA)',
                '55fa1833e4bed832078b457e' => 'HMS Truculent',
                '55fa1833e4bed832078b4580' => 'HMS Excalibur',
            ],
            'RMMC' => [
                '560dc143e4bed8b9748b45bb' => 'MARDET Achilles',
            ],
            'RMA' => [],
            'GSN' => [],
            'IAN' => [],
            'RHN' => [],
            'SFS' => [],
            'CIVIL' => [],
            'INTEL' => [],
            'RMMM' => [],
            'RMACS' => [],
        ];

        // Act
        $chapters = Chapter::getFullChapterList(false);

        // Assert
        $this->assertIsArray($chapters);
        $this->assertCount(12, $chapters);
        $this->assertEquals($expectedChapters, $chapters);
    }

    public function testGetChaptersDefaultsExpectedResults()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(MedusaConfigSeeder::class);
        $this->seed(UserSeeder::class);
        $expectedResults = [
            '55fa1833e4bed832078b45dc' => 'HMS Achilles (Atlanta, GA)',
            '55fa1833e4bed832078b457e' => 'HMS Truculent',
            '560dc143e4bed8b9748b45bb' => 'MARDET Achilles',
            '55fa1833e4bed832078b4580' => 'HMS Excalibur',
        ];

        // Act
        $chapters = Chapter::getChapters();

        // Assert
        $this->assertEquals($expectedResults, $chapters);
    }

    public function testGetChaptersRMNExpectedResults()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(MedusaConfigSeeder::class);
        $this->seed(UserSeeder::class);
        $expectedResults = [
            '55fa1833e4bed832078b45dc' => 'HMS Achilles (Atlanta, GA)',
            '55fa1833e4bed832078b457e' => 'HMS Truculent',
            '55fa1833e4bed832078b4580' => 'HMS Excalibur',
        ];

        // Act
        $chapters = Chapter::getChapters('RMN');

        // Assert
        $this->assertEquals($expectedResults, $chapters);
    }

    public function testGetChaptersIANExpectedResults()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(MedusaConfigSeeder::class);
        $this->seed(UserSeeder::class);
        $expectedResults = [
        ];

        // Act
        $chapters = Chapter::getChapters('IAN');

        // Assert
        $this->assertEquals($expectedResults, $chapters);
    }

    public function testGetChaptersGAExpectedResults()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(MedusaConfigSeeder::class);
        $this->seed(UserSeeder::class);
        $expectedResults = [
            '55fa1833e4bed832078b45dc' => 'HMS Achilles (Atlanta, GA)',
        ];

        // Act
        $chapters = Chapter::getChapters('', 'GA');

        // Assert
        $this->assertEquals($expectedResults, $chapters);
    }

    public function testGetChaptersJoinableFalseExpectedResults()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(MedusaConfigSeeder::class);
        $this->seed(UserSeeder::class);
        $expectedResults = [
            '55fa1833e4bed832078b45dc' => 'HMS Achilles (Atlanta, GA)',
            '55fa1833e4bed832078b457e' => 'HMS Truculent',
            '55fa1833e4bed832078b4580' => 'HMS Excalibur',
            '55fa1800e4bed82e078b4782' => 'Admiralty House',
            '55fa1800e4bed82e078b478a' => 'Bureau of Communications (Columbus, OH)',
            '55fa1800e4bed82e078b4796' => 'GNSS Katherine Mayhew',
            '55fa1800e4bed82e078b47a2' => 'HMS Charon',
            '55fa1800e4bed82e078b4794' => 'HMSS Hephaestus',
            '55fa1800e4bed82e078b47a0' => 'HMS Tartarus',
            '55fa1800e4bed82e078b479e' => 'HMS Valhalla',
            '597f4f014b3df7b8212343c7' => 'Lochen Keep (Columbus, OH)',
            '61e564c39c6b7f0b29232f2c' => 'New Gilwell',
            '597f4f024b3df7b82123441d' => 'New Montana (Columbus, GA)',
            '55fa1800e4bed82e078b4772' => 'San Martino Fleet (3rd Fleet)',
            '597f4f024b3df7b8212343f5' => 'Serpent Head Point (Atlanta, GA)',
            '55fa18a3e4bed83f078b459e' => 'Battlecruiser Division 314',
            '560dc143e4bed8b9748b45bb' => 'MARDET Achilles',
            '55fa1800e4bed82e078b4784' => 'Office of the First Space Lord',
            '659af5a09c6b7f408f09e775' => 'Steering Committee',
            '58ee7c27493ea9ea728b4569' => 'Task Group 33.1',
            '55fa1800e4bed82e078b475e' => 'Third Naval District',
        ];

        // Act
        $chapters = Chapter::getChapters('', '0', false);

        // Assert
        $this->assertEquals($expectedResults, $chapters);
    }

    public function testGetNameAchillesExpectedResult()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);

        // Act
        $results = Chapter::getName('55fa1833e4bed832078b45dc');

        // Assert
        $this->assertEquals('HMS Achilles', $results);
    }

    public function testGetNameBadIdExpectedNull()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);

        // Act
        $results = Chapter::getName('abc123');

        // Assert
        $this->assertNull($results);
    }

    public function testGetIdByNameAchillesExpectedResult()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);

        // Act
        $results = Chapter::getIdByName('HMS Achilles');

        // Assert
        $this->assertEquals('55fa1833e4bed832078b45dc', $results);
    }

    public function testGetIdByNameNonexistentExpectedNull()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);

        // Act
        $results = Chapter::getIdByName('Nonexistent');

        // Assert
        $this->assertNull($results);
    }

    public function testGetCrewAchillesExpectedResults()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(UserSeeder::class);
        $chapter = Chapter::where('chapter_name', 'HMS Achilles')->first();
        $dougUser = User::where('email_address', 'doug@example.com')->first();
        $robin1User = User::where('email_address', 'robin1@example.com')->first();
        $daveUser = User::where('email_address', 'dave@example.com')->first();

        // Act
        $crew = $chapter->getCrew();

        // Assert
        $this->assertCount(3, $crew);
        $this->assertArrayNotHasKey(0, $crew, 'CO Scott was not excluded');
        $this->assertArrayNotHasKey(1, $crew, 'XO Mike was not excluded');
        $this->assertEquals($dougUser->toArray(), $crew[2]->toArray());
        $this->assertArrayNotHasKey(3, $crew, 'Bosun Brigitte was not excluded');
        $this->assertEquals($robin1User->toArray(), $crew[4]->toArray());
        $this->assertEquals($daveUser->toArray(), $crew[5]->toArray());
    }

    public function testGetCrewAchillesReportExpectedResults()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(UserSeeder::class);
        $chapter = Chapter::where('chapter_name', 'HMS Achilles')->first();
        $dougUser = User::where('email_address', 'doug@example.com')->first();
        $robin1User = User::where('email_address', 'robin1@example.com')->first();
        $daveUser = User::where('email_address', 'dave@example.com')->first();

        // Act
        $crew = $chapter->getCrew(true, time() - 60 * 86400);

        // Assert
        $this->assertCount(1, $crew);
        $this->assertArrayNotHasKey(0, $crew, 'CO Scott was not excluded');
        $this->assertArrayNotHasKey(1, $crew, 'XO Mike was not excluded');
        $this->assertArrayNotHasKey(2, $crew, 'Doug was not excluded');
        $this->assertArrayNotHasKey(3, $crew, 'Bosun Brigitte was not excluded');
        $this->assertEquals($robin1User->toArray(), $crew[4]->toArray());
        $this->assertArrayNotHasKey(5, $crew, 'Dave was not excluded');
    }

    public function testGetCrewWithChildrenDefaultIdExpectedRoster()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(UserSeeder::class);
        $achilles = Chapter::where('chapter_name', 'HMS Achilles')->first();
        $dave = User::where('email_address', 'dave@example.com')->first();
        $jo = User::where('email_address', 'jo@example.com')->first();
        $mike = User::where('email_address', 'mike@example.com')->first();
        $doug = User::where('email_address', 'doug@example.com')->first();
        $bridgitte = User::where('email_address', 'bridgitte@example.com')->first();
        $robin1 = User::where('email_address', 'robin1@example.com')->first();
        $robin2 = User::where('email_address', 'robin2@example.com')->first();
        $robin3 = User::where('email_address', 'robin3@example.com')->first();
        $scott = User::where('email_address', 'scott@example.com')->first();

        // Expects
        Auth::expects('user')
            ->andReturn($scott);

        // Act
        $crew = $achilles->getCrewWithChildren();

        // Assert
        $this->assertCount(8, $crew);
        $this->assertEquals($mike->toArray(), $crew[0]->toArray());
        $this->assertEquals($jo->toArray(), $crew[1]->toArray());
        $this->assertEquals($doug->toArray(), $crew[2]->toArray());
        $this->assertEquals($bridgitte->toArray(), $crew[3]->toArray());
        $this->assertEquals($dave->toArray(), $crew[4]->toArray());
        $this->assertEquals($robin1->toArray(), $crew[5]->toArray());
        $this->assertEquals($robin2->toArray(), $crew[6]->toArray());
        $this->assertEquals($robin3->toArray(), $crew[7]->toArray());
    }

    public function testGetCrewWithChildrenFleetWithAchillesIdExpectedRoster()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(UserSeeder::class);
        $achilles = Chapter::where('chapter_name', 'HMS Achilles')->first();
        $fleet = Chapter::where('chapter_name', 'San Martino Fleet')->first();
        $dave = User::where('email_address', 'dave@example.com')->first();
        $jo = User::where('email_address', 'jo@example.com')->first();
        $mike = User::where('email_address', 'mike@example.com')->first();
        $doug = User::where('email_address', 'doug@example.com')->first();
        $bridgitte = User::where('email_address', 'bridgitte@example.com')->first();
        $robin1 = User::where('email_address', 'robin1@example.com')->first();
        $robin2 = User::where('email_address', 'robin2@example.com')->first();
        $robin3 = User::where('email_address', 'robin3@example.com')->first();
        $scott = User::where('email_address', 'scott@example.com')->first();

        // Expects
        Auth::expects('user')
            ->andReturn($scott);

        // Act
        $crew = $fleet->getCrewWithChildren($achilles->id);

        // Assert
        $this->assertCount(8, $crew);
        $this->assertEquals($mike->toArray(), $crew[0]->toArray());
        $this->assertEquals($jo->toArray(), $crew[1]->toArray());
        $this->assertEquals($doug->toArray(), $crew[2]->toArray());
        $this->assertEquals($bridgitte->toArray(), $crew[3]->toArray());
        $this->assertEquals($dave->toArray(), $crew[4]->toArray());
        $this->assertEquals($robin1->toArray(), $crew[5]->toArray());
        $this->assertEquals($robin2->toArray(), $crew[6]->toArray());
        $this->assertEquals($robin3->toArray(), $crew[7]->toArray());
    }

    public function testGetAllCrewDefaultIdExpectedRoster()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(UserSeeder::class);
        $achilles = Chapter::where('chapter_name', 'HMS Achilles')->first();
        $dave = User::where('email_address', 'dave@example.com')->first();
        $jo = User::where('email_address', 'jo@example.com')->first();
        $mike = User::where('email_address', 'mike@example.com')->first();
        $doug = User::where('email_address', 'doug@example.com')->first();
        $bridgitte = User::where('email_address', 'bridgitte@example.com')->first();
        $robin1 = User::where('email_address', 'robin1@example.com')->first();
        $robin2 = User::where('email_address', 'robin2@example.com')->first();
        $robin3 = User::where('email_address', 'robin3@example.com')->first();
        $scott = User::where('email_address', 'scott@example.com')->first();

        // Act
        $crew = $achilles->getAllCrew();

        // Assert
        $this->assertCount(6, $crew);
        $this->assertInstanceOf(Collection::class, $crew);
        $this->assertInstanceOf(User::class, $crew[0]);
        $this->assertEquals($mike->toArray(), $crew[0]->toArray());
        $this->assertInstanceOf(User::class, $crew[1]);
        $this->assertEquals($scott->toArray(), $crew[1]->toArray());
        $this->assertInstanceOf(User::class, $crew[2]);
        $this->assertEquals($doug->toArray(), $crew[2]->toArray());
        $this->assertInstanceOf(User::class, $crew[3]);
        $this->assertEquals($bridgitte->toArray(), $crew[3]->toArray());
        $this->assertInstanceOf(User::class, $crew[4]);
        $this->assertEquals($dave->toArray(), $crew[4]->toArray());
        $this->assertInstanceOf(User::class, $crew[5]);
        $this->assertEquals($robin1->toArray(), $crew[5]->toArray());
    }

    public function testGetAllCrewSpecifiedIdExpectedRoster()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(UserSeeder::class);
        $achilles = Chapter::where('chapter_name', 'HMS Achilles')->first();
        $fleet = Chapter::where('chapter_name', 'San Martino Fleet')->first();
        $dave = User::where('email_address', 'dave@example.com')->first();
        $jo = User::where('email_address', 'jo@example.com')->first();
        $mike = User::where('email_address', 'mike@example.com')->first();
        $doug = User::where('email_address', 'doug@example.com')->first();
        $bridgitte = User::where('email_address', 'bridgitte@example.com')->first();
        $robin1 = User::where('email_address', 'robin1@example.com')->first();
        $robin2 = User::where('email_address', 'robin2@example.com')->first();
        $robin3 = User::where('email_address', 'robin3@example.com')->first();
        $scott = User::where('email_address', 'scott@example.com')->first();

        // Act
        $crew = $fleet->getAllCrew($achilles->id);

        // Assert
        $this->assertCount(6, $crew);
        $this->assertInstanceOf(Collection::class, $crew);
        $this->assertInstanceOf(User::class, $crew[0]);
        $this->assertEquals($mike->toArray(), $crew[0]->toArray());
        $this->assertInstanceOf(User::class, $crew[1]);
        $this->assertEquals($scott->toArray(), $crew[1]->toArray());
        $this->assertInstanceOf(User::class, $crew[2]);
        $this->assertEquals($doug->toArray(), $crew[2]->toArray());
        $this->assertInstanceOf(User::class, $crew[3]);
        $this->assertEquals($bridgitte->toArray(), $crew[3]->toArray());
        $this->assertInstanceOf(User::class, $crew[4]);
        $this->assertEquals($dave->toArray(), $crew[4]->toArray());
        $this->assertInstanceOf(User::class, $crew[5]);
        $this->assertEquals($robin1->toArray(), $crew[5]->toArray());
    }

    public function testGetAllCrewBadIdExpectedRoster()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(UserSeeder::class);
        $achilles = Chapter::where('chapter_name', 'HMS Achilles')->first();

        // Act
        $crew = $achilles->getAllCrew('bad-id');

        // Assert
        $this->assertCount(0, $crew);
        $this->assertInstanceOf(Collection::class, $crew);
    }

    public function testGetActiveCrewCountDefaultIdExpectedCount()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(UserSeeder::class);
        $achilles = Chapter::where('chapter_name', 'HMS Achilles')->first();

        // Act
        $count = $achilles->getActiveCrewCount();

        // Assert
        $this->assertEquals(6, $count);
    }

    public function testGetActiveCrewCountSpecifiedIdExpectedCount()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(UserSeeder::class);
        $achilles = Chapter::where('chapter_name', 'HMS Achilles')->first();
        $fleet = Chapter::where('chapter_name', 'San Martino Fleet')->first();

        // Act
        $count = $fleet->getActiveCrewCount($achilles->id);

        // Assert
        $this->assertEquals(6, $count);
    }

    public function testGetActiveCrewCountBadIdExpectedCount()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(UserSeeder::class);
        $achilles = Chapter::where('chapter_name', 'HMS Achilles')->first();

        // Act
        $count = $achilles->getActiveCrewCount('bad-id');

        // Assert
        $this->assertEquals(0, $count);
    }

    // Test getAllCrewIncludingChildren

    public function testGetCommandBilletAchillesCOReturnsExpectedUser()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(UserSeeder::class);
        $chapter = Chapter::where('chapter_name', 'HMS Achilles')->first();
        $expectedUser = User::where('email_address', 'scott@example.com')->first();

        // Act
        $result = $chapter->getCommandBillet('Commanding Officer');

        // Assert
        $this->assertEquals($expectedUser->toArray(), $result->toArray());
    }

    public function testGetCommandBilletAchillesXOFalseReturnsExpectedUser()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(UserSeeder::class);
        $chapter = Chapter::where('chapter_name', 'HMS Achilles')->first();
        $expectedUser = User::where('email_address', 'mike@example.com')->first();

        // Act
        $result = $chapter->getCommandBillet('Executive Officer', false);

        // Assert
        $this->assertEquals($expectedUser->toArray(), $result->toArray());
    }

    public function testGetCommandBilletAchillesInvalidBilletReturnsNull()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(UserSeeder::class);
        $chapter = Chapter::where('chapter_name', 'HMS Achilles')->first();

        // Act
        $result = $chapter->getCommandBillet('Bogus');

        // Assert
        $this->assertNull($result);
    }

    public function testGetCommandBilletSHPBaronReturnsExpectedUser()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(UserSeeder::class);
        $chapter = Chapter::where('chapter_name', 'Serpent Head Point')->first();
        $expected_user = User::where('email_address', 'dave@example.com')->first();

        // Act
        $result = $chapter->getCommandBillet('Baron');

        // Assert
        $this->assertNull($result);
    }

    public function testFindPeerByLandBaronAllowCourtesyExpectedNull()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(UserSeeder::class);
        $chapter = Chapter::where('chapter_name', 'Serpent Head Point')->first();

        // Act
        $result = $chapter->findPeerByLand('Baron', true);

        // Assert
        $this->assertNull($result);
    }

    public function testFindPeerByLandBaronDontAllowCourtesyExpectedUser()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(UserSeeder::class);
        $chapter = Chapter::where('chapter_name', 'Serpent Head Point')->first();
        $expectedUser = User::where('email_address', 'dave@example.com')->first();

        // Act
        $result = $chapter->findPeerByLand('Baron', false);

        // Assert
        $this->assertEquals($expectedUser->toArray(), $result->toArray());
    }

    public function testFindPeerByLandDameFalseExpectedArray()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(UserSeeder::class);
        $chapter = Chapter::where('chapter_name', 'New Gilwell')->first();

        // Act
        $result = $chapter->findPeerByLand('Dame', false);

        // Assert
        $this->assertNull($result);
    }

    public function testFindPeerByLandDameTrueExpectedUser()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(UserSeeder::class);
        $chapter = Chapter::where('chapter_name', 'New Gilwell')->first();
        $expectedUser = User::where('email_address', 'misty@example.com')->first();

        // Act
        $result = $chapter->findPeerByLand('Dame', true);

        // Assert
        $this->assertEquals($expectedUser->toArray(), $result->toArray());
    }

    public function testFindPeerByLandKnightTrueExpectedUser()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(UserSeeder::class);
        $chapter = Chapter::where('chapter_name', 'Lochen Keep')->first();
        $expectedUser = User::where('email_address', 'lochen@example.com')->first();

        // Act
        $result = $chapter->findPeerByLand('Knight', true);

        // Assert
        $this->assertEquals($expectedUser->toArray(), $result->toArray());
    }

    public function testGetCOAchillesExpectedUser()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(UserSeeder::class);
        $chapter = Chapter::where('chapter_name', 'HMS Achilles')->first();
        $expectedCO = User::where('email_address', 'scott@example.com')->first();

        // Act
        $user = $chapter->getCO();

        // Assert
        $this->assertEquals($expectedCO->toArray(), $user->toArray());
    }

    public function testGetXOAchillesExpectedUser()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(UserSeeder::class);
        $chapter = Chapter::where('chapter_name', 'HMS Achilles')->first();
        $expectedXO = User::where('email_address', 'mike@example.com')->first();

        // Act
        $user = $chapter->getXO();

        // Assert
        $this->assertEquals($expectedXO->toArray(), $user->toArray());
    }

    public function testGetBosunAchillesExpectedUser()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(UserSeeder::class);
        $chapter = Chapter::where('chapter_name', 'HMS Achilles')->first();
        $expectedBosun = User::where('email_address', 'bridgitte@example.com')->first();

        // Act
        $user = $chapter->getBosun();

        // Assert
        $this->assertEquals($expectedBosun->toArray(), $user->toArray());
    }

    public function testGetCommandCrewAchillesExpectedCommandCrew()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(MedusaConfigSeeder::class);
        $this->seed(UserSeeder::class);
        $chapter = Chapter::where('chapter_name', 'HMS Achilles')->first();
        $expectedCO = User::where('email_address', 'scott@example.com')->first();
        $expectedXO = User::where('email_address', 'mike@example.com')->first();
        $expectedBosun = User::where('email_address', 'bridgitte@example.com')->first();

        // Act
        $commandCrew = $chapter->getCommandCrew();

        // Assert
        $this->assertIsArray($commandCrew);
        $this->assertCount(3, $commandCrew);
        $this->assertEquals('Commanding Officer', $commandCrew[1]['display']);
        $this->assertEquals($expectedCO->toArray(), $commandCrew[1]['user']->toArray());
        $this->assertEquals('Executive Officer', $commandCrew[2]['display']);
        $this->assertEquals($expectedXO->toArray(), $commandCrew[2]['user']->toArray());
        $this->assertEquals('Bosun', $commandCrew[3]['display']);
        $this->assertEquals($expectedBosun->toArray(), $commandCrew[3]['user']->toArray());
    }

    public function testGetCommandCrewNewMontanaExpectedCommandCrew()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(MedusaConfigSeeder::class);
        $this->seed(UserSeeder::class);
        $chapter = Chapter::where('chapter_name', 'New Montana')->first();
        $expectedGD = User::where('email_address', 'david@example.com')->first();
        //$expectedGDs = User::where('email_address', 'sharon@example.com')->first();

        // Act
        $commandCrew = $chapter->getCommandCrew();

        // Assert
        // XXX - Sharon is not showing up because her title is not a courtesy title.
        $this->assertIsArray($commandCrew);
        $this->assertCount(1, $commandCrew);
        $this->assertEquals('Grand Duke', $commandCrew[1]['display']);
        $this->assertEquals($expectedGD->toArray(), $commandCrew[1]['user']->toArray());
        //$this->assertEquals('Grand Duchess', $commandCrew[2]['display']);
        //$this->assertEquals($expectedGDs->toArray(), $commandCrew[2]['user']->toArray());
    }

    public function testGetCommandCrewSHPExpectedCommandCrew()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(MedusaConfigSeeder::class);
        $this->seed(UserSeeder::class);
        $chapter = Chapter::where('chapter_name', 'Serpent Head Point')->first();
        $expectedBaron = User::where('email_address', 'dave@example.com')->first();
        $expectedBaroness = User::where('email_address', 'jo@example.com')->first();

        // Act
        $commandCrew = $chapter->getCommandCrew();

        // Assert
        $this->assertIsArray($commandCrew);
        $this->assertCount(2, $commandCrew);
        $this->assertEquals('Baron', $commandCrew[1]['display']);
        $this->assertEquals($expectedBaron->toArray(), $commandCrew[1]['user']->toArray());
        $this->assertEquals('Baroness', $commandCrew[2]['display']);
        $this->assertEquals($expectedBaroness->toArray(), $commandCrew[2]['user']->toArray());
    }

    public function testGetCommandCrewBuCommExpectedCommandCrew()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(MedusaConfigSeeder::class);
        $this->seed(UserSeeder::class);
        $chapter = Chapter::where('chapter_name', 'Bureau of Communications')->first();
        $expectedCO = User::where('email_address', '4sl@example.com')->first();

        // Act
        $commandCrew = $chapter->getCommandCrew();

        // Assert
        $this->assertIsArray($commandCrew);
        $this->assertCount(1, $commandCrew);
        $this->assertEquals('Fourth Space Lord', $commandCrew[1]['display']);
        $this->assertEquals($expectedCO->toArray(), $commandCrew[1]['user']->toArray());
    }

    // Test getChapterIdWithParents

    // Test getAssignedFleet

    // Test getChildChapters

    public function testGetChapterIdWithChildrenDefaultIdExpectedList()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $fleet = Chapter::where('chapter_name', 'San Martino Fleet')->first();
        $tg331 = Chapter::where('chapter_name', 'Task Group 33.1')->first();
        $piDiv = Chapter::where('chapter_name', 'Battlecruiser Division 314')->first();
        $achilles = Chapter::where('chapter_name', 'HMS Achilles')->first();
        $mardetAchilles = Chapter::where('chapter_name', 'MARDET Achilles')->first();
        $excalibur = Chapter::where('chapter_name', 'HMS Excalibur')->first();

        // Act
        $chapters = $fleet->getChapterIdWithChildren();

        // Assert
        $this->assertCount(6, $chapters);
        $this->assertEquals($fleet->id, $chapters[0]);
        $this->assertEquals($tg331->id, $chapters[1]);
        $this->assertEquals($piDiv->id, $chapters[2]);
        $this->assertEquals($achilles->id, $chapters[3]);
        $this->assertEquals($mardetAchilles->id, $chapters[4]);
        $this->assertEquals($excalibur->id, $chapters[5]);
    }

    public function testGetChapterIdWithChildrenPiDivIdExpectedList()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $fleet = Chapter::where('chapter_name', 'San Martino Fleet')->first();
        $piDiv = Chapter::where('chapter_name', 'Battlecruiser Division 314')->first();
        $achilles = Chapter::where('chapter_name', 'HMS Achilles')->first();
        $mardetAchilles = Chapter::where('chapter_name', 'MARDET Achilles')->first();
        $excalibur = Chapter::where('chapter_name', 'HMS Excalibur')->first();

        // Act
        $chapters = $fleet->getChapterIdWithChildren($piDiv->id);

        // Assert
        $this->assertCount(4, $chapters);
        $this->assertEquals($piDiv->id, $chapters[0]);
        $this->assertEquals($achilles->id, $chapters[1]);
        $this->assertEquals($mardetAchilles->id, $chapters[2]);
        $this->assertEquals($excalibur->id, $chapters[3]);
    }

    public function testGetNumActiveChildrenDefaultIdExpectedCount()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $piDiv = Chapter::where('chapter_name', 'Battlecruiser Division 314')->first();

        // Act
        $count = $piDiv->getNumActiveChildren();

        // Assert
        $this->assertEquals(2, $count);
    }

    public function testGetNumActiveChildrenSpecifiedIdExpectedCount()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $fleet = Chapter::where('chapter_name', 'San Martino Fleet')->first();
        $piDiv = Chapter::where('chapter_name', 'Battlecruiser Division 314')->first();

        // Act
        $count = $fleet->getNumActiveChildren($piDiv->id);

        // Assert
        $this->assertEquals(2, $count);
    }

    public function testGetNumActiveChildrenBadSpecifiedIdExpectedCount()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $fleet = Chapter::where('chapter_name', 'San Martino Fleet')->first();

        // Act
        $count = $fleet->getNumActiveChildren('bad-id');

        // Assert
        $this->assertEquals(0, $count);
    }

    public function testGetChildHierarchyDefaultIdExpectedCount()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $piDiv = Chapter::where('chapter_name', 'Battlecruiser Division 314')->first();
        $achilles = Chapter::where('chapter_name', 'HMS Achilles')->first();
        $mardet = Chapter::where('chapter_name', 'MARDET Achilles')->first();
        $excalibur = Chapter::where('chapter_name', 'HMS Excalibur')->first();

        // Act
        $results = $piDiv->getChildHierarchy();

        // Assert
        $this->assertCount(2, $results);
        $this->assertInstanceOf(Chapter::class, $results[0]['chapter']);
        $this->assertEquals($achilles->toArray(), $results[0]['chapter']->toArray());
        $this->assertIsArray($results[0]['children']);
        $this->assertCount(1, $results[0]['children']);
        $this->assertInstanceOf(Chapter::class, $results[0]['children'][0]['chapter']);
        $this->assertEquals($mardet->toArray(), $results[0]['children'][0]['chapter']->toArray());
        $this->assertIsArray($results[0]['children'][0]['children']);
        $this->assertCount(0, $results[0]['children'][0]['children']);
        $this->assertInstanceOf(Chapter::class, $results[1]['chapter']);
        $this->assertEquals($excalibur->toArray(), $results[1]['chapter']->toArray());
        $this->assertIsArray($results[1]['children']);
        $this->assertCount(0, $results[1]['children']);
    }

    public function testGetChapterTypeGoodIdExpectedResults()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $achilles = Chapter::where('chapter_name', 'HMS Achilles')->first();

        // Act
        $results = Chapter::getChapterType($achilles->id);

        // Assert
        $this->assertEquals('ship', $results);
    }

    public function testGetChapterTypeBadIdExpectedResults()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $achilles = Chapter::where('chapter_name', 'HMS Achilles')->first();

        // Act
        $results = Chapter::getChapterType('bad-id');

        // Assert
        $this->assertNull($results);
    }

    // Test getChapterLocations

    // Test crewHasNewExams
}
