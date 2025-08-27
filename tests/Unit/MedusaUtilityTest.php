<?php

namespace Tests\Unit;

use App\Utility\MedusaUtility;
use PHPUnit\Framework\TestCase;

class MedusaUtilityTest extends TestCase
{
    public function testOrdinal()
    {
        $this->assertEquals('First', MedusaUtility::ordinal('1'));
        $this->assertEquals('Second', MedusaUtility::ordinal('2'));
        $this->assertEquals('Third', MedusaUtility::ordinal('3'));
        $this->assertEquals('Fourth', MedusaUtility::ordinal('4'));
        $this->assertEquals('Fifth', MedusaUtility::ordinal('5'));
        $this->assertEquals('Eleventh', MedusaUtility::ordinal('11'));
        $this->assertEquals('Twenty-first', MedusaUtility::ordinal('21'));
        $this->assertEquals('One hundredth', MedusaUtility::ordinal('100'));
    }
}
