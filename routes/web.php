<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => ['auth']], function () {
    route::get('/', 'PageController@dashboardView')->name('dashboard');

    /* Employee Routes */
    route::get('/employee', 'PageController@employeeView')->name('employee');
    route::get('/add_employee', 'PageController@addEmployeeView')->name('add_employee');
    route::post('/add_employee', 'PageController@saveEmployee');

    /* Schedule Routes */
    route::get('/schedule', 'PageController@scheduleView')->name('schedule');

    /* Bus Routes */
    route::get('/bus', 'PageController@busView')->name('bus');
    route::get('/add_bus', 'PageController@addBusView')->name('add_bus');
    route::post('/add_bus', 'PageController@saveBus');

    /* Track Routes */ 
    route::get('/track', 'PageController@trackView')->name('track');
    route::get('/add_track', 'PageController@addTrackView')->name('add_track');
    route::post('/add_track', 'PageController@saveTrack');

    /* City Routes */
    route::get('/city', 'PageController@cityView')->name('city');
    route::get('/add_city', 'PageController@addCityView')->name('add_city');
    route::post('/add_city', 'PageController@saveCity');

    /* Trip Routes */
    route::get('/trip', 'PageController@tripView')->name('trip');
    route::get('/add_trip', 'PageController@addTripView')->name('add_trip');
    route::post('/add_trip', 'PageController@saveTrip');
});

Route::get('/login', function () {
	if (auth()->check()) {
		return redirect('/');
	}
    return view('welcome');
})->name('login');

Route::post('/login', 'AuthController@authLogin');
Route::get('/api/get_city_list', 'ApiController@getCityListApi');