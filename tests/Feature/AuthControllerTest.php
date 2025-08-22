<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function testSignoutRedirectsToHomepage(): void
    {
        $user = User::factory()->create([
            'email_address' => 'admin@example.com',
            'password' => bcrypt('password123'),
        ]);

        $this->actingAs($user);

        $response = $this->withSession(['some_key', 'some value'])->get('/signout');

        $response->assertRedirect('/');

        $this->assertGuest();
        $this->assertNull(Session::get('some_key'));
    }

    public function testGuestAttemptedSignoutRedirectsToHomepage(): void
    {
        $this->actingAsGuest();

        $response = $this->withSession(['some_key', 'some value'])->get('/signout');

        $response->assertRedirect('/');

        $this->assertGuest();
        $this->assertNull(Session::get('some_key'));
    }
    public function testSigninWithNoCredentialsGetErrors(): void
    {
        $response = $this->post('/signin', [
            'email' => '',
            'password' => '',
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHasErrors(['email', 'password']);
        $this->assertGuest();
    }

    public function testSigninWithInvalidCredentialsGetErrors(): void
    {
        $response = $this->post('/signin', [
            'email' => 'someuser@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect('');
        $response->assertSessionHas('message', 'Your username/password combination was incorrect');
        $this->assertGuest();
    }

    public function testSigninWithValidCredentialsNoRedirectRedirectsToHomepage(): void
    {
        $user = User::factory()->create([
            'email_address' => 'admin@example.com',
            'password' => bcrypt('password123'),
            'active' => 1,
        ]);

        $response = $this->post('/signin', ['email' => 'admin@example.com', 'password' => 'password123']);

        $user_post = User::where(['email_address' => 'admin@example.com'])->first();

        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
        $this->assertNotNull($user_post->last_login, 'Last_login not updated');
        $this->assertEquals($user->id, Auth::id());
    }

    public function testSigninWithValidCredentialsWithRedirectToSigninRedirectsToHomepage(): void
    {
        $this->markTestSkipped('Router appears to hijack the request before it gets to the controller due to redirect_to.');

        $user = User::factory()->create([
            'email_address' => 'admin@example.com',
            'password' => bcrypt('password123'),
            'active' => 1,
        ]);

        $response = $this->post('/signin', [
            'email' => 'admin@example.com',
            'password' => 'password123',
            'redirect_to' => 'signin',
        ]);

        $user_post = User::where(['email_address' => 'admin@example.com'])->first();

        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
        $this->assertNotNull($user_post->last_login, 'Last_login not updated');
        $this->assertEquals($user->id, Auth::id());
    }
}
