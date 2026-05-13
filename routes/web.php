<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Login Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('front-end/home');
});
Route::get('/about-us', function () {
    return view('front-end/about');
});
Route::get('/classes', function () {
    return view('front-end/classes');
});
Route::get('/team', function () {
    return view('front-end/team');
});

Route::get('/call-to-action', function () {
    return view('front-end/call-to-action');
});

Route::get('/appointment', function () {
    return view('front-end/appointment');
});

Route::get('/contact', function () {
    return view('front-end/contact');
});
Route::get('/login', [AuthController::class, 'loginForm'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| Common Routes (Admin + Teacher)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::resource('students', StudentController::class);

    Route::resource('attendance', AttendanceController::class);

    Route::resource('homework', HomeworkController::class);

    Route::resource('notices', NoticeController::class);

});

/*
|--------------------------------------------------------------------------
| Admin Only Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {

        Route::resource('fees', FeeController::class);

});