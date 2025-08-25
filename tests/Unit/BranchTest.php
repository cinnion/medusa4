<?php

namespace Tests\Unit;

use App\Models\Branch;
use Database\Seeders\BranchSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class BranchTest extends TestCase
{
    use DatabaseMigrations;

    public function testGetBranchListReturnsExpectedList(): void
    {
        // Arrange
        $this->seed(BranchSeeder::class);
        $expectedBranches = [
            "" => "Select a Branch",
            "CIVIL" => "Civil Service",
            "GSN" => "Grayson Space Navy",
            "IAN" => "Imperial Andermani Navy",
            "RHN" => "Republic of Haven Navy",
            "RMA" => "Royal Manticoran Army",
            "RMACS" => "Royal Manticoran Astro Control Service",
            "RMMC" => "Royal Manticoran Marine Corp",
            "RMMM" => "Royal Manticoran Merchant Marine",
            "RMN" => "Royal Manticoran Navy",
            "SFC" => "Sphinx Forestry Commission",
        ];

        // Act
        $branches = Branch::getBranchList();

        // Assert
        $this->assertIsArray($branches);
        $this->assertEquals($expectedBranches, $branches, 'The branch list does not match the expected values.');
    }

    public function testGetBranchEnhancedListDefaultReturnsExpectedList(): void
    {
        // Arrange
        $this->seed(BranchSeeder::class);

        $expectedBranches = [
            "" => "Select a Branch",
            "DIPLOMATIC" => "Diplomatic Corps",
            "GSN" => "Grayson Space Navy",
            "IAN" => "Imperial Andermani Navy",
            "BASIC" => "RMMM BASIC Division",
            "CATERING" => "RMMM Catering Division",
            "DECK" => "RMMM Deck Division",
            "ENG" => "RMMM Engineering Division",
            "MEDICAL" => "RMMM Medical Division",
            "RHN" => "Republic of Haven Navy",
            "RMA" => "Royal Manticoran Army",
            "RMACS" => "Royal Manticoran Astro Control Service",
            "RMMC" => "Royal Manticoran Marine Corp",
            "RMMM" => "Royal Manticoran Merchant Marine",
            "RMN" => "Royal Manticoran Navy",
            "INTEL" => "Special Intelligence Service",
            "SFC" => "Sphinx Forestry Commission",
        ];

        // Act
        $branches = Branch::getEnhancedBranchList();

        // Assert
        $this->assertIsArray($branches);
        $this->assertEquals($expectedBranches, $branches, 'The branch list does not match the expected values.');
    }

    public function testGetBranchEnhancedListCivilTrueReturnsExpectedList(): void
    {
        // Arrange
        $this->seed(BranchSeeder::class);

        $expectedBranches = [
            "" => "Select a Branch",
            "DIPLOMATIC" => "Diplomatic Corps",
            "GSN" => "Grayson Space Navy",
            "IAN" => "Imperial Andermani Navy",
            "BASIC" => "RMMM BASIC Division",
            "CATERING" => "RMMM Catering Division",
            "DECK" => "RMMM Deck Division",
            "ENG" => "RMMM Engineering Division",
            "MEDICAL" => "RMMM Medical Division",
            "RHN" => "Republic of Haven Navy",
            "RMA" => "Royal Manticoran Army",
            "RMACS" => "Royal Manticoran Astro Control Service",
            "RMMC" => "Royal Manticoran Marine Corp",
            "RMMM" => "Royal Manticoran Merchant Marine",
            "RMN" => "Royal Manticoran Navy",
            "INTEL" => "Special Intelligence Service",
            "SFC" => "Sphinx Forestry Commission",
        ];

        // Act
        $branches = Branch::getEnhancedBranchList(['include_civil_divisions' => true]);

        // Assert
        $this->assertIsArray($branches);
        $this->assertEquals($expectedBranches, $branches, 'The branch list does not match the expected values.');
    }

    public function testGetBranchEnhancedListCivilFalseReturnsExpectedList(): void
    {
        // Arrange
        $this->seed(BranchSeeder::class);

        $expectedBranches = [
            "" => "Select a Branch",
            "GSN" => "Grayson Space Navy",
            "IAN" => "Imperial Andermani Navy",
            "BASIC" => "RMMM BASIC Division",
            "CATERING" => "RMMM Catering Division",
            "DECK" => "RMMM Deck Division",
            "ENG" => "RMMM Engineering Division",
            "MEDICAL" => "RMMM Medical Division",
            "RHN" => "Republic of Haven Navy",
            "RMA" => "Royal Manticoran Army",
            "RMACS" => "Royal Manticoran Astro Control Service",
            "RMMC" => "Royal Manticoran Marine Corp",
            "RMMM" => "Royal Manticoran Merchant Marine",
            "RMN" => "Royal Manticoran Navy",
            "SFC" => "Sphinx Forestry Commission",
            "CIVIL" => "Civil Service",
        ];

        // Act
        $branches = Branch::getEnhancedBranchList(['include_civil_divisions' => false]);

        // Assert
        $this->assertIsArray($branches);
        $this->assertEquals($expectedBranches, $branches, 'The branch list does not match the expected values.');
    }

    public function testGetBranchEnhancedListRmmmTrueReturnsExpectedList(): void
    {
        // Arrange
        $this->seed(BranchSeeder::class);

        $expectedBranches = [
            "" => "Select a Branch",
            "DIPLOMATIC" => "Diplomatic Corps",
            "GSN" => "Grayson Space Navy",
            "IAN" => "Imperial Andermani Navy",
            "BASIC" => "RMMM BASIC Division",
            "CATERING" => "RMMM Catering Division",
            "DECK" => "RMMM Deck Division",
            "ENG" => "RMMM Engineering Division",
            "MEDICAL" => "RMMM Medical Division",
            "RHN" => "Republic of Haven Navy",
            "RMA" => "Royal Manticoran Army",
            "RMACS" => "Royal Manticoran Astro Control Service",
            "RMMC" => "Royal Manticoran Marine Corp",
            "RMMM" => "Royal Manticoran Merchant Marine",
            "RMN" => "Royal Manticoran Navy",
            "INTEL" => "Special Intelligence Service",
            "SFC" => "Sphinx Forestry Commission",
        ];

        // Act
        $branches = Branch::getEnhancedBranchList(['include_rmmm_divisions' => true]);

        // Assert
        $this->assertIsArray($branches);
        $this->assertEquals($expectedBranches, $branches, 'The branch list does not match the expected values.');
    }

    public function testGetBranchEnhancedListRmmmFalseReturnsExpectedList(): void
    {
        // Arrange
        $this->seed(BranchSeeder::class);

        $expectedBranches = [
            "" => "Select a Branch",
            "DIPLOMATIC" => "Diplomatic Corps",
            "GSN" => "Grayson Space Navy",
            "IAN" => "Imperial Andermani Navy",
            "RHN" => "Republic of Haven Navy",
            "RMA" => "Royal Manticoran Army",
            "RMACS" => "Royal Manticoran Astro Control Service",
            "RMMC" => "Royal Manticoran Marine Corp",
            "RMMM" => "Royal Manticoran Merchant Marine",
            "RMN" => "Royal Manticoran Navy",
            "INTEL" => "Special Intelligence Service",
            "SFC" => "Sphinx Forestry Commission",
        ];

        // Act
        $branches = Branch::getEnhancedBranchList(['include_rmmm_divisions' => false]);

        // Assert
        $this->assertIsArray($branches);
        $this->assertEquals($expectedBranches, $branches, 'The branch list does not match the expected values.');
    }

    public function testGetNavalBranchListReturnsExpectedList(): void
    {
        // Arrange
        $this->seed(BranchSeeder::class);

        $expectedBranches = [
            "" => "Select a Branch",
            "GSN" => "Grayson Space Navy",
            "IAN" => "Imperial Andermani Navy",
            "RHN" => "Republic of Haven Navy",
            "RMN" => "Royal Manticoran Navy",
        ];

        // Act
        $branches = Branch::getNavalBranchList();

        // Assert
        $this->assertIsArray($branches);
        $this->assertEquals($expectedBranches, $branches, 'The branch list does not match the expected values.');
    }

    public function testGetBranchNameRMNReturnsExpectedName(): void
    {
        // Arrange
        $this->seed(BranchSeeder::class);
        $branchCode = 'RMN';
        $expectedBranchName = 'Royal Manticoran Navy';

        // Act
        $branchName = Branch::getBranchName($branchCode);

        // Assert
        $this->assertEquals($expectedBranchName, $branchName, 'The branch name does not match the expected value.');
    }

    public function testGetBranchNameRMMMReturnsExpectedName(): void
    {
        // Arrange
        $this->seed(BranchSeeder::class);
        $branchCode = 'RMMM';
        $expectedBranchName = 'Royal Manticoran Merchant Marine';

        // Act
        $branchName = Branch::getBranchName($branchCode);

        // Assert
        $this->assertEquals($expectedBranchName, $branchName, 'The branch name does not match the expected value.');
    }

    public function testIsMilitaryBranchWithRMNReturnsTrue(): void
    {
        // Arrange
        $branch = new Branch();
        $branch->branch = 'RMN';

        // Act
        $isMilitary = $branch->isMilitaryBranch();

        // Assert
        $this->assertTrue($isMilitary, 'Expected RMN to be identified as a military branch.');
    }

    public function testIsMilitaryBranchWithRMMCReturnsTrue(): void
    {
        // Arrange
        $branch = new Branch();
        $branch->branch = 'RMMC';

        // Act
        $isMilitary = $branch->isMilitaryBranch();

        // Assert
        $this->assertTrue($isMilitary, 'Expected RMMC to be identified as a military branch.');
    }

    public function testIsMilitaryBranchWithRMAReturnsTrue(): void
    {
        // Arrange
        $branch = new Branch();
        $branch->branch = 'RMA';

        // Act
        $isMilitary = $branch->isMilitaryBranch();

        // Assert
        $this->assertTrue($isMilitary, 'Expected RMA to be identified as a military branch.');
    }
    public function testIsMilitaryBranchWithGSNReturnsTrue(): void
    {
        // Arrange
        $branch = new Branch();
        $branch->branch = 'GSN';

        // Act
        $isMilitary = $branch->isMilitaryBranch();

        // Assert
        $this->assertTrue($isMilitary, 'Expected GSN to be identified as a military branch.');
    }

    public function testIsMilitaryBranchWithRHNReturnsTrue(): void
    {
        // Arrange
        $branch = new Branch();
        $branch->branch = 'RHN';

        // Act
        $isMilitary = $branch->isMilitaryBranch();

        // Assert
        $this->assertTrue($isMilitary, 'Expected RHN to be identified as a military branch.');
    }

    public function testIsMilitaryBranchWithIANReturnsTrue(): void
    {
        // Arrange
        $branch = new Branch();
        $branch->branch = 'IAN';

        // Act
        $isMilitary = $branch->isMilitaryBranch();

        // Assert
        $this->assertTrue($isMilitary, 'Expected IAN to be identified as a military branch.');
    }

    public function testIsMilitaryBranchWithCIVILReturnsFalse(): void
    {
        // Arrange
        $branch = new Branch();
        $branch->branch = 'CIVIL';

        // Act
        $isMilitary = $branch->isMilitaryBranch();

        // Assert
        $this->assertFalse($isMilitary, 'Expected CIVIL to NOT be identified as a military branch.');
    }

    public function testIsMilitaryBranchWithSFCReturnsFalse(): void
    {
        // Arrange
        $branch = new Branch();
        $branch->branch = 'SFC';

        // Act
        $isMilitary = $branch->isMilitaryBranch();

        // Assert
        $this->assertFalse($isMilitary, 'Expected SFC to NOT be identified as a military branch.');
    }

    public function testIsMilitaryBranchWithRMMMReturnsFalse(): void
    {
        // Arrange
        $branch = new Branch();
        $branch->branch = 'RMMM';

        // Act
        $isMilitary = $branch->isMilitaryBranch();

        // Assert
        $this->assertFalse($isMilitary, 'Expected RMMM to NOT be identified as a military branch.');
    }

    public function testIsMilitaryBranchWithRMACSReturnsFalse(): void
    {
        // Arrange
        $branch = new Branch();
        $branch->branch = 'RMACS';

        // Act
        $isMilitary = $branch->isMilitaryBranch();

        // Assert
        $this->assertFalse($isMilitary, 'Expected RMACS to NOT be identified as a military branch.');
    }

    public function testIsCivilianBranchWithRMNReturnsFalse(): void
    {
        // Arrange
        $branch = new Branch();
        $branch->branch = 'RMN';

        // Act
        $isCivilian = $branch->isCivilianBranch();

        // Assert
        $this->assertFalse($isCivilian, 'Expected RMN to NOT be identified as a civilian branch.');
    }

    public function testIsCivilianBranchWithRMMCReturnsFalse(): void
    {
        // Arrange
        $branch = new Branch();
        $branch->branch = 'RMMC';

        // Act
        $isCivilian = $branch->isCivilianBranch();

        // Assert
        $this->assertFalse($isCivilian, 'Expected RMMC to NOT be identified as a civilian branch.');
    }

    public function testIsCivilianBranchWithRMAReturnsFalse(): void
    {
        // Arrange
        $branch = new Branch();
        $branch->branch = 'RMA';

        // Act
        $isCivilian = $branch->isCivilianBranch();

        // Assert
        $this->assertFalse($isCivilian, 'Expected RMA to NOT be identified as a civilian branch.');
    }
    public function testIsCivilianBranchWithGSNReturnsFalse(): void
    {
        // Arrange
        $branch = new Branch();
        $branch->branch = 'GSN';

        // Act
        $isCivilian = $branch->isCivilianBranch();

        // Assert
        $this->assertFalse($isCivilian, 'Expected GSN to NOT be identified as a civilian branch.');
    }

    public function testIsCivilianBranchWithRHNReturnsFalse(): void
    {
        // Arrange
        $branch = new Branch();
        $branch->branch = 'RHN';

        // Act
        $isCivilian = $branch->isCivilianBranch();

        // Assert
        $this->assertFalse($isCivilian, 'Expected RHN to NOT be identified as a civilian branch.');
    }

    public function testIsCivilianBranchWithIANReturnsFalse(): void
    {
        // Arrange
        $branch = new Branch();
        $branch->branch = 'IAN';

        // Act
        $isCivilian = $branch->isCivilianBranch();

        // Assert
        $this->assertFalse($isCivilian, 'Expected IAN to NOT be identified as a civilian branch.');
    }

    public function testIsCivilianBranchWithCIVILReturnsTrue(): void
    {
        // Arrange
        $branch = new Branch();
        $branch->branch = 'CIVIL';

        // Act
        $isCivilian = $branch->isCivilianBranch();

        // Assert
        $this->assertTrue($isCivilian, 'Expected CIVIL to be identified as a civilian branch.');
    }

    public function testIsCivilianBranchWithSFCReturnsTrue(): void
    {
        // Arrange
        $branch = new Branch();
        $branch->branch = 'SFC';

        // Act
        $isCivilian = $branch->isCivilianBranch();

        // Assert
        $this->assertTrue($isCivilian, 'Expected SFC to be identified as a civilian branch.');
    }

    public function testIsCivilianBranchWithRMMMReturnsTrue(): void
    {
        // Arrange
        $branch = new Branch();
        $branch->branch = 'RMMM';

        // Act
        $isCivilian = $branch->isCivilianBranch();

        // Assert
        $this->assertTrue($isCivilian, 'Expected RMMM to be identified as a civilian branch.');
    }

    public function testIsCivilianBranchWithRMACSReturnsTrue(): void
    {
        // Arrange
        $branch = new Branch();
        $branch->branch = 'RMACS';

        // Act
        $isCivilian = $branch->isCivilianBranch();

        // Assert
        $this->assertTrue($isCivilian, 'Expected RMACS to be identified as a civilian branch.');
    }
}
