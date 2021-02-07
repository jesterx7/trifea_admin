<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Bus;
use DB;

class PageController extends Controller
{
    public function dashboardView() {
    	return view('admin.dashboard');
    }

    public function employeeView() {
    	$employees = DB::table('employee')->get();
    	return view('admin.employee', ['employees' => $employees]);
    }

    public function scheduleView() {
    	$schedules = DB::table('schedule as s')
    					->select('s.schedule_id', 'd.name as driver', 'c.name as conductor', 'b.bus_name', 't.track_name', 's.schedule_start', 's.schedule_end')
    					->join('employee as d', 'd.employee_id', '=', 's.driver_id')
    					->join('employee as c', 'c.employee_id', '=', 's.conductor_id')
    					->join('bus as b', 'b.bus_id', '=', 's.bus_id')
    					->join('track as t', 't.track_id', '=', 's.track_id')
    					->get();
    	return view('admin.schedule', ['schedules' => $schedules]);
    }

    public function busView() {
        $bus = DB::table('bus as b')
                    ->select('b.bus_id', 'b.police_number', 'b.bus_name', 'b.capacity', 'b.brand', 't.type_name')
                    ->join('type as t', 't.type_id', '=', 'b.type_id')
                    ->get();
        return view('admin.bus', ['bus' => $bus]);
    }

    public function trackView() {
        $tracks = DB::table('track as t')
                    ->select('t.track_id', 't.track_name', 'c.city_name as origin', 'd.city_name as destination')
                    ->join('city as c', 'c.city_id', '=', 't.city_origin_id')
                    ->join('city as d', 'd.city_id', '=', 't.city_destination_id')
                    ->get();
        return view('admin.track', ['tracks' => $tracks]);
    }

	public function cityView() {
		$city = DB::table('city')->get();
		return view('admin.city', ['city' => $city]);
	}

    public function addEmployeeView() {
    	$occupations = DB::table('occupation')->get();
    	return view('admin.add_employee', ['occupations' => $occupations]);
    }

    public function saveEmployee(Request $request) {
    	$this->validate($request, [
    		'name'			=> 'required',
    		'username'		=> 'required|max:200',
    		'email'			=> 'required|email|max:200',
    		'password'		=> 'required|alphaNum|min:3',
    		'address'		=> 'max:200',
    		'phone_number'	=> 'max:200',
    	]);

    	$employee_data = array(
    		'name' 				=> $request->get('name'),
    		'username'			=> $request->get('username'),
    		'email' 			=> $request->get('email'),
    		'password' 			=> $request->get('password'),
    		'address' 			=> $request->get('address'),
    		'phone_number' 		=> $request->get('phone_number'),
    		'occupation_id' 	=> $request->get('occupation')
    	);

    	$employee = new User;
    	$employee->name 			= $employee_data['name'];
    	$employee->username 		= $employee_data['username'];
    	$employee->email 			= $employee_data['email'];
    	$employee->password 		= Hash::make($employee_data['password']);
    	$employee->address 			= $employee_data['address'];
    	$employee->phone_number 	= $employee_data['phone_number'];
    	$employee->occupation_id	= $employee_data['occupation_id'];
    	$employee->status 			= 'ON';
    	$employee->save();

    	return redirect('/employee');
    }

	public function savrBus(Request $request) {
		$this->validate($request, [
			'police_number'		=> 'required',
			'bus_name'			=> 'required|max:100',
			'capacity'			=> 'required|number',
			'brand'				=> 'required|max:100',
			'type_id'			=> 'required|number'
		]);

		$bus = new Bus;
		$bus->police_number 	= $request->police_number;
		$bus->bus_name			= $request->bus_name;
		$bus->capacity 			= $request->capacity;
		$bus->brand 			= $request->brand;
		$bus->type_id 			= $request->type_id;
		$bus->savse();

		return redirect('/bus');
	}
}
