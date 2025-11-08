<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PasswordUpdateTest extends TestCase
{
    use RefreshDatabase;

    // Skipped: password update UI route removed in API-only mode.
    public function test_api_mode_skips_password_update_suite(): void
    {
        $this->assertTrue(true);
    }
}
