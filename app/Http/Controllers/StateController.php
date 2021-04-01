<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{

    /**
     * get cities belonging to a state
     */
    public function cities(Request $request, $id) {

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

    /**
     * get a state by id
     */
    public function show(Request $request, $id) {

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
            'message' => 'State retrieved',
            'data' => $state,
        ]);
    }
    
}
