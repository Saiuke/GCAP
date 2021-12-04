<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PeopleController;
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

Route::get('/', function () { return view('home'); })->name('home');
Route::get('/courses/{courseId}/delete-person/{personId}', [CourseController::class, 'deletePerson'])->name("courses.delete.person");
Route::get('/people/search', [PeopleController::class, 'autocomplete'])->name('people.search');
Route::resource('students', StudentController::class);
Route::resource('people', PeopleController::class);
Route::resource('teachers', TeacherController::class);
Route::resource('courses', CourseController::class);


