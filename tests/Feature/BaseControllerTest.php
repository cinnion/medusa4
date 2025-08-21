<?php

namespace Tests\Feature;

use App\Http\Controllers\HomeController;
use App\Models\User;
use Tests\TestCase;

class BaseControllerTest extends TestCase
{
    /**
     * Test the base controller class \App\Http\Controllers\Controller.
     */
    public function testConstructorHasObjects(): void
    {
        $user = User::factory()->create();

        $this->actingAsGuest();

        $response = $this->get('/');

        $response->assertStatus(200);
        // This does not work.
        //  $response->assertViewHas('permsObj', $this->isInstanceOf(\App\Http\Controllers\Controller::class));
        $response->assertViewHas('user', null);
    }

    public function testConstructorRedirectsGuestToRoot(): void
    {
        $user = User::factory()->create();

        $this->actingAsGuest();

        $response = $this->get('/osa');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
