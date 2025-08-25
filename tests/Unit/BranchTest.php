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

}
