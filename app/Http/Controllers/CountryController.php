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
}
