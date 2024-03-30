<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [TaskController::class,'showStatistics']);

Route::get('/tasks', [TaskController::class,'index'])->name('tasks');
Route::get('/add-new-task', [TaskController::class,'create'])->name('create_new_task');
Route::post('/store-new-task', [TaskController::class,'store'])->name('store_new_task');


