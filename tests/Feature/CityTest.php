<?php

namespace Tests\Feature;

use App\Models\City;
use App\Models\State;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CityTest extends TestCase
{

    use RefreshDatabase;

    /**
     * a test to get cities in a state
     *
     * @return void
     */
    public function test_getCities_success_citiesRetrived()
    {
        // $this->withoutExceptionHandling();

        $state = State::factory()->create();
        $city = City::factory()->create([
            'state_id' => $state->id
        ]);

        $response = $this->get('/api/states/' . $state->id . '/cities', [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ]);

        $response->assertJson([
            "status" => true,
            "message" => "Cities retrieved",      
            'data' => [
                [
                    'id' => $city->id,
                    'name' => $city->name,
                    'state_id' => $state->id
                ],
            ],
        ]);

        $response->assertStatus(200);
    }

    /**
     * a test to get cities for a state that does not exist
     *
     * @return void
     */
    public function test_getCities_failure_stateNotExist()
    {
        // $this->withoutExceptionHandling();

        $city = City::factory()->create();

        $response = $this->get('/api/states/' . 999999 . '/cities', [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ]);

        $response->assertJson([
            "status" => false,
            "message" => "No such state",      
            'data' => null,
        ]);

        $response->assertStatus(404);
    }

    // limiting test cases due to time
}
