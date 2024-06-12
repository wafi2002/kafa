<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\ManageRegistrationController;
use App\Http\Controllers\ManageResultController;
use App\Http\Controllers\ManageReportController;
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


Route::get('/result', [ManageResultController::class, 'index'])->name('result');
Route::get('/results/create', [ManageResultController::class, 'create'])->name('results.create');

Route::get('/students/search', [ManageResultController::class, 'searchStudentForm'])->name('students.searchForm');
Route::post('/students/search', [ManageResultController::class, 'searchStudent'])->name('students.search');
Route::get('/results/add/{studentId}', [ManageResultController::class, 'addResult'])->name('results.add');
Route::post('/results/store', [ManageResultController::class, 'store'])->name('results.store');
Route::get('/results/edit/{id}', [ManageResultController::class, 'edit'])->name('results.edit');
Route::put('/results/update/{id}', [ManageResultController::class, 'update'])->name('results.update');
Route::get('/results/view/{studentId}', [ManageResultController::class, 'viewResult'])->name('results.view');
Route::delete('/result/delete/{student_id}/{result_id}', [ManageResultController::class, 'deleteResult'])->name('results.delete');

Route::get('/result/view/{studentId}', [ManageResultController::class, 'viewParent'])->name('parents.view');
Route::get('/parents/search', [ManageResultController::class, 'parentSearch'])->name('parents.search');
Route::post('/parent/search', [ManageResultController::class, 'searchParent'])->name('parents.studentSearch');

Route::post('/kafa/search', [ManageResultController::class, 'searchKafa'])->name('kafa.search');

Route::get('/muip/search', [ManageResultController::class, 'showMuipSearchForm'])->name('muip.showSearchForm');
Route::post('/muip/search', [ManageResultController::class, 'searchMuip'])->name('muip.search');
Route::get('/muip/search/{studentId}', [ManageResultController::class, 'viewMuipResult'])->name('muip.searchStudent');


Route::get('/kafa/search', [ManageResultController::class, 'showKafaSearchForm'])->name('kafa.showSearchForm');
Route::post('/kafa/search', [ManageResultController::class, 'searchKafa'])->name('kafa.search');
Route::get('/kafa/search/{studentId}', [ManageResultController::class, 'viewKafaResult'])->name('kafa.searchStudent');
Route::get('/results/{id}/delete', [ManageResultController::class, 'showKafaDeleteForm'])->name('results.showKafaDeleteForm');
Route::delete('/results/delete/{student_id}/{result_id}', [ManageResultController::class, 'deleteResultkafa'])->name('results.deletekafa');
Route::get('result/{id}/delete', [ManageResultController::class, 'showDeleteForm'])->name('results.showDeleteForm');







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

Route::get('/search-activities', [ManageActivityController::class, 'index'])->name('activities.search');
