<?php

namespace Tests\Unit;

use App\Models\Rating;
use Database\Seeders\RatingSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RatingTest extends TestCase
{
    use DatabaseMigrations;

    public function testGetRatingsForRMNBranch(): void
    {
        // Arrange
        $this->seed(RatingSeeder::class);

        // Act
        $ratings = Rating::getRatingsForBranch('RMN');

        // Assert
        $this->assertIsArray($ratings, 'Ratings is not an array');
        $this->assertCount(2, $ratings, 'Ratings does not contain 2 items');
        $this->assertArrayHasKey('', $ratings, 'Ratings does not have key for empty string');
        $this->assertEquals('Select a Rating', $ratings[''], 'Ratings empty string key does not have expected value');
        $this->assertArrayHasKey('SRN-05', $ratings, 'Ratings does not have key for SRN-05');
        $this->assertEquals('Coxswain (SRN-05)', $ratings['SRN-05'], 'Ratings SRN-05 key does not have expected value');
    }

    public function testGetRatingsForCivilBranch(): void
    {
        // Arrange
        $this->seed(RatingSeeder::class);

        // Act
        $ratings = Rating::getRatingsForBranch('CIVIL');

        // Assert
        $this->assertIsArray($ratings, 'Ratings is not an array');
        $this->assertCount(3, $ratings, 'Ratings does not contain 2 items');
        $this->assertArrayHasKey('', $ratings, 'Ratings does not have key for empty string');
        $this->assertEquals('Select a Specialty', $ratings[''], 'Ratings empty string key does not have expected value');
        $this->assertArrayHasKey('LORDS', $ratings, 'Ratings does not have key for LORDS');
        $this->assertEquals('House of Lords (LORDS)', $ratings['LORDS'], 'Ratings LORDS key does not have expected value');
    }

    public function testGetRatingsForRMMMBranch(): void
    {
        // Arrange
        $this->seed(RatingSeeder::class);

        // Act
        $ratings = Rating::getRatingsForBranch('RMMM');

        // Assert
        $this->assertIsArray($ratings, 'Ratings is not an array');
        $this->assertCount(3, $ratings, 'Ratings does not contain 2 items');
        $this->assertArrayHasKey('', $ratings, 'Ratings does not have key for empty string');
        $this->assertEquals('Select a Division', $ratings[''], 'Ratings empty string key does not have expected value');
        $this->assertArrayHasKey('DECK', $ratings, 'Ratings does not have key for DECK');
        $this->assertEquals('RMMM Deck Division (DECK)', $ratings['DECK'], 'Ratings DECK key does not have expected value');
    }

    public function testGetRatingsForUnknownBranch(): void
    {
        // Arrange
        $this->seed(RatingSeeder::class);

        // Act
        $ratings = Rating::getRatingsForBranch('UNKNOWN');

        // Assert
        $this->assertIsArray($ratings, 'Ratings is not an array');
        $this->assertCount(1, $ratings, 'Ratings does not contain 1 item');
        $this->assertArrayHasKey('', $ratings, 'Ratings does not have key for empty string');
        $this->assertEquals('No ratings available for this branch', $ratings[''], 'Ratings empty string key does not have expected value');
    }

    public function testGetRateName(): void
    {
        // Arrange
        $this->seed(RatingSeeder::class);

        // Act
        $rateName = Rating::getRateName('SRN-05');

        // Assert
        $this->assertIsString($rateName, 'Rate name is not a string');
        $this->assertEquals('Coxswain', $rateName, 'Rate name does not have expected value');
    }

    public function testGetRateNameForUnknownRateCode(): void
    {
        // Arrange
        $this->seed(RatingSeeder::class);

        // Act
        $rateName = Rating::getRateName('UNKNOWN');

        // Assert
        $this->assertFalse($rateName, 'Rate name is not false for unknown rate code');
    }

    public function testIsPayGradeValidInvalidPaygradeReturnsFalse(): void
    {
        // Arrange
        $this->seed(RatingSeeder::class);

        // Act
        $isValid = Rating::isPayGradeValid('O-1', 'RMN', 'SRN-05');

        // Assert
        $this->assertFalse($isValid, 'RMN SRN-06 does have O-1, should return false');
    }

    public function testIsPayGradeValidInvalidRatingReturnsFalse(): void
    {
        // Arrange
        $this->seed(RatingSeeder::class);

        // Act
        $isValid = Rating::isPayGradeValid('E-5', 'RMN', 'SRN-06');

        // Assert
        $this->assertFalse($isValid, 'RMN SRN-06 does not exist, should return false');
    }
    public function testIsPayGradeValidInvalidBranchReturnsFalse(): void
    {
        // Arrange
        $this->seed(RatingSeeder::class);

        // Act
        $isValid = Rating::isPayGradeValid('E-5', 'RMMM', 'SRN-05');

        // Assert
        $this->assertFalse($isValid, 'RMN SRN-06 does not exist, should return false');
    }
}
