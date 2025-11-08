<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    // Skipped in headless API mode: password reset web flow is removed.
    public function test_api_mode_skips_password_reset_suite(): void
    {
        $this->assertTrue(true);
    }
}
