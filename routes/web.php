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

    /* Track Routes */ 
    route::get('/track', 'PageController@trackView')->name('track');       
});

Route::get('/login', function () {
	if (auth()->check()) {
		return redirect('/');
	}
    return view('welcome');
})->name('login');

Route::post('/login', 'AuthController@authLogin');
Route::get('/api/get_city_list', 'ApiController@getCityListApi');