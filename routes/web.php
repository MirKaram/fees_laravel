<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\CarController;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\postController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
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

Route::get('/', [postController::class,'index'])->name('home');
Route::resource('/program',ProgramController::class);
Route::resource('/api/fees',FeesController::class);
Route::post('/api/login',[StudentController::class,'login']);
Route::get('/about', [postController::class,'about'])->name('about');
// Route::get('/{id}', [admin::class,'productById'])->where('id','[0-9]+');

Route::resource('/cars',CarController::class)->name('index','cars');



