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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('');

Route::get('/test', 'Test@index')->name('');
Route::get('/get_drivers_data', 'DriverController@get_data')->name('getDriversData');
Route::get('/get_parents_data', 'ParentsController@get_data')->name('getParentsData');
Route::get('/get_busses_data', 'BusController@get_data')->name('getBussesData');
Route::post('/update_parent_data', 'ParentsController@update_parent_data')->name('updateParentsData');
Route::post('/update_driver_data', 'DriverController@update_driver_data')->name('updateDriversData');
Route::post('/delete_driver', 'DriverController@delete_driver')->name('deleteDriver');
Route::post('/update_bus_data', 'BusController@update_bus_data')->name('updateBussesData');
Route::post('/delete_bus', 'BusController@delete_bus')->name('deleteBus');
Route::post('/assign_bus', 'DriverController@assign_bus')->name('AssignBus');
Route::post('/assign_bus_to_drivers', 'DriverController@assign_bus_to_drivers')->name('AssignBusToDriver');
Route::get('/get_routes_data', 'RouteController@get_data')->name('GetRoutes');
Route::post('/update_route_data', 'RouteController@update_route_data')->name('UpdateRoute');
Route::post('/delete_route', 'RouteController@delete_route')->name('deleteRouter');
Route::post('/login_make', 'HomeController@login')->name('Login');
Route::get('/get_session', 'HomeController@get_session')->name('');
