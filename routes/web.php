<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\GalleryController;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\SchoolClassController;

use App\Http\Controllers\ContactController;

use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Login Routes
|--------------------------------------------------------------------------
*/


Route::get('/admin/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
Route::get('/admin/teachers', [TeacherController::class, 'index'])->name('teacher.index');
Route::get('/admin/teachers/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');

Route::get('/admin/attendance/report', [AttendanceController::class, 'report'])->name('attendance.report');

Route::post('/admin/teachers/update/{id}', [TeacherController::class, 'update'])->name('teacher.update');

Route::get('/admin/teachers/delete/{id}', [TeacherController::class, 'delete'])->name('teacher.delete');

Route::post('/admin/teacher/store', [TeacherController::class, 'store'])->name('teacher.store');

// Route::get('/', function () {
//     return view('front-end/home');
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('/about-us', function () {
    return view('front-end/about');
});
Route::get('/classes', function () {
    return view('front-end/classes');
});
// Route::get('/team', function () {
//     return view('front-end/team');
// });

Route::get('/team', [TeacherController::class, 'getTeam']);

// Route::get('/gallery', function () {
//     return view('front-end/gallery');
// });

Route::get('/gallery', [GalleryController::class, 'indexFrontEnd']);

Route::get('/call-to-action', function () {
    return view('front-end/call-to-action');
});

Route::post('/contact-submit', [ContactController::class, 'store'])->name('contact.submit');

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

    Route::resource('classes', SchoolClassController::class);

    Route::get('/gallery/create', [GalleryController::class, 'create']);

    Route::get('/gallery', [GalleryController::class, 'index']);
    
    Route::get('/gallery/edit/{id}', [GalleryController::class, 'edit']);
    
    Route::put('/gallery/update/{id}', [GalleryController::class, 'update']);

    Route::post('/gallery/store', [GalleryController::class, 'store']);
    
    Route::delete('/gallery/delete/{id}', [GalleryController::class, 'destroy']);

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