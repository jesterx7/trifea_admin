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

    public function loginUserApi() {
        $postdata   = file_get_contents("php://input");
        $request    = json_decode($postdata);

        $username   = $request->username;
        $password   = $request->password;

        if ($username) {
            $user  = DB::table('user')
                        ->where('username', '=', $username)
                        ->first();
            if (password_verify($password, $user->password)) {
                $response['data']       = $password;
                $response['status']     = true;
                $response['message']    = 'Login Successfull';
            } else {
                $response['status']     = false;
                $response['message']    = 'Wrong Username / Password';
            }
        } else {
            $response['status']     = false;
            $response['message']    = 'Wrong Username / Password';
        }

        return response()->json($response);
    }
}
