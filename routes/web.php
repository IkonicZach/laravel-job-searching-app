<?php

use App\Http\Controllers\Admin\AdminCompanyController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\TrashPageController;
use App\Http\Controllers\UserController;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $companies = Company::with('createdBy', 'jobs')->take(6)->get();
    $jobs = Job::with('company')->orderBy('created_at', 'desc')->take(6)->get();
    return view('home', compact('jobs', 'companies'));
});

Route::get('/get-subcategories', [JobController::class, 'getSubcategories']); // For dynamically showing subcategories

Route::resource('blog', BlogController::class);

Route::get('contact', [ContactController::class, 'contact'])->name('contact.index'); // Contact us page
Route::post('contact/submit', [ContactController::class, 'submitForm'])->name('contact.submit'); // Sending mail

Route::get('aboutus', [PageController::class, 'aboutUs'])->name('aboutus.index');

Route::resource('job', JobController::class)->only('index', 'show');

Route::get('/search', [JobController::class, 'search'])->name('job.search');

Route::get('/mail/test', [PageController::class, 'mail']);

Route::resource('candidate', CandidateController::Class)->only('index');

Route::resource('company', CompanyController::Class)->only('index');

Route::middleware('auth')->group(function () {
    Route::get('/trash/category', [TrashPageController::class, 'category'])->name('trash.category');
    Route::get('/trash/permission', [TrashPageController::class, 'permission'])->name('trash.permission');
    Route::get('/trash/job', [TrashPageController::class, 'job'])->name('trash.job');
    Route::get('/user/{id}/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/user/{id}/settings', [UserController::class, 'settings'])->name('user.settings');
    Route::put('/user/{id}/password/update', [UserController::class, 'passwordUpdate'])->name('profile.password.update');

    Route::post('/bookmark/{id}/job', [UserController::class, 'bookmark'])->name('job.bookmark');
    Route::get('/bookmarks', [UserController::class, 'getBookmarkedItems'])->name('user.bookmark.list');

    Route::post('/bookmark/{id}/user', [UserController::class, 'bookmarkUser'])->name('user.bookmark');

    Route::resource('profile', CandidateController::class, ['parameters' => ['profile' => 'id']])->except('index');
});

// ---------------------------------------- User routes ---------------------------------------- //
Route::get('/user/login', [UserController::class, 'showLogin'])->name('user.login')->middleware('remember_token');
Route::post('/user/login', [UserController::class, 'login'])->name('user.login')->middleware('remember_token');
Route::get('/user/register', [UserController::class, 'showRegister'])->name('user.register');
Route::post('/user/register', [UserController::class, 'register'])->name('user.store');
Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');
Route::delete('/user/{id}/deactivate', [UserController::class, 'deactivate'])->name('user.deactivate'); // Deactivate account
Route::get('/user/deactivate', [UserController::class, 'deactivatePage'])->name('deactivated.account'); // Show deactivated page
Route::post('/user/activate', [UserController::class, 'activate'])->name('user.activate'); // Re-activated account
// ---------------------------------------- User routes ---------------------------------------- //

// ---------------------------------------- Employer routes ---------------------------------------- //
Route::middleware(['role:employer', 'auth'])->prefix('employer')->group(function () {
    Route::get('/profile', [EmployerController::class, 'profile'])->name('employer.profile');
    Route::get('/profile/setup', [EmployerController::class, 'setup'])->name('employer.profile.setup');
    Route::put('/profile/setup', [EmployerController::class, 'doSetup'])->name('employer.profile.doSetup');
    Route::get('/company', [CompanyController::class, 'create'])->name('employer.company.create');
    Route::resource('company', CompanyController::class)->except('index');
    Route::resource('job', JobController::class)->only('create', 'store', 'edit', 'update', 'destroy');
    Route::get('/{id}/company/profile', [CompanyController::class, 'profile'])->name('company.profile');
});
// ---------------------------------------- Employer routes ---------------------------------------- //

// ---------------------------------------- Candidate routes ---------------------------------------- //
Route::middleware(['role:candidate', 'auth'])->prefix('candidate')->group(function () {
    // Route::get('/profile', [CandidateController::class, 'profile'])->name('candidate.profile');
    Route::get('/profile/setup', [CandidateController::class, 'setup'])->name('candidate.profile.setup');
    Route::put('/profile/setup', [CandidateController::class, 'doSetup'])->name('candidate.profile.doSetup');

    Route::post('/job/{id}/apply', [JobController::class, 'apply'])->name('job.apply');
    Route::post('/job/{id}/upload', [JobController::class, 'upload'])->name('job.upload');

    Route::get('/resume/trash', [ResumeController::class, 'trash'])->name('resume.trash');
    Route::post('/resume/{id}/restore', [ResumeController::class, 'restore'])->name('resume.restore');
    Route::delete('/resume/{id}/delete', [ResumeController::class, 'delete'])->name('resume.delete');
    Route::get('/resume/{id}/download', [ResumeController::class, 'downloadPdf'])->name('resume.download');
    Route::resource('resume', ResumeController::class, ['parameters' => ['resume' => 'id']]);
});
// ---------------------------------------- Candidate routes ---------------------------------------- //

// ---------------------------------------- Admin routes ---------------------------------------- //
Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::resource('/user-management', \App\Http\Controllers\Admin\UserController::class);
    Route::post('/user/{id}/assign', [\App\Http\Controllers\Admin\UserController::class, 'assign'])->name('user.assign');

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
    Route::delete('/subcategory/{id}/destroy', [SubcategoryController::class, 'destroy'])->name('subcategory.destroy');

    Route::resource('skill', SkillController::class);

    Route::resource('company-management', AdminCompanyController::class);

    Route::resource('job-management', \App\Http\Controllers\Admin\JobController::class);
    // Route::get('/admin.company', [AdminCompanyController::class, 'index'])->name('admin.company.index');
    // Route::put('/company/{id}/update', [AdminCompanyController::class, 'update'])->name('admin.company.update');
    // Route::delete('/admin/company/{id}/destroy', [AdminCompanyController::class, 'destroy'])->name('admin.company.destroy');
    // Route::delete('/company/{id}/delete', [AdminCompanyController::class, 'delete'])->name('admin.company.delete');
    // Route::post('/company/{id}/restore', [AdminCompanyController::class, 'restore'])->name('admin.company.restore');
});
// ---------------------------------------- Admin routes ---------------------------------------- //
