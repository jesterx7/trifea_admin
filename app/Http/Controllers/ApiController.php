<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ApiController extends Controller
{
    public function getCityListApi() {
    	$cities = DB::table('city')->get();
    	return response()->json($cities);
    }
}
