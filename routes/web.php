<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siteController;
use App\Http\Controllers\photoController;
use App\Http\Controllers\LocalizationController;
use App\Http\Middleware\Localization;



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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/{lang?}',function ($lang ='en'){
//     return view('/');
// });
Route::get('/',[siteController::class,'home']);
Route::get('/login',[siteController::class,'login']);
Route::post('/login',[siteController::class,'confirm_login']);
Route::get('/register',[siteController::class,'register']);
Route::post('/register',[siteController::class,'register_confirm']);
Route::get('/logout',[siteController::class,'logout']);



Route::get('lang/{language}',[LocalizationController::class,'index']);

Route::get('/upload',[photoController::class,'upload']);
Route::get('/download{image_path}',[photoController::class,'download']);

Route::get('/ok',[photoController::class,'ok']);

Route::post('/upload',[photoController::class,'upload_confirm']);
Route::get('/dashboard',[photoController::class,'dashboard']);




