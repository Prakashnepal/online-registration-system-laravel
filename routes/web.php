<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClosedRegistrationController;
use App\Http\Controllers\Admin\InProcessRegistrationController;
use App\Http\Controllers\Admin\NotProcessRegistrationController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\StudentDetailController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Student\StudentRegistrationForm;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('index');
// });


Route::get('/', [StudentRegistrationForm::class, 'index'])->name('index');
// Register And Login Route


Route::prefix('auth')->group(function () {
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'store'])->name('register.store');
    Route::get('/login', [AuthController::class, 'loginIndex'])->name('login.index');
    Route::post('login', [AuthController::class, 'loginAction'])->name('login.action');

    //Permission Route
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::post('/permissions/{id}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::delete('/permissions', [PermissionController::class, 'destroy'])->name('permissions.destroy');

    // Roles Routes
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles', [RoleController::class, 'destroy'])->name('roles.destroy');

    //User Routes
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users', [UserController::class, 'destroy'])->name('users.destroy');
});

// Student Registration Route
Route::prefix('student')->group(function () {
    Route::get('form', [StudentRegistrationForm::class, 'form'])->name('student.form');
    Route::post('registration', [StudentRegistrationForm::class, 'store'])->name('student.store');
});


// **************
// Admin Route
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/total-list', [AdminController::class, 'totalList'])->name('admin.totalregistration');
Route::get('/admin/not-process-registration', [NotProcessRegistrationController::class, 'index'])->name('admin.notprocess');
Route::get('/admin/in-process-registration', [InProcessRegistrationController::class, 'index'])->name('admin.inprocess');
Route::get('/admin/closed-registration', [ClosedRegistrationController::class, 'index'])->name('admin.closed');
Route::get('/admin/student-details/{id}', [StudentDetailController::class, 'view'])->name('student.details');

Route::get('/admin/update-studentdetails/{id}', [StudentDetailController::class, 'showDetails'])->name('details.update');
Route::post('/admin/update-studentdetails/{id}', [StudentDetailController::class, 'updateDetails'])->name('details.update');



// Route::match(['get', 'post'], '/studentdetails/update/{id}', [StudentDetailController::class, 'updateDetails'])->name('details.update');
