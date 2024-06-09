<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\ManageRegistrationController;
use App\Http\Controllers\ManageReportController;
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


Route::get('KAFA/ViewActivityList', [ManageReportController::class, 'index'])->name('report.ViewActivityList');
Route::get('KAFA/ViewActivityDetail/{id}', [ManageReportController::class, 'show'])->name('report.ViewActivityDetail');
Route::post('KAFA/ViewActivityDetail/{id}/AddPostMortem', [ManageReportController::class, 'create'])->name('report.AddPostMortemForm');
Route::post('KAFA/ViewActivityDetail/{id}/StorePostMortem', [ManageReportController::class, 'store'])->name('report.PostMortemStore');
Route::get('KAFA/ViewActivityDetail/{id}/ViewCompletePostMortem', [ManageReportController::class, 'showPostMortem'])->name('report.ViewCompletePostMortem');
Route::get('KAFA/ViewActivityDetail/{id}/EditPostMortem/{postMortemId}', [ManageReportController::class, 'edit'])->name('report.EditPostMortemForm');
Route::put('KAFA/ViewActivityDetail/{id}/UpdatePostMortem/{postMortemId}', [ManageReportController::class, 'update'])->name('report.PostMortemUpdate');

Route::get('MUIP/ViewActivityList', [ManageReportController::class, 'indexMuip'])->name('report.ViewFinishActivityList');
Route::get('MUIP/{id}/ViewCompletePostMortem', [ManageReportController::class, 'showPostMortemMuip'])->name('report.MuipViewCompletePostMortem');
Route::get('MUIP/YearOption', [ManageReportController::class, 'showYears'])->name('report.AcademicYearOption');
Route::get('MUIP/YearOption/{year}', [ManageReportController::class, 'showStudentsByYear'])->name('report.StudentByYear');
Route::get('MUIP/{id}/AcademicPerformance', [ManageReportController::class, 'viewAcademicPerformance'])->name('report.ViewAcademicPerformance');

