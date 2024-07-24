<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('/about-us', [App\Http\Controllers\Frontend\FrontendController::class, 'about']);
Route::get('/contact-us', [App\Http\Controllers\Frontend\FrontendController::class, 'contact']);
Route::get('/departments', [App\Http\Controllers\Frontend\FrontendController::class, 'departments']);
Route::get('/departments/{departmentSlug}', [App\Http\Controllers\Frontend\FrontendController::class, 'departmentView']);
Route::get('/find-a-doctor', [App\Http\Controllers\Frontend\FrontendController::class, 'doctors']);
Route::get('/find-a-doctor/{name}', [App\Http\Controllers\Frontend\FrontendController::class, 'doctorShow']);
Route::get('/book-appointment', [App\Http\Controllers\Frontend\FrontendController::class, 'doctors']);
Route::get('/book-appointment/{doctorSlug}', [App\Http\Controllers\Frontend\FrontendController::class, 'bookAppointment']);
Route::post('/book-appointment/{doctorSlug}', [App\Http\Controllers\Frontend\FrontendController::class, 'placeAppointment']);


Route::prefix('user')->middleware(['auth'])->group(function () {

    Route::get('/profile', [App\Http\Controllers\Frontend\UserController::class, 'profile']);
    Route::post('/profile', [App\Http\Controllers\Frontend\UserController::class, 'profileUpdate']);
    Route::get('/appointments', [App\Http\Controllers\Frontend\UserController::class, 'appointment']);
    Route::get('/appointments/{id}/show', [App\Http\Controllers\Frontend\UserController::class, 'viewAppointment']);
    Route::get('/change-password', [App\Http\Controllers\Frontend\UserController::class, 'changePassword']);
    Route::post('/change-password', [App\Http\Controllers\Frontend\UserController::class, 'updateChangePassword']);
    Route::get('/support', [App\Http\Controllers\Frontend\UserController::class, 'support']);

});


Route::prefix('doctor')->middleware(['auth', 'doctor'])->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\Doctor\DashboardController::class, 'index']);

    Route::controller(App\Http\Controllers\Doctor\PatientController::class)->group(function () {
        Route::get('/patients', 'index');
        Route::get('/patients/{id}/edit', 'edit');
        Route::put('/patients/{id}/edit', 'update');
        Route::get('/patients/{id}/appointments', 'appointments');
    });

    Route::controller(App\Http\Controllers\Doctor\AppointmentController::class)->group(function () {
        Route::get('/appointments', 'index');
        Route::get('/appointments/{appointment_number}/show', 'show');
        Route::put('/appointments/{appointment_number}/apt-update', 'appointmentUpdate');
        Route::put('/appointments/{appointment_number}/patient-update', 'appointmentPatientUpdate');
        Route::put('/appointments/{id}/edit', 'update');

        Route::get('/appointments/history', 'history');
    });

    Route::controller(App\Http\Controllers\Doctor\ProfileController::class)->group(function () {
        Route::get('/profile', 'index');
        Route::post('/profile', 'updateProfile');

        Route::get('/change-password', 'password');
        Route::post('/change-password', 'changePassword');

        Route::get('/logout', 'logout');
    });

    Route::controller(App\Http\Controllers\Doctor\TimingController::class)->group(function () {
        Route::get('/timings', 'index');
        Route::post('/timings', 'create');
        Route::get('/timings/{id}/edit', 'edit');
        Route::put('/timings/{id}', 'update');
        Route::get('/timings/{id}/delete', 'destroy');
        Route::post('/timings-reset', 'resetTimings');
    });

});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::prefix('appointments')->controller(App\Http\Controllers\Admin\AppointmentController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::get('/{id}/show', 'show');
        Route::post('/create', 'store');
        Route::get('/{id}/edit', 'edit');
        Route::put('/{id}/edit', 'update');
        Route::get('/{id}/delete', 'destroy');
    });

    Route::prefix('departments')->controller(App\Http\Controllers\Admin\DepartmentController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::post('/create', 'store');
        Route::get('/{id}', 'show');
        Route::get('/{id}/edit', 'edit');
        Route::put('/{id}/edit', 'update');
        Route::get('/{id}/delete', 'destroy');
    });

    Route::prefix('doctors')->controller(App\Http\Controllers\Admin\DoctorController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::post('/create', 'store');
        Route::get('/{id}', 'show');
        Route::get('/{id}/timings', 'timings');
        Route::get('/{id}/edit', 'edit');
        Route::put('/{id}/edit', 'update');
        Route::get('/{id}/delete', 'destroy');
    });

    Route::prefix('patients')->controller(App\Http\Controllers\Admin\PatientController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/{userId}/appointments', 'appointments');
    });

    Route::prefix('manage-admins')->controller(App\Http\Controllers\Admin\AdminController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/create', 'create');
        Route::post('/create', 'store');
        Route::get('/{id}/edit', 'edit');
        Route::put('/{id}/edit', 'update');
        Route::get('/{id}/delete', 'destroy');
        Route::get('/logout', 'logout');
    });

    Route::get('settings', [\App\Http\Controllers\Admin\AppSettingController::class, 'index']);
    Route::post('settings', [\App\Http\Controllers\Admin\AppSettingController::class, 'createOrUpdate']);

});


