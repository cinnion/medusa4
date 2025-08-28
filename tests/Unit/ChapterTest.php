<?php

namespace Tests\Unit;

use App\Models\Chapter;
use App\Models\User;
use Database\Seeders\ChapterSeeder;
use Database\Seeders\MedusaConfigSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
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
        $this->seed(MedusaConfigSeeder::class);;
        $expectedChapters = [
            'Holding Chapters' => [
                '55fa1800e4bed82e078b4796' => 'GNSS Katherine Mayhew',
                '55fa1800e4bed82e078b4794' => 'HMSS Hephaestus',
            ],
            'Fleet Holding Chapters' => [],
            'Headquarters' => [
                '55fa1800e4bed82e078b4782' => 'Admiralty House (RMN)',
            ],
            'Bureaus' => [],
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
            'Task Groups' => [],
            'Squadrons' => [],
            'Marine Expeditionary Forces ' => [],
            'Divisions' => [],
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
            'Grand Duchy' => [],
            'RMN' => [
                '55fa1833e4bed832078b45dc' => 'HMS Achilles',
                '55fa1833e4bed832078b457e' => 'HMS Truculent',
            ],
            'RMMC' => [],
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
            'Corporate Committee' => [],
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
        $this->seed(MedusaConfigSeeder::class);;
        $expectedChapters = [
            'Holding Chapters' => [
                '55fa1800e4bed82e078b4796' => 'GNSS Katherine Mayhew',
                '55fa1800e4bed82e078b4794' => 'HMSS Hephaestus',
            ],
            'Fleet Holding Chapters' => [],
            'Headquarters' => [
                '55fa1800e4bed82e078b4782' => 'Admiralty House (RMN)',
            ],
            'Bureaus' => [],
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
            'Task Groups' => [],
            'Squadrons' => [],
            'Marine Expeditionary Forces ' => [],
            'Divisions' => [],
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
            'Grand Duchy' => [],
            'RMN' => [
                '55fa1833e4bed832078b45dc' => 'HMS Achilles',
                '55fa1833e4bed832078b457e' => 'HMS Truculent',
            ],
            'RMMC' => [],
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
            'Corporate Committee' => [],
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
        $this->seed(MedusaConfigSeeder::class);;
        $expectedChapters = [
            'Holding Chapters' => [
                '55fa1800e4bed82e078b4796' => 'GNSS Katherine Mayhew',
                '55fa1800e4bed82e078b4794' => 'HMSS Hephaestus',
            ],
            'RMN' => [
                '55fa1833e4bed832078b45dc' => 'HMS Achilles',
                '55fa1833e4bed832078b457e' => 'HMS Truculent',
            ],
            'RMMC' => [],
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

    public function testFindPeerByLandBaronExpectedUser()
    {
        // Arrange
        $this->seed(ChapterSeeder::class);
        $this->seed(UserSeeder::class);
        $chapter = Chapter::where('chapter_name', 'Serpent Head Point')->first();
        $expectedUser = User::where('email_address', 'david@example.com')->first();

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
}
