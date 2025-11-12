<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\WhoAreWeController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\ProjectItemController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CompanyController;

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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/change/password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change.password');
Route::post('/change/password', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update.password');

//category
Route::get('/category',[CategoryController::class,'index'])->name('category.index');
Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('/category/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('/category/{id}',[CategoryController::class,'update'])->name('category.update');
Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');

//social link
Route::get('/social/link',[SocialLinkController::class,'index'])->name('social.link.index');
Route::get('/social/link/create',[SocialLinkController::class,'create'])->name('social.link.create');
Route::post('/social/link/store',[SocialLinkController::class,'store'])->name('social.link.store');
Route::get('/social/link/{id}',[SocialLinkController::class,'edit'])->name('social.link.edit');
Route::post('/social/link/{id}',[SocialLinkController::class,'update'])->name('social.link.update');
Route::get('/social/link/delete/{id}',[SocialLinkController::class,'delete'])->name('social.link.delete');



//whoarewe link
Route::get('/whoarewe/',[WhoAreWeController::class,'index'])->name('whoarewe.index');
Route::post('/whoarewe/{id}',[WhoAreWeController::class,'update'])->name('whoarewe.update');



//setting
Route::get('/setting/',[SettingController::class,'index'])->name('setting.index');
Route::post('/setting/{id}',[SettingController::class,'update'])->name('setting.update');


//project route
Route::get('/project',[ProjectController::class,'index'])->name('project.index');
Route::get('/project/create',[ProjectController::class,'create'])->name('project.create');
Route::post('/project/store',[ProjectController::class,'store'])->name('project.store');
Route::get('/project/{id}',[ProjectController::class,'edit'])->name('project.edit');
Route::post('/project/{id}',[ProjectController::class,'update'])->name('project.update');
Route::get('/project/delete/{id}',[ProjectController::class,'delete'])->name('project.delete');

//project item route
Route::get('/projectitem',[ProjectItemController::class,'index'])->name('projectitem.index');
// profile (portfolio) route
Route::get('/profile',[ProfileController::class,'index'])->name('portfolioprofile.index');
Route::get('/profile/create',[ProfileController::class,'create'])->name('portfolioprofile.create');
Route::post('/profile/store',[ProfileController::class,'store'])->name('portfolioprofile.store');
Route::get('/profile/{id}',[ProfileController::class,'edit'])->name('portfolioprofile.edit');
Route::post('/profile/{id}',[ProfileController::class,'update'])->name('portfolioprofile.update');
Route::get('/profile/delete/{id}',[ProfileController::class,'delete'])->name('portfolioprofile.delete');

// company route
Route::get('/company',[CompanyController::class,'index'])->name('company.index');
Route::get('/company/create',[CompanyController::class,'create'])->name('company.create');
Route::post('/company/store',[CompanyController::class,'store'])->name('company.store');
Route::get('/company/{id}',[CompanyController::class,'edit'])->name('company.edit');
Route::post('/company/{id}',[CompanyController::class,'update'])->name('company.update');
Route::get('/company/delete/{id}',[CompanyController::class,'delete'])->name('company.delete');

Route::get('/projectitem/create',[ProjectItemController::class,'create'])->name('projectitem.create');
Route::post('/projectitem/store',[ProjectItemController::class,'store'])->name('projectitem.store');
Route::get('/projectitem/{id}',[ProjectItemController::class,'edit'])->name('projectitem.edit');
Route::post('/projectitem/{id}',[ProjectItemController::class,'update'])->name('projectitem.update');
Route::get('/projectitem/delete/{id}',[ProjectItemController::class,'delete'])->name('projectitem.delete');



