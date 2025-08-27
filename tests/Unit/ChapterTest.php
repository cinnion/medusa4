<?php

namespace Tests\Unit;

use App\Models\Chapter;
use Database\Seeders\ChapterSeeder;
use Database\Seeders\MedusaConfigSeeder;
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
}
