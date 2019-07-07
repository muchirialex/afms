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

use App\Vehicle;
use Illuminate\Support\Facades\Input;



Route::get('/changepassword', function () {
    if(Auth::check()){return view('auth/passwords/change_password');}
    return view('auth.login');
});

Route::post('/changepassword', 'DashboardController@changepassword');


Route::get('/', function () {
    if(Auth::check()){return Redirect::to('/users/show');}
        return view('auth.login');
});

Auth::routes();

Route::get('/admin', 'AdminController@admin')->middleware('is_admin')->name('admin');

Route::resource('profiles', 'AdminController');

Route::get('profiles/{user}/editUser', 'AdminController@editUser');

Route::get('/dashboard', function () {
    if(Auth::user()->isAdmin()){return Redirect::to('/dashboard');}
        return Redirect::to('/users/show');
});

Route::get('/dashboard', 'AdminController@stats')->middleware('is_admin')->name('dashboard');

Route::resource('users', 'DashboardController');
Route::get('users/edit/{user}', 'DashboardController@edit');

Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');


Route::get('/importExport', 'TasksController@index')->name('index');
Route::post('import', 'TasksController@import')->name('import');
Route::get('downloadExcel/{type}', 'TasksController@downloadExcel');

Route::delete('user/{id}/delete', ['middleware' => ['is_admin'], 'uses' => 'AdminController@destroy']);

Route::delete('vehicle/{id}/delete', ['middleware' => ['is_admin'], 'uses' => 'AdminController@vdestroy']);

Route::get('exportUsers/{type}', 'AdminController@exportUsers');

Route::group(['middleware' => 'disablePreventBack'], function(){
    Auth::routes();
});



//fleet management
Route::get('/vehicles', 'VehicleController@index');

Route::get('/vehicles/create-step1', 'VehicleController@createStep1');
Route::post('/vehicles/create-step1', 'VehicleController@postCreateStep1');

Route::get('/vehicles/create-step2', 'VehicleController@createStep2');
Route::post('/vehicles/create-step2', 'VehicleController@postCreateStep2');

Route::get('/vehicles/create-step3', 'VehicleController@createStep3');
Route::post('/vehicles/create-step3', 'VehicleController@postCreateStep3');

Route::post('/vehicles/store', 'VehicleController@store');

Route::get('/vehicles/validate', 'VehicleController@validate_details');
Route::post('/vehicles/validate', 'VehicleController@validate_details');

Route::get('/vehicles/search', 'VehicleController@search');

Route::get('/vehicles/show/{id}', 'VehicleController@show');

Route::post( '/search', function() {
    $q = Input::get ( 'q' );
    if($q != ''){
        $vehicles = Vehicle::where('registration_number','LIKE','%'.$q.'%')
        ->orWhere('contact_person','LIKE','%'.$q.'%')
        ->orWhere('email','LIKE','%'.$q.'%')
        ->orWhere('phone','LIKE','%'.$q.'%')
        ->orWhere('client_name','LIKE','%'.$q.'%')
        ->orWhere('vehicle_make','LIKE','%'.$q.'%')
        ->orWhere('engine_number','LIKE','%'.$q.'%')
        ->orWhere('chassis_number','LIKE','%'.$q.'%')
        ->orWhere('serial','LIKE','%'.$q.'%')
        ->get();
        if(count( $vehicles ) > 0)
            return view('search')->withDetails($vehicles)->withQuery ( $q );
        else 
            return view ('search')->withMessage('No Details found. Try to search again !');
    }
    return view ( 'search' )->withMessage ( 'No vehicles found. Try to search again !' );
});