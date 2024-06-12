<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\ManageRegistrationController;
use App\Http\Controllers\ManageTimetableController;

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

// Timetable management routes
Route::get('/manage/timetable/list', ManageTimetableController::class.'@index')->name('manage.timetable.list'); // Display the list of timetables
Route::get('/manage/timetable/{id}', ManageTimetableController::class .'@display')->name('manage.timetable.list.show'); // Display a specific timetable
Route::get('/manage/timetable/list/create', ManageTimetableController::class . '@add')->name('manage.timetable.list.create'); // Show form for creating a timetable
Route::post('/manage/timetable', ManageTimetableController::class .'@store')->name('manage.timetable.list.store'); // Store a new timetable
Route::get('/manage/timetable/{timetable}/edit', ManageTimetableController::class .'@edit')->name('manage.timetable.list.edit'); // Show form for editing a timetable
Route::put('/manage/timetable/{timetable}', ManageTimetableController::class .'@update')->name('manage.timetable.list.update'); // Update a timetable
Route::delete('/manage/timetable/{timetable}', ManageTimetableController::class .'@delete')->name('manage.timetable.list.destroy'); // Delete a timetable
Route::get('/manage/timetable/{timetable}/confirm', ManageTimetableController::class .'@confirm')->name('manage.timetable.list.confirm'); // Confirmation for deleting a timetable
Route::get('/manage/timetable/req/{timetable}', ManageTimetableController::class . '@addRequest')->name('manage.timetable.list.reqform'); // Show form for adding a timetable request
Route::post('/manage/timetable/req', ManageTimetableController::class . '@storerequest')->name('manage.timetable.list.reqrecord'); // Store a new timetable request
Route::get('/request/timetable/lists', ManageTimetableController::class . '@displayRequestList')->name('manage.timetable.list.request'); // Display list of timetable requests
Route::get('/manage/timetable/request/{id}', ManageTimetableController::class . '@displayRequest')->name('manage.timetable.list.showrequest'); // Display a specific timetable request
Route::delete('manage/timetable/request/delete/{requestID}', ManageTimetableController::class .'@deleteRequest')->name('manage.timetable.requestlist.delete'); // Delete a timetable request