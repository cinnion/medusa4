<?php

namespace Tests\Unit;

use App\Models\User;
use App\Permissions\MedusaPermissions;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class MedusaPermissionsTest extends TestCase
{
    // Test checkPermissions

    // Test canDeleteExam

    // Test hasDutyRosterForAssignedShip

    // Test loginValid

    // Test hasPermission

    // Test hasPermissions
    public function testHasPermissionsNotLoggedInExpectFalse(): void
    {
        // Arrange.
        Auth::shouldReceive('user')->andReturn(null);
        $mock = new class {
            use MedusaPermissions;
        };

        // Act
        $result = $mock->hasPermissions('');

        // Assert
        $this->assertFalse($result);
    }

    public function testHasPermissionsLoggedInHasAllPermsExpectTrue(): void
    {
        // Arrange.
        $permissions = [
            'LOGOUT',
            'CHANGE_PWD',
            'EDIT_SELF',
            'ROSTER',
            'TRANSFER',
            'ALL_PERMS',
        ];
        $user = User::factory()->make(['permissions' => $permissions]);
        Auth::shouldReceive('user')->andReturn($user);
        $mock = new class {
            use MedusaPermissions;
        };

        // Act
        $result = $mock->hasPermissions('FOO_PERM');

        // Assert
        $this->assertTrue($result);
    }

    public function testHasPermissionsLoggedInHasAllPermsSkippedExpectFalse(): void
    {
        // Arrange.
        $permissions = [
            'LOGOUT',
            'CHANGE_PWD',
            'EDIT_SELF',
            'ROSTER',
            'TRANSFER',
            'ALL_PERMS',
        ];
        $user = User::factory()->make(['permissions' => $permissions]);
        Auth::shouldReceive('user')->andReturn($user);
        $mock = new class {
            use MedusaPermissions;
        };

        // Act
        $result = $mock->hasPermissions('FOO_PERM', true);

        // Assert
        $this->assertFalse($result);
    }

    public function testHasPermissionsLoggedInHasPermSkippedExpectTrue(): void
    {
        // Arrange.
        $permissions = [
            'LOGOUT',
            'CHANGE_PWD',
            'EDIT_SELF',
            'ROSTER',
            'TRANSFER',
        ];
        $user = User::factory()->make(['permissions' => $permissions]);
        Auth::shouldReceive('user')->andReturn($user);
        $mock = new class {
            use MedusaPermissions;
        };

        // Act
        $result = $mock->hasPermissions('ROSTER');

        // Assert
        $this->assertTrue($result);
    }


    // Test hasAllPermissions

    // Test isInChainOfCommand

    // Test canViewMinorPii

    // Test checkRestrictedAccess

    // Test promotionPointsEditAccess

    // Test canPromote

    // Test
}
