<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* for dynamic routes
Route::get('/users/{id}', function($id){
   return 'this is user '.$id;
}); */


//Route::get('/', [PagesController::class, 'index']);
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::resource('movies', MovieController::class);


Auth::routes();


Route::get('/dashboard', [MovieController::class, 'index'])->name('dashboard')->middleware('auth');

//Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
//Route::get('/dashboard', [MovieController::class, 'index'])->name('dashboard');
