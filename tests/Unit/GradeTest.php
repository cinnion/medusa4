<?php

namespace Tests\Unit;

use App\Models\Grade;
use Database\Seeders\GradeSeeder;
use Database\Seeders\MedusaConfigSeeder;
use Database\Seeders\RatingSeeder;
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
        $requirements = Grade::getRequirements('E-2');

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

    public function testGetRankTitleRMNE5GetsCorrectTitle()
    {
        // Arrange
        $this->seed(GradeSeeder::class);
        $this->seed(RatingSeeder::class);

        // Act
        $rankTitle = Grade::getRankTitle('E-5', 'SRN-05', 'RMN');

        // Assert
        $this->assertIsString($rankTitle);
        $this->assertEquals('Coxswain Petty Officer 2/c', $rankTitle);
    }

    public function testGetRankTitleCIVILC5GetsCorrectTitle()
    {
        // Arrange
        $this->seed(GradeSeeder::class);
        $this->seed(RatingSeeder::class);

        // Act
        $rankTitle = Grade::getRankTitle('C-5', null, 'CIVIL');

        // Assert
        $this->assertIsString($rankTitle);
        $this->assertEquals('Consular Attaché', $rankTitle);
    }

    public function testGetRankTitleRMMMC5DefaultRateGetsCorrectTitle()
    {
        // Arrange
        $this->seed(GradeSeeder::class);
        $this->seed(RatingSeeder::class);

        // Act
        $rankTitle = Grade::getRankTitle('C-5', null, 'RMMM');

        // Assert
        $this->assertIsString($rankTitle);
        $this->assertEquals('Steward', $rankTitle);
    }

    public function testGetRankTitleRMMMC5DeckRateGetsCorrectTitle()
    {
        // Arrange
        $this->seed(GradeSeeder::class);
        $this->seed(RatingSeeder::class);

        // Act
        $rankTitle = Grade::getRankTitle('C-5', 'DECK', 'RMMM');

        // Assert
        $this->assertIsString($rankTitle);
        $this->assertEquals('Efficient Spacer', $rankTitle);
    }

    public function testGetGradesForBranchRMNReturnsCorrectGrades()
    {
        // Arrange
        $this->seed(GradeSeeder::class);
        $this->seed(RatingSeeder::class);

        $expectedGrades = [
            "Enlisted" => [
                "E-1" => "Spacer 3rd Class (E-1)",
                "E-2" => "Spacer 2nd Class (E-2)",
                "E-3" => "Spacer 1st Class (E-3)",
                "E-4" => "Petty Officer 3rd Class (E-4)",
                "E-5" => "Petty Officer 2nd Class (E-5)",
                "E-6" => "Petty Officer 1st Class (E-6)",
                "E-7" => "Chief Petty Officer (E-7)",
                "E-8" => "Senior Chief Petty Officer (E-8)",
                "E-9" => "Master Chief Petty Officer (E-9)",
                "E-10" => "Senior Master Chief Petty Officer (E-10)",
            ],
            "Warrant Officer" => [
                "WO-1" => "Warrant Officer (WO-1)",
                "WO-2" => "Warrant Officer 1st Class (WO-2)",
                "WO-3" => "Chief Warrant Officer (WO-3)",
                "WO-4" => "Senior Chief Warrant Officer (WO-4)",
                "WO-5" => "Master Chief Warrant Officer (WO-5)",
            ],
            "Officer" => [
                "O-1" => "Ensign (O-1)",
                "O-2" => "Lieutenant (JG) (O-2)",
                "O-3" => "Lieutenant (SG) (O-3)",
                "O-4" => "Lieutenant Commander (O-4)",
                "O-5" => "Commander (O-5)",
                "O-6-A" => "Captain (JG) (O-6-A)",
                "O-6-B" => "Captain (SG) (O-6-B)",
            ],
            "Flag Officer" => [
                "F-1" => "Commodore (F-1)",
                "F-2-A" => "Rear Admiral of the Red (F-2-A)",
                "F-2-B" => "Rear Admiral of the Green (F-2-B)",
                "F-3-A" => "Vice Admiral of the Red (F-3-A)",
                "F-3-B" => "Vice Admiral of the Green (F-3-B)",
                "F-4-A" => "Admiral of the Red (F-4-A)",
                "F-4-B" => "Admiral of the Green (F-4-B)",
                "F-5-A" => "Fleet Admiral of the Red (F-5-A)",
                "F-5-B" => "Fleet Admiral of the Green (F-5-B)",
                "F-6" => "Admiral of the Fleet (F-6)",
            ],
        ];

        // Act
        $grades = Grade::getGradesForBranch('RMN');

        // Assert
        $this->assertIsArray($grades, 'Grades is not an array');
        $this->assertCount(4, $grades, 'Grades does not contain 4 categories');
        $this->assertEquals($expectedGrades, $grades, 'Grades do not match expected structure and values');
    }

    public function testGradesForBranchRMNDefaultReturnsRMNOfficerGradesWithSuffix()
    {
        // Arrange
        $this->seed(GradeSeeder::class);
        $this->seed(RatingSeeder::class);

        $expectedGrades = [
            "O-1" => "Ensign (O-1)",
            "O-2" => "Lieutenant (JG) (O-2)",
            "O-3" => "Lieutenant (SG) (O-3)",
            "O-4" => "Lieutenant Commander (O-4)",
            "O-5" => "Commander (O-5)",
            "O-6-A" => "Captain (JG) (O-6-A)",
            "O-6-B" => "Captain (SG) (O-6-B)",
        ];

        // Act
        $grades = Grade::gradesForBranchForSelect('RMN', 'O');

        // Assert
        $this->assertIsArray($grades, 'Grades is not an array');
        $this->assertCount(7, $grades, 'Grades does not contain 1 categories');
        $this->assertEquals($expectedGrades, $grades, 'Grades do not match expected structure and values');
    }

    public function testGradesForBranchRMNFalseReturnsRMNOfficerGradesWithSuffix()
    {
        // Arrange
        $this->seed(GradeSeeder::class);
        $this->seed(RatingSeeder::class);

        $expectedGrades = [
            "O-1" => "Ensign",
            "O-2" => "Lieutenant (JG)",
            "O-3" => "Lieutenant (SG)",
            "O-4" => "Lieutenant Commander",
            "O-5" => "Commander",
            "O-6-A" => "Captain (JG)",
            "O-6-B" => "Captain (SG)",
        ];

        // Act
        $grades = Grade::gradesForBranchForSelect('RMN', 'O', false);

        // Assert
        $this->assertIsArray($grades, 'Grades is not an array');
        $this->assertCount(7, $grades, 'Grades does not contain 1 categories');
        $this->assertEquals($expectedGrades, $grades, 'Grades do not match expected structure and values');
    }

    public function testGradesForBranchBadFilterFalseReturnsRMNGradesWithoutSuffix()
    {
        // Arrange
        $this->seed(GradeSeeder::class);
        $this->seed(RatingSeeder::class);

        $expectedGrades = [
            "O-1" => "Ensign",
            "O-2" => "Lieutenant (JG)",
            "O-3" => "Lieutenant (SG)",
            "O-4" => "Lieutenant Commander",
            "O-5" => "Commander",
            "O-6-A" => "Captain (JG)",
            "O-6-B" => "Captain (SG)",
            'E-1' => 'Spacer 3rd Class',
            'E-2' => 'Spacer 2nd Class',
            'E-3' => 'Spacer 1st Class',
            'E-4' => 'Petty Officer 3rd Class',
            'E-5' => 'Petty Officer 2nd Class',
            'E-6' => 'Petty Officer 1st Class',
            'E-7' => 'Chief Petty Officer',
            'E-8' => 'Senior Chief Petty Officer',
            'E-9' => 'Master Chief Petty Officer',
            'E-10' => 'Senior Master Chief Petty Officer',
            'F-1' => 'Commodore',
            'F-2-A' => 'Rear Admiral of the Red',
            'F-2-B' => 'Rear Admiral of the Green',
            'F-3-A' => 'Vice Admiral of the Red',
            'F-3-B' => 'Vice Admiral of the Green',
            'F-4-A' => 'Admiral of the Red',
            'F-4-B' => 'Admiral of the Green',
            'F-5-A' => 'Fleet Admiral of the Red',
            'F-5-B' => 'Fleet Admiral of the Green',
            'F-6' => 'Admiral of the Fleet',
            'MID' => 'Midshipman',
            'WO-1' => 'Warrant Officer',
            'WO-2' => 'Warrant Officer 1st Class',
            'WO-3' => 'Chief Warrant Officer',
            'WO-4' => 'Senior Chief Warrant Officer',
            'WO-5' => 'Master Chief Warrant Officer',
        ];

        // Act
        $grades = Grade::gradesForBranchForSelect('RMN', 'G', false);

        // Assert
        $this->assertIsArray($grades, 'Grades is not an array');
        $this->assertCount(33, $grades, 'Grades does not contain 33 grades');
        $this->assertEquals($expectedGrades, $grades, 'Grades do not match expected structure and values');
    }

}
