<?php

use App\Http\Controllers\Admin\ContactUsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\WhoAreWeController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\ProjectItemController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PlanController;

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

// experience routes
Route::get('/experience',[ExperienceController::class,'index'])->name('experience.index');
Route::get('/experience/create',[ExperienceController::class,'create'])->name('experience.create');
Route::post('/experience/store',[ExperienceController::class,'store'])->name('experience.store');
Route::get('/experience/{id}',[ExperienceController::class,'edit'])->name('experience.edit');
Route::post('/experience/{id}',[ExperienceController::class,'update'])->name('experience.update');
Route::get('/experience/delete/{id}',[ExperienceController::class,'delete'])->name('experience.delete');

// education routes
Route::get('/education',[EducationController::class,'index'])->name('education.index');
Route::get('/education/create',[EducationController::class,'create'])->name('education.create');
Route::post('/education/store',[EducationController::class,'store'])->name('education.store');
Route::get('/education/{id}',[EducationController::class,'edit'])->name('education.edit');
Route::post('/education/{id}',[EducationController::class,'update'])->name('education.update');
Route::get('/education/delete/{id}',[EducationController::class,'delete'])->name('education.delete');

// testimonial routes
Route::get('/testimonial',[TestimonialController::class,'index'])->name('testimonial.index');
Route::get('/testimonial/create',[TestimonialController::class,'create'])->name('testimonial.create');
Route::post('/testimonial/store',[TestimonialController::class,'store'])->name('testimonial.store');
Route::get('/testimonial/{id}',[TestimonialController::class,'edit'])->name('testimonial.edit');
Route::post('/testimonial/{id}',[TestimonialController::class,'update'])->name('testimonial.update');
Route::get('/testimonial/delete/{id}',[TestimonialController::class,'delete'])->name('testimonial.delete');

Route::get('/projectitem/create',[ProjectItemController::class,'create'])->name('projectitem.create');
Route::post('/projectitem/store',[ProjectItemController::class,'store'])->name('projectitem.store');
Route::get('/projectitem/{id}',[ProjectItemController::class,'edit'])->name('projectitem.edit');
Route::post('/projectitem/{id}',[ProjectItemController::class,'update'])->name('projectitem.update');
Route::get('/projectitem/delete/{id}',[ProjectItemController::class,'delete'])->name('projectitem.delete');

// service routes
Route::get('/service',[ServiceController::class,'index'])->name('service.index');
Route::get('/service/create',[ServiceController::class,'create'])->name('service.create');
Route::post('/service/store',[ServiceController::class,'store'])->name('service.store');
Route::get('/service/{id}',[ServiceController::class,'edit'])->name('service.edit');
Route::post('/service/{id}',[ServiceController::class,'update'])->name('service.update');
Route::get('/service/delete/{id}',[ServiceController::class,'delete'])->name('service.delete');

// plan routes
Route::get('/plan',[PlanController::class,'index'])->name('plan.index');
Route::get('/plan/create',[PlanController::class,'create'])->name('plan.create');
Route::post('/plan/store',[PlanController::class,'store'])->name('plan.store');
Route::get('/plan/{id}',[PlanController::class,'edit'])->name('plan.edit');
Route::post('/plan/{id}',[PlanController::class,'update'])->name('plan.update');
Route::get('/plan/delete/{id}',[PlanController::class,'delete'])->name('plan.delete');

Route::get('/contact-us',[ContactUsController::class,'index'])->name('contact.index');




