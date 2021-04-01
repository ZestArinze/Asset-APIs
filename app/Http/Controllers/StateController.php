<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class StateController extends Controller
{
     /**
     * get states belonging to a country
     */
    public function index(Request $request, $id) {

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
}
