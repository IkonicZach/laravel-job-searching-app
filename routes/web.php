<?php

use App\Http\Controllers\Admin\AdminCompanyController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\TrashPageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/get-subcategories', [JobController::class, 'getSubcategories']);

Route::get('blog', [PageController::class, 'blog']);
Route::get('contact', [PageController::class, 'contact'])->name('contact.index');
Route::resource('job', JobController::class)->only('index', 'show');
Route::middleware('auth')->group(function () {
    Route::get('/trash/category', [TrashPageController::class, 'category'])->name('trash.category');
});

// ---------------------------------------- User routes ---------------------------------------- //
Route::get('/user/login', [UserController::class, 'showLogin'])->name('user.login')->middleware('remember_token');
Route::post('/user/login', [UserController::class, 'login'])->name('user.login')->middleware('remember_token');
Route::get('/user/register', [UserController::class, 'showRegister'])->name('user.register');
Route::post('/user/register', [UserController::class, 'register'])->name('user.store');
Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
// ---------------------------------------- User routes ---------------------------------------- //

// ---------------------------------------- Employer routes ---------------------------------------- //
Route::middleware(['check.candidate.role', 'auth'])->prefix('employer')->group(function () {
    Route::get('/profile', [EmployerController::class, 'profile'])->name('employer.profile');
    Route::get('/profile/setup', [EmployerController::class, 'setup'])->name('employer.profile.setup');
    Route::put('/profile/setup', [EmployerController::class, 'doSetup'])->name('employer.profile.doSetup');
    Route::resource('company', CompanyController::class);
    Route::resource('job', JobController::class)->only('create', 'store', 'edit', 'update', 'destroy');
    Route::get('/{id}/company/profile', [CompanyController::class, 'profile'])->name('company.profile');
});
// ---------------------------------------- Employer routes ---------------------------------------- //

// ---------------------------------------- Admin routes ---------------------------------------- //
Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/', [PageController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('/role', RoleController::class);
    Route::resource('/permission', PermissionController::class);
    Route::resource('/category', CategoryController::class);
    Route::post('/category/restore/{id}', [CategoryController::class, 'restore'])->name('category.restore');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::resource('/company', AdminCompanyController::class);
    Route::post('/admin/subcategory/{id}', [SubcategoryController::class, 'store'])->name('subcategory.store');
    Route::resource('/subcategory', SubcategoryController::class)->only('update', 'destroy');
    Route::post('/subcategory/{id}', [SubcategoryController::class, 'destroy'])->name('subcategory.destroy');
});
// ---------------------------------------- Admin routes ---------------------------------------- //
