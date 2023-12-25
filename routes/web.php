<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('home');
});
Route::get('/job/listing', [JobController::class, 'index'])->name('job.listing');

// ---------------------------------------- User routes ---------------------------------------- //
Route::get('/user/login', [UserController::class, 'showLogin'])->name('user.login');
Route::post('/user/login', [UserController::class, 'login'])->name('user.login');
Route::get('/user/register', [UserController::class, 'showRegister'])->name('user.register');
Route::post('/user/register', [UserController::class, 'register'])->name('user.store');
Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
// ---------------------------------------- User routes ---------------------------------------- //

Route::group(['prefix' => 'employer', 'middleware' => 'check.candidate.role'], function () {
    Route::get('/profile', [EmployerController::class, 'profile'])->name('employer.profile');
    Route::get('/{id}/company/profile', [CompanyController::class, 'profile'])->name('company.profile');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ---------------------------------------- Admin routes ---------------------------------------- //
Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/', [PageController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('/user', UserController::class);
    Route::resource('/role', RoleController::class);
    Route::resource('/permission', PermissionController::class);
    Route::resource('/category', CategoryController::class);
    Route::post('/admin/subcategory/{id}', [SubcategoryController::class, 'store'])->name('subcategory.store');
    Route::resource('/subcategory', SubcategoryController::class)->only('update', 'destroy');
    Route::post('/subcategory/{id}', [SubcategoryController::class, 'destroy'])->name('subcategory.destroy');
    Route::get('company', [CompanyController::class, 'index'])->name('admin.companies');
});
// ---------------------------------------- Admin routes ---------------------------------------- //

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
// require __DIR__ . '/auth.php';
