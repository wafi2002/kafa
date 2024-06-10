<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\ManageRegistrationController;
use App\Http\Controllers\ManageResultController;

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


Route::get('/result', [ManageResultController::class, 'index'])->name('result');
Route::get('/results/create', [ManageResultController::class, 'create'])->name('results.create');
Route::post('/results', [ManageResultController::class, 'store'])->name('results.store');

Route::get('/students/search', [ManageResultController::class, 'searchStudentForm'])->name('students.searchForm');
Route::post('/students/search', [ManageResultController::class, 'searchStudent'])->name('students.search');
Route::get('/results/add/{studentId}', [ManageResultController::class, 'addResult'])->name('results.add');
Route::post('/results/store', [ManageResultController::class, 'store'])->name('results.store');
Route::get('/results/edit/{id}', [ManageResultController::class, 'edit'])->name('results.edit');
Route::put('/results/update/{id}', [ManageResultController::class, 'update'])->name('results.update');
Route::get('/results/view/{studentId}', [ManageResultController::class, 'viewResult'])->name('results.view');
Route::get('/results/{id}/delete', [ManageResultController::class, 'showDeleteForm'])->name('results.showDeleteForm');
Route::delete('/results/delete/{student_id}/{result_id}', [ManageResultController::class, 'deleteResult'])->name('results.delete');

Route::post('/parents/search', [ManageResultController::class, 'searchParent'])->name('parents.search');

Route::post('/kafa/search', [ManageResultController::class, 'searchKafa'])->name('kafa.search');

Route::get('/muip/search', [ManageResultController::class, 'showMuipSearchForm'])->name('muip.showSearchForm');
Route::post('/muip/search', [ManageResultController::class, 'searchMuip'])->name('muip.search');