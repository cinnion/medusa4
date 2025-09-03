<?php

namespace Tests\Unit;

use App\Models\User;
use App\Permissions\MedusaPermissions;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class MedusaPermissionsTest extends TestCase
{
    public function testCheckPermissionsNotLoggedInExpectFalse(): void
    {
        // Arrange.
        Auth::shouldReceive('user')->andReturn(null);
        $mock = new class {
            use MedusaPermissions;
        };

        // Act
        $result = $mock->checkPermissions('');

        // Assert
        $this->assertInstanceOf(RedirectResponse::class, $result);
    }

    public function testCheckPermissionsLoggedInHasAllPermsExpectTrue(): void
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
        $result = $mock->checkPermissions('FOO_PERM');

        // Assert
        $this->assertTrue($result);
    }

    public function testCheckPermissionsLoggedInHasAllPermsSkippedExpectFalse(): void
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
        $result = $mock->checkPermissions('FOO_PERM', true);

        // Assert
        $this->assertInstanceOf(RedirectResponse::class, $result);
    }

    /**
     * @todo Revisit with a feature test.
     */
    public function testCanDeleteExamNoPermissionExpectRedirect()
    {
        // Arrange
        $mock = new class
        {
            use MedusaPermissions;

            public $permissions = [
            ];
        };

        // Act
        $result = $mock->canDeleteExam('100%');

        // Assert
        $this->assertInstanceOf(RedirectResponse::class, $result);
    }

    /**
     * @todo Revisit with a feature test.
     */
    public function testCanDeleteExamEditGradePermissionZeroPercentExpectRedirect()
    {
        // Arrange
        $mock = new class
        {
            use MedusaPermissions;

            public $permissions = [
                'EDIT_GRADE'
            ];
        };

        // Act
        $result = $mock->canDeleteExam('0%');

        // Assert
        $this->assertInstanceOf(RedirectResponse::class, $result);
    }

    public function testCanDeleteExamEditGradePermissionNonZeroPercentExpectTrue()
    {
        // Arrange
        $mock = new class
        {
            use MedusaPermissions;

            public $permissions = [
                'EDIT_GRADE',
            ];
        };
        Auth::shouldReceive('user')->andReturn($mock);

        // Act
        $result = $mock->canDeleteExam('10%');

        // Assert
        $this->assertTrue($result);
    }

    public function testCanDeleteExamUploadExamsPermissionZeroPercentExpectTrue()
    {
        // Arrange
        $mock = new class
        {
            use MedusaPermissions;

            public $permissions = [
                'UPLOAD_EXAMS',
            ];
        };
        Auth::shouldReceive('user')->andReturn($mock);

        // Act
        $result = $mock->canDeleteExam('0%');

        // Assert
        $this->assertTrue($result);
    }

    public function testHasDutyRosterForAssignedShipHasAllPermissionsExpectTrue(): void
    {
        // Arrange.
        $mock = new class
        {
            use MedusaPermissions;

            public $permissions = [
                'ALL_PERMS',
            ];
        };
        Auth::shouldReceive('user')->andReturn($mock);

        // Act
        $result = $mock->hasDutyRosterForAssignedShip();

        // Assert
        $this->assertTrue($result);
    }

    public function testHasDutyRosterForAssignedShipDoesNotHaveDutyRosterExpectFalse(): void
    {
        // Arrange.
        $mock = new class
        {
            use MedusaPermissions;

            public $permissions = [
            ];
        };
        Auth::shouldReceive('user')->andReturn($mock);

        // Act
        $result = $mock->hasDutyRosterForAssignedShip();

        // Assert
        $this->assertFalse($result);
    }

    public function testHasDutyRosterForAssignedShipHasDutyRosterNotInRosterExpectFalse(): void
    {
        // Arrange.
        $mock = new class
        {
            use MedusaPermissions;

            public $permissions = [
                'DUTY_ROSTER',
            ];

            public $duty_roster = 'ABC, DEF';

            public function getAssignedShip(): string
            {
                return 'XYZ';
            }
        };
        Auth::shouldReceive('user')->andReturn($mock);

        // Act
        $result = $mock->hasDutyRosterForAssignedShip();

        // Assert
        $this->assertFalse($result);
    }

    public function testHasDutyRosterForAssignedShipHasDutyRosterInRosterExpectTrue(): void
    {
        // Arrange.
        $mock = new class
        {
            use MedusaPermissions;

            public $permissions = [
                'DUTY_ROSTER',
            ];

            public $duty_roster = 'XYZ, ABC';

            public function getAssignedShip(): string
            {
                return 'XYZ';
            }
        };
        Auth::shouldReceive('user')->andReturn($mock);

        // Act
        $result = $mock->hasDutyRosterForAssignedShip();

        // Assert
        $this->assertTrue($result);
    }

    /**
     * @todo Revisit with a feature test.
     */
    public function testLoginValidCheckReturnsFalseRedirected(): void
    {
        // Arrange:
        Auth::shouldReceive('check')->andReturn(false);
        $mock = new class {
            use MedusaPermissions;
        };

        // Act
        $result = $mock->loginValid();

        // Assert
        $this->assertInstanceOf(RedirectResponse::class, $result);
    }

    public function testLoginValidCheckReturnsTrueTrueExpected(): void
    {
        // Arrange:
        Auth::shouldReceive('check')->andReturn(true);
        $mock = new class {
            use MedusaPermissions;
        };

        // Act
        $result = $mock->loginValid();

        // Assert
        $this->assertTrue($result);
    }

    public function testHasPermissionNotLoggedInExpectFalse(): void
    {
        // Arrange.
        Auth::shouldReceive('user')->andReturn(null);
        $mock = new class {
            use MedusaPermissions;
        };

        // Act
        $result = $mock->hasPermission('');

        // Assert
        $this->assertFalse($result);
    }

    public function testHasPermissionLoggedInHasAllPermsExpectTrue(): void
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
        $result = $mock->hasPermission('FOO_PERM');

        // Assert
        $this->assertTrue($result);
    }

    public function testHasPermissionLoggedInHasAllPermsSkippedExpectFalse(): void
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
        $result = $mock->hasPermission('FOO_PERM', true);

        // Assert
        $this->assertFalse($result);
    }

    public function testHasPermissionLoggedInHasPermSkippedExpectTrue(): void
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
        $result = $mock->hasPermission('ROSTER');

        // Assert
        $this->assertTrue($result);
    }

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

    public function testHasAllPermissionsNotLoggedInExpectFalse(): void
    {
        // Arrange.
        Auth::shouldReceive('user')->andReturn(null);
        $mock = new class {
            use MedusaPermissions;
        };

        // Act
        $result = $mock->hasAllPermissions();

        // Assert
        $this->assertFalse($result);
    }

    public function testHasAllPermissionsLoggedInHasAllPermsExpectTrue(): void
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
        $result = $mock->hasAllPermissions();

        // Assert
        $this->assertTrue($result);
    }

    public function testHasAllPermissionsLoggedInNoAllPermsExpectFalse(): void
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
        $result = $mock->hasAllPermissions();

        // Assert
        $this->assertFalse($result);
    }

    // Test isInChainOfCommand

    // Test canViewMinorPii

    // Test checkRestrictedAccess

    // Test promotionPointsEditAccess

    // Test canPromote

    // Test
}
