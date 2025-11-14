<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\TestimonialController;


Route::get('/category',[CategoryController::class,'index']);
Route::get('/project',[ProjectController::class,'project']);
Route::get('/projectByCategory/{id}',[ProjectController::class,'projectByCategory']);
Route::get('/projectitem/{id}',[ProjectController::class,'projectItem']);
Route::get('/header',[HeaderController::class,'header']);
Route::get('/getInTouch',[HeaderController::class,'getInTouch']);

Route::post('/contact/us/mail',[ContactUsController::class,'index']);

Route::get('/profile',[ProfileController::class,'index']);
Route::get('/profile/{id}',[ProfileController::class,'show']);
Route::get('/company',[CompanyController::class,'index']);
Route::get('/company/{id}',[CompanyController::class,'show']);
Route::get('/plan',[PlanController::class,'index']);
Route::get('/plan/{id}',[PlanController::class,'show']);
Route::get('/service',[ServiceController::class,'index']);
Route::get('/service/{id}',[ServiceController::class,'show']);
Route::get('/education',[EducationController::class,'index']);
Route::get('/education/{id}',[EducationController::class,'show']);
Route::get('/experience',[ExperienceController::class,'index']);
Route::get('/experience/{id}',[ExperienceController::class,'show']);
Route::get('/testimonial',[TestimonialController::class,'index']);
Route::get('/testimonial/{id}',[TestimonialController::class,'show']);
