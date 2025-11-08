<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    // Skipped: profile management UI removed in API-only mode.
    public function test_api_mode_skips_profile_suite(): void
    {
        $this->assertTrue(true);
    }
}
