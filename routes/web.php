<?php

use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\SectionsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

// routes/web.php


Route::get('/', function () {
    return view('auth.login');
})->middleware("guest");

Auth::routes();



Route::middleware("auth")->group(function(){

	Route::group(['prefix' => LaravelLocalization::setLocale()], function()
	{
		Route::get('/dash', function()
		{
			return View("dashboard");
		})->middleware("auth");
		
		Route::resource("grade" , "GradeController")->middleware("auth");
		Route::get("grade.store" , [GradeController::class, "store"])->name("grade.store");
		Route::get("grade.update" , [GradeController::class, "update"])->name("grade.update");
		Route::get("grade.delete" , [GradeController::class, "destroy"])->name("grade.delete");
		
		// calss routes
		Route::resource("classes" , "ClassRoomController");
		Route::get("classes.store" , [ClassRoomController::class, "store"])->name("classes.store");
		Route::get("classes.update" , [ClassRoomController::class, "updateClass"])->name("class.update");
		Route::get("classes.delete" , [ClassRoomController::class, "destroy"])->name("class.delete");
		
		
		// sections routes
		Route::resource('sections', "SectionsController");
        Route::get('getclasses/{id}', [SectionsController::class, "getclasses"]);
		
	});
	
});
	
	/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/
// Route::resource('grade', 'GradeController');

// Route::get('/', function () {
//     return view('dashboard');
// });


Route::get('/home', 'HomeController@index')->name('home');
