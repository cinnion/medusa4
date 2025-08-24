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
        $this->assertCount(7, $grades, 'Grades does not contain 7 categories');
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
        $this->assertCount(7, $grades, 'Grades does not contain 7 categories');
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

    public function testGetGradesForBranchUnFilteredRMNReturnsAllRMNGrades()
    {
        // Arrange
        $this->seed(GradeSeeder::class);
        $this->seed(RatingSeeder::class);
        $this->seed(MedusaConfigSeeder::class);;

        $expectedGrades = [
            [
                'E-1',
                'Spacer 3rd Class',
            ],
            [
                'E-2',
                'Spacer 2nd Class',
            ],
            [
                'E-3',
                'Spacer 1st Class',
            ],
            [
                'E-4',
                'Petty Officer 3rd Class',
            ],
            [
                'E-5',
                'Petty Officer 2nd Class',
            ],
            [
                'E-6',
                'Petty Officer 1st Class',
            ],
            [
                'E-7',
                'Chief Petty Officer',
            ],
            [
                'E-8',
                'Senior Chief Petty Officer',
            ],
            [
                'E-9',
                'Master Chief Petty Officer',
            ],
            [
                'E-10',
                'Senior Master Chief Petty Officer',
            ],
            [
                'WO-1',
                'Warrant Officer',
            ],
            [
                'WO-2',
                'Warrant Officer 1st Class',
            ],
            [
                'WO-3',
                'Chief Warrant Officer',
            ],
            [
                'WO-4',
                'Senior Chief Warrant Officer',
            ],
            [
                'WO-5',
                'Master Chief Warrant Officer',
            ],
            [
                'O-1',
                'Ensign',
            ],
            [
                'O-2',
                'Lieutenant (JG)',
            ],
            [
                'O-3',
                'Lieutenant (SG)',
            ],
            [
                'O-4',
                'Lieutenant Commander',
            ],
            [
                'O-5',
                'Commander',
            ],
            [
                'O-6-A',
                'Captain (JG)',
            ],
            [
                'O-6-B',
                'Captain (SG)',
            ],
            [
                'F-1',
                'Commodore',
            ],
            [
                'F-2-A',
                'Rear Admiral of the Red',
            ],
            [
                'F-2-B',
                'Rear Admiral of the Green',
            ],
            [
                'F-3-A',
                'Vice Admiral of the Red',
            ],
            [
                'F-3-B',
                'Vice Admiral of the Green',
            ],
            [
                'F-4-A',
                'Admiral of the Red',
            ],
            [
                'F-4-B',
                'Admiral of the Green',
            ],
            [
                'F-5-A',
                'Fleet Admiral of the Red',
            ],
            [
                'F-5-B',
                'Fleet Admiral of the Green',
            ],
            [
                'F-6',
                'Admiral of the Fleet',
            ],
        ];

        // Act
        $grades = Grade::getGradesForBranchUnFiltered('RMN');

        // Assert
        $this->assertIsArray($grades, 'Grades is not an array');
        $this->assertCount(32, $grades, 'Grades does not contain 32 categories');
        $this->assertEquals($expectedGrades, $grades, 'Grades do not match expected structure and values');
    }

    public function testGetGradesForBranchUnFilteredDiplomaticReturnsAllDiplomaticGrades()
    {
        // Arrange
        $this->seed(GradeSeeder::class);
        $this->seed(RatingSeeder::class);
        $this->seed(MedusaConfigSeeder::class);;

        $expectedGrades = [
            [
                'C-1',
                'Consulate Staff',
            ],
            [
                'C-2',
                'Senior Consulate Staff',
            ],
            [
                'C-3',
                'Junior Attaché',
            ],
            [
                'C-4',
                'Attaché',
            ],
            [
                'C-5',
                'Consular Attaché',
            ],
            [
                'C-6',
                'Senior Consular Attaché',
            ],
            [
                'C-7',
                'Third Secretary',
            ],
            [
                'C-8',
                'Second Secretary',
            ],
            [
                'C-9',
                'First Secretary',
            ],
            [
                'C-10',
                'Senior Administrator',
            ],
            [
                'C-11',
                'Foreign Service Officer',
            ],
            [
                'C-12',
                'Vice Consul',
            ],
            [
                'C-13',
                'Counselor',
            ],
            [
                'C-14',
                'Minister-Counselor',
            ],
            [
                'C-15',
                'Minister',
            ],
            [
                'C-16',
                'Ambassador',
            ],
            [
                'C-17',
                'Legate',
            ],
            [
                'C-18',
                'Special Envoy',
            ],
            [
                'C-19',
                'Permanent Representative',
            ],
            [
                'C-20',
                'Minister Resident',
            ],
            [
                'C-21',
                'Ambassador at Large',
            ],
            [
                'C-22',
                'Home Secretary',
            ],
        ];

        // Act
        $grades = Grade::getGradesForBranchUnFiltered('DIPLOMATIC');

        // Assert
        $this->assertIsArray($grades, 'Grades is not an array');
        $this->assertCount(22, $grades, 'Grades does not contain 22 categories');
        $this->assertEquals($expectedGrades, $grades, 'Grades do not match expected structure and values');
    }

    /**
     * INTEL has no grades associated with it in the seeders.
     */
    public function testGetGradesForBranchUnFilteredIntelReturnsEmptyArray()
    {
        // Arrange
        $this->seed(GradeSeeder::class);
        $this->seed(RatingSeeder::class);
        $this->seed(MedusaConfigSeeder::class);;

        $expectedGrades = [
        ];

        // Act
        $grades = Grade::getGradesForBranchUnFiltered('INTEL');

        // Assert
        $this->assertIsArray($grades, 'Grades is not an array');
        $this->assertCount(0, $grades, 'Grades does not contain 0 categories');
        $this->assertEquals($expectedGrades, $grades, 'Grades do not match expected structure and values');
    }
    public function testGetGradesForBranchUnFilteredDECKReturnsAllDECKGrades()
    {
        // Arrange
        $this->seed(GradeSeeder::class);
        $this->seed(RatingSeeder::class);
        $this->seed(MedusaConfigSeeder::class);;

        $expectedGrades = [
            [
                'C-1',
                'Apprentice Spacer',
            ],
            [
                'C-2',
                'General Vessel Assistant',
            ],
            [
                'C-3',
                'Ordinary Spacer',
            ],
            [
                'C-4',
                'Senior Ordinary Spacer',
            ],
            [
                'C-5',
                'Efficient Spacer',
            ],
            [
                'C-6',
                'Able Spacer',
            ],
            [
                'C-7',
                'Leading Spacer',
            ],
            [
                'C-8',
                'Certified Bosun',
            ],
            [
                'C-9',
                'Patrolman',
            ],
            [
                'C-10',
                'President',
            ],
            [
                'C-11',
                'Fourth Officer',
            ],
            [
                'C-12',
                'Third Officer',
            ],
            [
                'C-13',
                'Second Officer',
            ],
            [
                'C-14',
                'Senior Second Officer',
            ],
            [
                'C-15',
                'First Officer',
            ],
            [
                'C-16',
                'Master',
            ],
            [
                'C-17',
                'Fleet Manager',
            ],
            [
                'C-18',
                'Superintendent',
            ],
            [
                'C-19',
                'Managing Director',
            ],
            [
                'C-20',
                'Owner',
            ],
            [
                'C-21',
                'Board Director',
            ],
            [
                'C-22',
                'Home Secretary',
            ],
        ];

        // Act
        $grades = Grade::getGradesForBranchUnFiltered('DECK');

        // Assert
        $this->assertIsArray($grades, 'Grades is not an array');
        $this->assertCount(22, $grades, 'Grades does not contain 22 categories');
        $this->assertEquals($expectedGrades, $grades, 'Grades do not match expected structure and values');
    }

    public function testGetGradesForBranchUnFilteredFOOReturnsEmptyArray()
    {
        // Arrange
        $this->seed(GradeSeeder::class);
        $this->seed(RatingSeeder::class);
        $this->seed(MedusaConfigSeeder::class);;

        $expectedGrades = [
        ];

        // Act
        $grades = Grade::getGradesForBranchUnFiltered('FOO');

        // Assert
        $this->assertIsArray($grades, 'Grades is not an array');
        $this->assertCount(0, $grades, 'Grades does not contain 0 categories');
        $this->assertEquals($expectedGrades, $grades, 'Grades do not match expected structure and values');
    }

//    public function testProvisionalPaygradesCallsFilterGradesMethod()
//    {
//        // Arrange
//        $mock = Mockery::mock(Grade::class)
//            ->shouldAllowMockingProtectedMethods()
//            ->makePartial();
//
//        $mock->shouldReceive('filterGrades')
//            ->once()
//            ->with('PROV')
//            ->andReturn(['PROV-1' => 'Provisional Grade 1']);
//
//        // Act
//        $grades = $mock->provisionalPaygrades();
//
//        // Assert
//        $this->assertIsArray($grades, 'Grades is not an array');
//        $this->assertCount(1, $grades, 'Grades does not contain 1 categories');
//        $this->assertEquals(['PROV-1' => 'Provisional Grade 1'], $grades, 'Grades do not match expected structure and values');
//    }

    public function testIsPaygradeValidWithBranchValidBranchAndPaygradeReturnsTrue()
    {
        // Arrange
        $this->seed(GradeSeeder::class);
        $this->seed(RatingSeeder::class);

        // Act
        $isValid = Grade::isPaygradeValidForBranch('E-5', 'RMN');

        // Assert
        $this->assertTrue($isValid, 'E-5 is not a valid paygrade for RMN');
    }

    public function testIsPaygradeValidWithBranchInvalidBranchAndPaygradeHandlesExceptionReturnsFalse()
    {
        // Arrange
        $this->seed(GradeSeeder::class);
        $this->seed(RatingSeeder::class);

        // Act
        $isValid = Grade::isPaygradeValidForBranch('FOO', 'RMN');

        // Assert
        $this->assertFalse($isValid, 'FOO is not a valid paygrade for RMN');
    }
}
