<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    public function test_reset_password_link_screen_is_not_available(): void
    {
        $response = $this->get('/forgot-password');

        $response->assertStatus(404);
    }

    public function test_reset_password_link_can_not_be_requested(): void
    {
        $response = $this->post('/forgot-password', [
            'email' => 'user@example.com',
        ]);

        $response->assertStatus(404);
    }

    public function test_reset_password_screen_is_not_available(): void
    {
        $response = $this->get('/reset-password/token-example');

        $response->assertStatus(404);
    }

    public function test_password_can_not_be_reset_publicly(): void
    {
        $response = $this->post('/reset-password', [
            'token' => 'token-example',
            'email' => 'user@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(404);
    }
}
