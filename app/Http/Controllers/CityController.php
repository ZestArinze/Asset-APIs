<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * get cities belonging to a state
     */
    public function index(Request $request, $id) {

        $state = State::find($id);
        
        if(!$state) {
            return response()->json([
                'status' => false,
                'message' => 'No such state',
                'data' => null,
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Cities retrieved',
            'data' => $state->cities,
        ]);
    }
}
