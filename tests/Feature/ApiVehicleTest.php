<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Vehical;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiVehicleTest extends TestCase
{
    // use RefreshDatabase; // Disabled to avoid interfering with existing DB

    public function test_vehicle_index_works()
    {
        $response = $this->getJson('/api/v1/vehicles');
        $response->assertStatus(200)->assertJsonStructure(['success','message','data']);
    }
}
