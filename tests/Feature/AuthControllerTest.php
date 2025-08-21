<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    public function testSignoutRedirectsToHomepage(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        Session::put('some_key', 'some value');

        $response = $this->get('/signout');

        $response->assertRedirect('/');

        $this->assertGuest();
        $this->assertNull(Session::get('some_key'));
    }
}
