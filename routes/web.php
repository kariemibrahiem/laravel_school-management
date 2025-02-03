<?php

use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
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


		// the parents routes
		Route::resource("parents" , "MyparentController");
		Route::view("addparents" , "livewire.showForm");

		// the teachers route
        Route::get("teachers.updates" , [TeacherController::class, "update"])->name("teachers.updates");
		Route::resource("teachers" , "TeacherController");
        Route::get("teachers.create" , [TeacherController::class, "create"])->name("teachers.create");
        Route::get("teachers.store" , [TeacherController::class, "store"])->name("teachers.store");
        Route::get("teachers.destroy" , [TeacherController::class, "destroy"])->name("teachers.destroy");
        Route::get("teachers.edit" , [TeacherController::class, "edit"])->name("teachers.edit");

		// students routes

		Route::resource('students', "StudentController");
		Route::get("students.create" , [StudentController::class , "create"])->name("students.create");
		Route::get("Students.store" , [StudentController::class , "store"])->name("Students.store");
		Route::get('/Get_classrooms/{id}', 'StudentController@Get_classrooms');
		Route::get('/Get_Sections/{id}', 'StudentController@Get_Sections');
        Route::get("student.edit" , "StudentController@edit")->name("student.edit");
        Route::get("student.update" , "StudentController@update")->name("student.update");
        Route::get("student.destroy" , "StudentController@destroy")->name("student.destroy");
        Route::get("student/{id}" , "StudentController@show")->name("student.show");
        Route::get("student.Upload_attachment" , "StudentController@Upload_attachment")->name("Upload_attachment");
        Route::get("student.graduated_students" , "StudentController@graduated_students")->name("grad_students");
        Route::get("student.restore" , "StudentController@restore")->name("student.restore");


//        promotions

        Route::get("promotions" , "PromotionController@index")->name("promotions.index");
        Route::get("promotions.create" , "PromotionController@create")->name("promotions.create");
        Route::get("promotion.store" , "PromotionController@store")->name("promotion.store");
        Route::get("promotions.destroy" , "PromotionController@destroy")->name("promotions.destroy");
        Route::get("promotions.delete" , "PromotionController@delete")->name("promotions.delete");
        Route::get("promotions.graduate/{id}" , "PromotionController@graduate")->name("promotions.graduate");

//        Route::get("promotions.edit" , "PromotionController@edit")->name("promotions.edit");




	});

});

	/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/
// Route::resource('grade', 'GradeController');

// Route::get('/', function () {
//     return view('dashboard');
// });


Route::get('/home', 'HomeController@index')->name('home');
