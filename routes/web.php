<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('article-detail/{article}', 'articleDetail')->name('article-detail');
    Route::get('articles', 'article')->name('articles');
    Route::get('company-detail/{companyProfile}', 'companyDetail')->name('company_detail');
    Route::get('vacancy-detail/{vacancy}', 'vacancyDetail')->name('vacancy_detail');
    Route::get('vacancies', 'vacancy')->name('vacancies');
    Route::get('student-detail/{studentProfile}', 'studentDetail')->name('student_detail');
	Route::get('contact', 'contact')->name('contact');
});


Auth::routes();
Route::post('reg', [UserController::class, 'reg'])->name('reg');

Route::group(['middleware' => 'student'], function () {
	Route::resource('student-profile', StudentProfileController::class)->except('show', 'store', 'create', 'edit', 'destroy');
    Route::get('apply/{vacancy}/{studentProfile}', [HomeController::class, 'apply'])->name('apply');
    Route::get('application', [HomeController::class, 'application'])->name('application');

	
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'company'], function () {
	Route::resource('vacancy', VacancyController::class)->except('show');
	Route::resource('company-profile', CompanyProfileController::class)->except('show', 'store', 'create', 'edit', 'destroy');
    Route::get('vacancy-application/{vacancy}', [VacancyController::class, 'application'])->name('vacancyApplication');
    Route::get('decline-application/{vacancy}/{studentProfile}', [VacancyController::class, 'declineApplication'])->name('declineApplication');
    Route::get('accept-application/{vacancy}/{studentProfile}', [VacancyController::class, 'acceptApplication'])->name('acceptApplication');

	
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'admin'], function () {
	Route::resource('user', UserController::class)->except('show', 'update', 'create', 'edit');
	Route::put('/user/change-password', [UserController::class, 'changePass'])->name('user.change_password');

	Route::resource('article', ArticleController::class)->except('show');
	Route::resource('category', CategoryController::class)->except('show', 'create', 'edit');

	Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

