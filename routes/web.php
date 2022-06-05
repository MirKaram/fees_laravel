<?php

use App\Http\Controllers\FeesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\postController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StudentController;
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


// Route::get('/',function(){

//     return Auth::check() ? "true" : "false";
// });
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [HomeController::class, 'loginview'])->name('login');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::post('/login', [HomeController::class, 'login']);

Route::get('/about', [HomeController::class, 'about'])->name('about');
// Route::get('/{id}', [admin::class,'productById'])->where('id','[0-9]+');


Route::get('/api/feestatus/{id}', [FeesController::class, 'fees_status']);
Route::get('/approve_fees/{id}', [FeesController::class, 'approve_fees']);
Route::resource('/api/fees', FeesController::class)->name('index', 'fees');
Route::resource('/api/program', ProgramController::class)->name('index', 'program');
Route::post('/update_program_state', [ProgramController::class, 'updateFeeState']);
Route::resource('/api/student', StudentController::class)->name('index', 'student');
Route::post('/api/login', [StudentController::class, 'login']);
