<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('auth.login');
});




Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('KAFA/ViewActiviyList', [App\Http\Controllers\ManageRegistrationController::class, 'index'])->name('kafa.ViewActivityList')->middleware('kafa');
Route::get('MUIP/ViewFinishActivityList', [App\Http\Controllers\ManageRegistrationController::class, 'index'])->name('muip.ViewFinishActivityList')->middleware('muip');
