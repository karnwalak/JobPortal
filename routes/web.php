<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class,'index'])->name('/');
Route::get('/register', [UserController::class,'register'])->name('register')->middleware('guest');
Route::get('/login', [UserController::class,'login'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class,'login'])->name('login');
Route::get('/show-detail', [HomeController::class,'show_detail'])->name('show-detail');
Route::get('/filter-tag',[HomeController::class,'filter_tag'])->name('filter-tag');
Route::resource('users',UserController::class);
Route::middleware(['auth'])->group(function () {
  Route::get('/create-job', [HomeController::class,'create_job'])->name('create-job');
  Route::get('/manage', [HomeController::class,'manage'])->name('manage');
  Route::get('/logout', [UserController::class,'logout'])->name('logout');
  Route::get('/edit', [HomeController::class,'edit'])->name('edit');
  Route::get('/delete', [HomeController::class,'delete'])->name('delete');
  Route::post('/update-job', [HomeController::class,'update_job'])->name('update-job');
  Route::post('/store-job', [HomeController::class,'store_job'])->name('store-job');
});
