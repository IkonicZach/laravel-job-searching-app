<?php

use App\Http\Controllers\Admin\AdminCompanyController;
use App\Http\Controllers\Admin\AdminController;
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
    Route::get('/trash/permission', [TrashPageController::class, 'permission'])->name('trash.permission');
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
    Route::get('/company', [CompanyController::class, 'create'])->name('employer.company.create');;
    Route::resource('job', JobController::class)->only('create', 'store', 'edit', 'update', 'destroy');
    Route::get('/{id}/company/profile', [CompanyController::class, 'profile'])->name('company.profile');
});
// ---------------------------------------- Employer routes ---------------------------------------- //

// ---------------------------------------- Admin routes ---------------------------------------- //
Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->group(function () {
    Route::resource('/user-management', \App\Http\Controllers\Admin\UserController::class);
    Route::post('/user/{id}/assign', [\App\Http\Controllers\Admin\UserController::class, 'assign'])->name('user.assign');

    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('/role', RoleController::class);
    Route::post('/role/{id}/assign', [RoleController::class, 'assign'])->name('role.assign');
    Route::delete('/role/{roleId}/revoke/{permissionId}', [RoleController::class, 'revoke'])->name('role.revoke');

    Route::resource('/permission', PermissionController::class);
    Route::post('/permission/{id}/assign', [PermissionController::class, 'assign'])->name('permission.assign');
    Route::delete('/permission/{roleId}/revoke/{permissionId}', [PermissionController::class, 'revoke'])->name('permission.revoke');
    Route::post('/permission/{id}/restore', [PermissionController::class, 'restore'])->name('permission.restore');
    Route::delete('/permission/{id}/delete', [PermissionController::class, 'delete'])->name('permission.delete');

    Route::resource('/category', CategoryController::class);
    Route::post('/category/restore/{id}', [CategoryController::class, 'restore'])->name('category.restore');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    Route::post('/subcategory/{id}/store', [SubcategoryController::class, 'store'])->name('subcategory.store');
    Route::resource('/subcategory', SubcategoryController::class)->except('store');
    Route::post('/subcategory/{id}/destroy', [SubcategoryController::class, 'destroy'])->name('subcategory.destroy');

    Route::resource('/company-management', AdminCompanyController::class);
    // Route::get('/admin.company', [AdminCompanyController::class, 'index'])->name('admin.company.index');
    // Route::put('/company/{id}/update', [AdminCompanyController::class, 'update'])->name('admin.company.update');
    // Route::delete('/admin/company/{id}/destroy', [AdminCompanyController::class, 'destroy'])->name('admin.company.destroy');
    // Route::delete('/company/{id}/delete', [AdminCompanyController::class, 'delete'])->name('admin.company.delete');
    // Route::post('/company/{id}/restore', [AdminCompanyController::class, 'restore'])->name('admin.company.restore');
});
// ---------------------------------------- Admin routes ---------------------------------------- //
