<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_view_is_disabled()
    {
        $response = $this->get('/register');

        $response->assertStatus(404);
    }

    public function test_registration_post_is_disabled()
    {
        $response = $this->post('/register');

        $response->assertStatus(404);
    }
}
