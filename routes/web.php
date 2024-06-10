<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\ManageRegistrationController;
use App\Http\Controllers\ManageTimetableController;
use App\Http\Controllers\ManageActivityController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('KAFA/Dashboard', [ManageRegistrationController::class, 'index'])->name('kafa.dashboard')->middleware('kafa');
Route::get('MUIP/Dashboard', [ManageRegistrationController::class, 'index'])->name('muip.dashboard')->middleware('muip');
Route::get('Parent/Dashboard', [ManageRegistrationController::class, 'index'])->name('parent.dashboard')->middleware('parent');
Route::get('Teacher/Dashboard', [ManageRegistrationController::class, 'index'])->name('teacher.dashboard')->middleware('teacher');

Route::get('/manage/timetable/teacher', ManageTimetableController::class.'@teacherTemplateTimetable')->name('manage.timetable.teacher');
Route::get('/manage/timetable/list', ManageTimetableController::class.'@timetablelist')->name('manage.timetable.list');
// returns the form for adding a timetable
Route::get('/manage/timetable/create', ManageTimetableController::class . '@create')->name('manage.timetable.list.create');
// adds a timetable to the database
Route::post('/manage/timetable', ManageTimetableController::class .'@store')->name('manage.timetable.list.store');
// returns a page that shows a full timetable
Route::get('/manage/timetable/{id}', ManageTimetableController::class .'@show')->name('manage.timetable.list.show');
// returns the form for editing a timetable
Route::get('/manage/timetable/{timetable}/edit', ManageTimetableController::class .'@edit')->name('manage.timetable.list.edit');
// updates a timetable
Route::put('/manage/timetable/{timetable}', ManageTimetableController::class .'@update')->name('manage.timetable.list.update');
// deletes a timetable
Route::delete('/manage/timetable/{timetable}', ManageTimetableController::class .'@destroy')->name('manage.timetable.list.destroy');

Route::get('Teacher/try', [ManageActivityController::class, 'index'])->name('teacher.try');

Route::get('/search', [ManageActivityController::class, 'index'])->name('activities.search');
Route::get('/search/{id}', [ManageActivityController::class, 'show'])->name('activities.show');
Route::get('/activities/create', [ManageActivityController::class, 'create'])->name('activities.create');
Route::post('/activities', [ManageActivityController::class, 'store'])->name('activities.store');
Route::get('/activities/{id}/', [ManageActivityController::class, 'edit'])->name('activities.edit');
Route::put('/activities/{id}', [ManageActivityController::class, 'update'])->name('activities.update');
Route::delete('/activities/{id}', [ManageActivityController::class, 'destroy'])->name('activities.destroy');

Route::get('/KAFAadminsearch', [ManageActivityController::class, 'KAFAindex'])->name('KAFAadmin.activities.search');
Route::get('/KAFAadminsearch/{id}', [ManageActivityController::class, 'KAFAshow'])->name('KAFAadmin.activities.show');

Route::get('/MUIPadminsearch', [ManageActivityController::class, 'MUIPindex'])->name('MUIPadmin.activities.search');
Route::get('/MUIPadminsearch/{id}', [ManageActivityController::class, 'MUIPshow'])->name('MUIPadmin.activities.show');

Route::get('/Parentsearch', [ManageActivityController::class, 'Parentindex'])->name('Parent.activities.search');
Route::get('/Parentsearch/{id}', [ManageActivityController::class, 'Parentshow'])->name('Parent.activities.show');
