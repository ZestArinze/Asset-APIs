<?php

namespace Tests\Feature;

use App\Models\Country;
use App\Models\State;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StateTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * a test to get states in a country
     *
     * @return void
     */
    public function test_getStates_success_StatesRetrived()
    {
        $country = Country::factory()->create();
        $state = State::factory()->create([
            'country_id' => $country->id
        ]);

        $response = $this->get('/api/countries/' . $country->id . '/states', [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ]);

        $response->assertJson([
            'status' => true,
            'message' => 'States retrieved',
            'data' => [
                [
                    'id' => $state->id,
                    'name' => $state->name,
                    'country_id' => $country->id
                ],
            ],
        ]);

        $response->assertStatus(200);
    }

    // limiting test cases due to time
}
