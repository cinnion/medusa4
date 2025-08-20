<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;


class HomeControllerTest extends TestCase
{
    //use RefreshDatabase;
    public function testUnauthenticatedUserGetsLoginPage(): void
    {
        Auth::shouldReceive('check')->andReturn(false);
        Auth::shouldReceive('user')->andReturn(null);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('login');
    }

    public function testAuthenticatedUserWithoutOsaGetsOsaPage(): void
    {
        $user = User::factory()->create(['osa' => null]);
        Auth::shouldReceive('check')->andReturn(true);
        Auth::shouldReceive('user')->andReturn($user);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('osa');
        $response->assertViewHas('showform', true);
    }

    public function testAuthenticatedUserWithOsaAndWithoutTosGetsTermsPage(): void
    {
        $user = User::factory()->create(['osa' => 'accepted', 'tos' => false]);
        Auth::shouldReceive('check')->andReturn(true);
        Auth::shouldReceive('user')->andReturn($user);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('terms');
    }

    public function testAuthenticatedUserWithOsaAndTosGetsUserPage(): void
    {
        $user = User::factory()->create(['osa' => 'accepted', 'tos' => true]);
        Auth::shouldReceive('check')->andReturn(true);
        Auth::shouldReceive('user')->andReturn($user);

        $response = $this->get('/');

        $response->assertStatus(302);
        $response->assertRedirect(route('user.show', ['user' => $user->_id]));
    }

    public function testOsaPageUnauthGets302(): void
    {
        $response = $this->get('/osa');

        $response->assertStatus(302);
    }

    public function testOsaPageAuthGetsView(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/osa');

        $response->assertStatus(200);
        $response->assertViewIs('osa');
        $response->assertViewHas('showform', false);
    }
}
