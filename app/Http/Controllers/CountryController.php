<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    /**
     * get all countries
     */
    public function index() {
        return response()->json([
            'status' => true,
            'message' => 'Countries retrieved',
            'data' => Country::all(),
        ]);
    }

    /**
     * get states belonging to a country
     */
    public function states(Request $request, $id) {

        $country = Country::find($id);

        if(!$country) {
            return response()->json([
                'status' => false,
                'message' => 'No such country',
                'data' => null,
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'States retrieved',
            'data' => $country->states,
        ]);
    }

    /**
     * get a country by id
     */
    public function show(Request $request, $id) {

        $country = Country::find($id);

        if(!$country) {
            return response()->json([
                'status' => false,
                'message' => 'No such country',
                'data' => null,
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Country retrieved',
            'data' => $country,
        ]);
    }
}
