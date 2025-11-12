<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ForeignTilesController;


Route::get('/slider',[SliderController::class,'index']);
Route::get('/category',[CategoryController::class,'index']);
Route::get('/product/{slug}',[ProductController::class,'index']);
Route::get('/location',[LocationController::class,'location']);
Route::get('/storelogo',[LocationController::class,'storelogo']);
Route::get('/gallery',[LocationController::class,'gallery']);
Route::get('/video',[VideoController::class,'index']);
Route::get('/whoarewe',[LocationController::class,'whoAreWe']);
Route::get('/project',[ProjectController::class,'project']);
Route::get('/projectitem/{id}',[ProjectController::class,'projectItem']);
Route::get('/dealer',[DealerController::class,'dealer']);
Route::get('/footer/logo',[FooterController::class,'footerLogo']);
Route::get('/footer/address',[FooterController::class,'footerAddress']);
Route::get('/footer/social',[FooterController::class,'footerSocial']);
Route::get('/header',[HeaderController::class,'header']);
Route::get('/foreign/tiles',[ForeignTilesController::class,'index']);
Route::get('/foreign/tiles/heading',[ForeignTilesController::class,'index']);
Route::get('/foreign/tilesByLimit',[ForeignTilesController::class,'indexByLimit']);
Route::post('/contact/us/mail',[ContactUsController::class,'index']);
