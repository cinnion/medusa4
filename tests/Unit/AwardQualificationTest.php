<?php

namespace Tests\Unit;

use App\Awards\AwardQualification;
use App\Models\User;
use PHPUnit\Framework\TestCase;

class AwardQualificationTest extends TestCase
{
    // Test mcamQual

    // Test numToNextMcam

    // Test percentNextMcamLeft

    // Test percentNextMcamDone

    // Test swpQual

    public function testIsPassingGrade69ReturnsFalse() : void
    {
        // Arrange
        $mock = new class {
            use AwardQualification;
        };

        // Act
        $result = $mock->isPassingGrade('69%');

        // Assert
        $this->assertFalse($result);
    }

    public function testIsPassingGrade70ReturnsTrue() : void
    {
        // Arrange
        $mock = new class {
            use AwardQualification;
        };

        // Act
        $result = $mock->isPassingGrade('70%');

        // Assert
        $this->assertTrue($result);
    }

    public function testIsPassingGradeBeta50ReturnsTrue() : void
    {
        // Arrange
        $mock = new class {
            use AwardQualification;
        };

        // Act
        $result = $mock->isPassingGrade('BETA 50%');

        // Assert
        $this->assertTrue($result);
    }

    public function testIsPassingGradePass50ReturnsTrue() : void
    {
        // Arrange
        $mock = new class {
            use AwardQualification;
        };

        // Act
        $result = $mock->isPassingGrade('PASS 50%');

        // Assert
        $this->assertTrue($result);
    }

    public function testIsPassingGradeCrea50ReturnsTrue() : void
    {
        // Arrange
        $mock = new class {
            use AwardQualification;
        };

        // Act
        $result = $mock->isPassingGrade('CREA 50%');

        // Assert
        $this->assertTrue($result);
    }

}
