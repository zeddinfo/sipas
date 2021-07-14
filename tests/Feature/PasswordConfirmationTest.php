<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PasswordConfirmationTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    public function test_confirm_password_screen_can_be_rendered()
    {
        $user = User::first();

        $response = $this->actingAs($user)->get('/confirm-password');

        $response->assertOk();
    }

    public function test_password_can_be_confirmed()
    {
        $user = User::first();

        $response = $this->actingAs($user)->post('/confirm-password', [
            'password' => '123123',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }

    public function test_password_is_not_confirmed_with_invalid_password()
    {
        $user = User::first();

        $response = $this->actingAs($user)->post('/confirm-password', [
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors();
    }
}
