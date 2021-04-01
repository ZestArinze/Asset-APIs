<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    
    /**
     * get a city by id
     */
    public function show(Request $request, $id) {

        $city = City::find($id);

        if(!$city) {
            return response()->json([
                'status' => false,
                'message' => 'No such city',
                'data' => null,
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'City retrieved',
            'data' => $city,
        ]);
    }
}
