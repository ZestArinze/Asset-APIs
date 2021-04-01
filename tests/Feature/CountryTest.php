<?php

namespace Tests\Feature;

use App\Models\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CountryTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_getCountries_success_countriesRetrieved()
    {
        $data = [
            'sortname' => 'NG',
            'name' => 'Nigeria',
            'phonecode' => '234',
        ];

        $country = Country::factory()->create($data);

        $response = $this->get('/api/countries/', [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ]);

        $response->assertJson([
            "status" => true, 
            "message" => "Countries retrieved", 
            "data" => [
               [
                  "id" => $country->id, 
                  "sortname" => $country->sortname, 
                  "name" => $country->name, 
                  "phonecode" => $country->phonecode 
               ] 
            ] 
        ]);

        $response->assertStatus(200);
    }

    // limiting test cases due to time
}
