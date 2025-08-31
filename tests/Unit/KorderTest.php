<?php

namespace Tests\Unit;

use App\Models\Korder;
use Database\Seeders\KorderSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class KorderTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(KorderSeeder::class);
    }

    public function testGetPrecedenceValidPostnominalGivenExpectedPrecedence()
    {
        // Arrange
        $kingRodger = Korder::where('classes.postnominal', 'GCR')->first();

        // Act
        $precedence = $kingRodger->getPrecedence('GCR');

        // Assert
        $this->assertEquals($kingRodger['classes'][0]['precedence'], $precedence);

    }

    public function testGetPrecedenceOptionsGivenExpectedPrecedence()
    {
        // Arrange
        $kingRodger = Korder::where('classes.postnominal', 'GCR')->first();

        // Act
        $precedence = $kingRodger->getPrecedence(['type' => 'class', 'value' => 'Knight Commander']);

        // Assert
        $this->assertEquals($kingRodger['classes'][1]['precedence'], $precedence);

    }

    public function testGetPrecedenceBadPostnominalGivenExpectedPrecedence()
    {
        // Arrange
        $kingRodger = Korder::where('classes.postnominal', 'GCR')->first();

        // Act
        $precedence = $kingRodger->getPrecedence('XYZ');

        // Assert
        $this->assertFalse($precedence);

    }

    public function testGetClassNameValidPostnominalExpectedClass()
    {
        // Arrange
        $kingRodger = Korder::where('classes.postnominal', 'GCR')->first();

        // Act
        $class = $kingRodger->getClassName('KDR');

        // Assert
        $this->assertEquals('Knight Commander', $class);
    }

    public function testGetClassNameInalidPostnominalExpectedClass()
    {
        // Arrange
        $kingRodger = Korder::where('classes.postnominal', 'GCR')->first();

        // Act
        $class = $kingRodger->getClassName('XYZ');

        // Assert
        $this->assertFalse($class);
    }
}
