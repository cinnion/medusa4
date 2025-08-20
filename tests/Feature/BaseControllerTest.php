<?php

namespace Tests\Feature;

use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Mockery;
use Tests\TestCase;

class BaseControllerTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function testConstructorHasObjects(): void
    {
        $this->markTestSkipped('guard() is called an cannot determine the guard type in this test.');

        $user = User::factory()->create(['osa' => null]);
        Auth::shouldReceive('check')->andReturn(true);
        Auth::shouldReceive('guard')->andReturn(Mockery::mock(Illuminate\Auth\SessionGuard::class));

        $this->actingAs($user, 'web');

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewHas('permsObj', $this->isInstanceOf(\App\Http\Controllers\Controller::class));
        $response->assertViewHas('user', $user);
    }

    public function testConstructorRedirectsUnauthenticatedUser(): void
    {
        $this->markTestSkipped('guard() is called an cannot determine the guard type in this test.');

        $user = User::factory()->create(['osa' => null]);

        Auth::shouldReceive('check')->andReturn(false);
        Auth::shouldReceive('guard')->once();
        $this->actingAs($user, 'web');

        $response = $this->get('/');

        $response->assertStatus(302);
        $response->assertRedirect(action([HomeController::class, 'index']));
    }
}
