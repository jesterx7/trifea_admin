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

    public function getTrackAllApi() {
        $track = DB::table('track')->get();

        if ($track) {
            $response['data']       = $track;
            $response['status']     = true;
            $response['message']    = 'Success';
        } else {
            $response['status']     = false;
            $response['message']    = 'No Track Found';
        }

        return response()->json($response);
    }

    public function getBusTypeApi() {
        $busType = DB::table('type')->get();

        if ($busType) {
            $response['data']       = $busType;
            $response['status']     = true;
            $response['message']    = 'Success';
        } else {
            $response['status']     = false;
            $response['message']    = 'No Track Found';
        }
        
        return response()->json($response);
    }

    public function getTripDataApi() {
        $track_id   = $_GET['track'];
        $trip       = DB::table('trip as t')
                        ->select('t.trip_id', 't.fee', 't.city_id', 'c.city_name')
                        ->join('city as c', 't.city_id', '=', 'c.city_id')
                        ->where('t.track_id', '=', $track_id)
                        ->get();
        
        if ($trip) {
            $response['data']       = $trip;
            $response['status']     = true;
            $response['message']    = 'Success';
        } else {
            $response['status']     = false;
            $response['message']    = 'No Track Found';
        }
        
        return response()->json($response);
    }

    public function getDriverLocApi() {
        $postdata   = file_get_contents("php://input");
        $request    = json_decode($postdata);

        $track_id   = $request->track;
        $trip_id    = $request->trip;
        $type_id    = $request->bus_type;

        $schedule   = DB::table('schedule as s')
                            ->select('s.schedule_id', 'b.bus_name', 'b.police_number', 't.fee', 't.type_name', 'e.employee_id', 'e.loc_longitude', 'e.loc_latitude')
                            ->join('bus as b', 's.bus_id', '=', 'b.bus_id')
                            ->join('type as t', 'b.type_id', '=', 't.type_id')
                            ->join('employee as e', 's.driver_id', '=', 'e.employee_id')
                            ->where('t.type_id', '=', $type_id)
                            ->where('s.track_id', '=', $track_id)
                            ->get();
        
        $schedule_list  = [];
        $driver_loc     = [];
        $driver_list    = [];
        foreach ($schedule as $value) {
            $schedule_data   = [];
            $driver_loc      = [];
            
            $schedule_data[] = $value->schedule_id;
            $schedule_data[] = $value->bus_name;
            $schedule_data[] = $value->police_number;
            $schedule_data[] = $value->type_name;
            $schedule_data[] = $value->fee;

            $driver_data['loc_latitude']    = $value->loc_latitude;
            $driver_data['loc_longitude']   = $value->loc_longitude;

            $schedule_list[] = $schedule_data;
            $driver_loc[]    = $driver_data;
            $driver_list[]   = $value->employee_id;
        }

        $data = ['schedule_list' => $schedule_list, 'driver_loc' => $driver_loc, 'driver_list' => $driver_list];
        
        if (count($schedule_list) > 0) {
            $response['data']       = $data;
            $response['status']     = true;
            $reponse['message']     = 'Success';
        } else {
            $response['status']     = false;
            $reponse['message']     = 'Failed';
        }

        return response()->json($response);
    }

    public function getUpdatedDriverLocApi() {
        $driver_list    = $_POST['driver_list'];
        $driver_loc     = DB::table('employee')
                                ->select('loc_latitude', 'loc_longitude')
                                ->whereIn('employee_id', [$driver_list])
                                ->get();
        if ($driver_loc) {
            $response['data']       = $driver_loc;
            $reponse['status']      = true;
            $response['message']    = 'Success';
        } else {
            $reponse['status']      = false;
            $response['message']    = 'Failed';
        }

        return response()->json($response);
    }

    public function updateUserLocApi() {
        $user_id    = $_POST['user_id'];
        $loc_lat    = $_POST['loc_lat'];
        $loc_lng    = $_POST['loc_lng'];

        $updateLoc  = DB::table('user')
                            ->where('id', '=', $user_id)
                            ->update(['loc_latitude' => $loc_lat, 'loc_longitude' => $loc_lng]);
        
        if ($updateLoc) {
            $response['status']  = true;
            $response['message'] = 'Successs';
        } else {
            $response['status']  = false;
            $response['message'] = 'Failed';
        }

        return response()->json($response);
    }

    public function userRequestApi() {
        $user_id        = $_POST['user_id'];
        $schedule_id    = $_POST['schedule_id'];
        $quantity       = $_POST['quantity'];
        $trip_id        = $_POST['trip_id'];
        $currentTime    = date('Y-m-d H:i:s');
        
        $value          = array(
                            'user_id' => $user_id,
                            'schedule_id' => $schedule_id,
                            'trip_id' => $trip_id,
                            'quantity' => $quantity,
                            'date_time' => $currentTime,
                            'status' => 'PEND'
                        );
        $insertRequest  = DB::table('request')
                                ->insert($value);
        
        if ($insertRequest) {
            $response['status']     = true;
            $response['message']    = 'Request Success';
        } else {
            $response['status']     = false;
            $response['message']    = 'Request Failed';
        }

        return response()->json($response);
    }

    public function updateUserProfile() {
        $postdata   = file_get_contents("php://input");
        $request    = json_decode($postdata);

        $email      = $request->email;
        $address    = $request->address;
        $phone      = $request->phone_number;

        $updateUser = DB::table('user')
                            ->where('email', '=', $email)
                            ->update(['address' => $address, 'phone_number' => $phone]);
        
        if ($updateUser) {
            $response['status']     = true;
            $response['message']    = 'Update Success';
        } else {
            $response['status']     = false;
            $response['message']    = 'Update Failed';
        }

        return response()->json($response);
    }

    public function getUserRequestStatusApi() {
        $user_id    = $_GET['user_id'];
        $request    = DB::table('request as r')
                            ->select('b.police_number', 't.track_name', 'p.type_name', 'r.status')
                            ->join('schedule as s', 's.schedule_id', '=', 'r.schedule_id')
                            ->join('bus as b', 'b.bus_id', '=', 's.bus_id')
                            ->join('type as p', 'p.type_id', '=', 'b.type_id')
                            ->join('track as t', 't.track_id', '=', 's.track_id')
                            ->where('user_id', '=', $user_id)
                            ->take(5)
                            ->orderBy('date_time', 'DESC')
                            ->get();
        if(count($request) > 0) {
            $response['data']       = $request;
            $response['status']     = true;
            $response['message']    = 'Success';
        } else {
            $response['status']     = false;
            $response['message']    = 'No Request Found';
        }

        return response()->json($response);
    }

    public function loginUserApi() {
        $postdata   = file_get_contents("php://input");
        $request    = json_decode($postdata);

        $username   = $request->username;
        $password   = $request->password;

        $user  = DB::table('user')
                    ->where('username', '=', $username)
                    ->first();
                    
        if ($user) {
            if (password_verify($password, $user->password)) {
                $response['data']       = $user;
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
