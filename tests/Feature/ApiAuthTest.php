<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class ApiAuthTest extends TestCase
{
    public function test_register_validation()
    {
        $res = $this->postJson('/api/v1/auth/register', []);
        $res->assertStatus(422);
    }
}
