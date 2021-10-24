<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/', [WebsiteController::class, 'index'])->name('index');
Route::get('contact', [WebsiteController::class, 'contact'])->name('contact-us');
Route::get('about-us', [WebsiteController::class, 'about'])->name('about-us');

/*
 * Student Routes
 * */
Route::prefix('student')->name('student.')->middleware(['student'])->group(function () {
    Route::get('/', [\App\Http\Controllers\Student\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [\App\Http\Controllers\Student\SettingsController::class, 'editProfile'])->name('profile');
    Route::post('/profile', [\App\Http\Controllers\Student\SettingsController::class, 'updateProfile'])->name('update-profile');
    Route::get('/change-password', [\App\Http\Controllers\Student\SettingsController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [\App\Http\Controllers\Student\SettingsController::class, 'updatePassword'])->name('update-password');
});

/*
 * Instructor Routes
 * */
Route::prefix('instructor')->name('instructor.')->middleware(['instructor'])->group(function () {
    Route::get('/', [\App\Http\Controllers\Instructor\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [\App\Http\Controllers\Instructor\SettingsController::class, 'editProfile'])->name('profile');
    Route::post('/profile', [\App\Http\Controllers\Instructor\SettingsController::class, 'updateProfile'])->name('update-profile');
    Route::get('/change-password', [\App\Http\Controllers\Instructor\SettingsController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [\App\Http\Controllers\Instructor\SettingsController::class, 'updatePassword'])->name('update-password');
});


/*
 * Admin Routes
 * */
Route::prefix('admin')->name('admin.')->middleware(['admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('student', \App\Http\Controllers\Admin\StudentController::class);
    Route::resource('course', \App\Http\Controllers\Admin\CourseController::class);
    Route::resource('subject', \App\Http\Controllers\Admin\SubjectController::class);
    Route::resource('instructor', \App\Http\Controllers\Admin\InstructorController::class);
    Route::resource('transaction', \App\Http\Controllers\Admin\TransactionController::class);

    // Livewire routes for schedule
    Route::get('schedule', [\App\Http\Controllers\Admin\ScheduleController::class, 'index'])->name('schedule.index');

    Route::get('/profile', [\App\Http\Controllers\Admin\SettingsController::class, 'editProfile'])->name('profile');
    Route::post('/profile', [\App\Http\Controllers\Admin\SettingsController::class, 'updateProfile'])->name('update-profile');
    Route::get('/change-password', [\App\Http\Controllers\Admin\SettingsController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [\App\Http\Controllers\Admin\SettingsController::class, 'updatePassword'])->name('update-password');
});
