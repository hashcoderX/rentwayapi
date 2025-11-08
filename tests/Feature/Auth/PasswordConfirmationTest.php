<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PasswordConfirmationTest extends TestCase
{
    use RefreshDatabase;

    // Skipped: password confirmation UI route removed in API-only mode.
    public function test_api_mode_skips_password_confirmation_suite(): void
    {
        $this->assertTrue(true);
    }
}
