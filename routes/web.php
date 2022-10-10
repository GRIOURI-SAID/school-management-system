<?php

use App\Http\Controllers\ClassromController;
use App\Http\Controllers\GradeController;
use Illuminate\Support\Facades\Route;

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

Route::group(["middleware" => ['guest']] , function(){
Route::get('/', function () {
    return view('auth.login');
});

});


Auth::routes();




Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'  , "auth"]
], function(){
    Route::get('/home', function(){
    return view("dashboard");
} );


Route::resource('grade', GradeController::class);
Route::resource('classrom', ClassromController::class);

});








