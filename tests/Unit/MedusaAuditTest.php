<?php

namespace Tests\Unit;

use App\Audit\MedusaAudit;
use App\Models\Audit;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class MedusaAuditTest extends TestCase
{
    use DatabaseMigrations;

    public function testWriteAuditTrailProvidedParametersExpectedModelCreated(): void
    {
        // Arrange
        $mock = new class {
            use MedusaAudit;

            public function test(): bool {
                return $this->writeAuditTrail(
                    'some member',
                    'some action',
                    'some collection',
                    'some docid',
                    'some values',
                    'some from_where'
                );
            }
        };
        $expectedRecord =  [
            'member_id' => 'some member',
            'action' => 'some action',
            'collection_name' => 'some collection',
            'document_id' => 'some docid',
            'document_values' => 'some values',
            'from_where' => 'some from_where',
        ];

        // Act
        $return = $mock->test();

        // Assert
        $this->assertTrue($return);
        $this->assertDatabaseHas(Audit::class, $expectedRecord);
    }
}
