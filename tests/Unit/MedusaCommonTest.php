<?php

namespace Tests\Unit;

use App\Common\MedusaCommon;
use PHPUnit\Framework\TestCase;

class MedusaCommonTest extends TestCase
{
    public function testFilterArrayGivenArrayAndRegexExpectedResults(): void
    {
        // Arrange
        $array = [
            'ABC' => 123,
            'XYZ' => 789,
        ];
        $mock = new class {
            use MedusaCommon;

            public function test(array $array, string $regex): array {
                return $this->filterArray($array, $regex);
            }
        };
        $expecting = [
            'ABC' => 123,
        ];

        // Act
        $results = $mock->test($array, '/ABC/');

        // Assert
        $this->assertIsArray($results);
        $this->assertEquals($expecting, $results);
    }

    public function testFilterArrayGivenArrayAndNoneMatchingExpectedResults(): void
    {
        // Arrange
        $array = [
            'ABC' => 123,
            'XYZ' => 789,
        ];
        $mock = new class {
            use MedusaCommon;

            public function test(array $array, string $regex): array {
                return $this->filterArray($array, $regex);
            }
        };
        $expecting = [
        ];

        // Act
        $results = $mock->test($array, '/MNO/');

        // Assert
        $this->assertIsArray($results);
        $this->assertEquals($expecting, $results);
    }

    public function testFilterArrayInverseGivenArrayAndRegexExpectedResults(): void
    {
        // Arrange
        $array = [
            'ABC' => 123,
            'XYZ' => 789,
        ];
        $mock = new class {
            use MedusaCommon;

            public function test(array $array, string $regex): array {
                return $this->filterArrayInverse($array, $regex);
            }
        };
        $expecting = [
            'XYZ' => 789,
        ];

        // Act
        $results = $mock->test($array, '/ABC/');

        // Assert
        $this->assertIsArray($results);
        $this->assertEquals($expecting, $results);
    }

    public function testFilterArrayInverseGivenArrayAndNoneMatchingExpectedResults(): void
    {
        // Arrange
        $array = [
            'ABC' => 123,
            'XYZ' => 789,
        ];
        $mock = new class {
            use MedusaCommon;

            public function test(array $array, string $regex): array {
                return $this->filterArrayInverse($array, $regex);
            }
        };
        $expecting = [
            'ABC' => 123,
            'XYZ' => 789,
        ];

        // Act
        $results = $mock->test($array, '/MNO/');

        // Assert
        $this->assertIsArray($results);
        $this->assertEquals($expecting, $results);
    }
}
