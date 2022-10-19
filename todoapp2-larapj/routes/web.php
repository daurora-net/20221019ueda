<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TagController;

Route::get('/', [TodoController::class, 'index'])->middleware('auth');
Route::post('/todo/create', [TodoController::class, 'create'])->name('todo.create');
Route::post('/todo/update', [TodoController::class, 'update'])->name('todo.update');
Route::post('/todo/delete', [TodoController::class, 'delete'])->name('todo.delete');
Route::get('/todo/find', [TodoController::class, 'find'])->name('todo.find')->middleware('auth');
Route::get('/todo/search', [TodoController::class, 'search'])->name('todo.search')->middleware('auth');

Route::prefix('tag')->group(function () {
    Route::get('/', [TagController::class, 'index'])->middleware('auth');
    Route::get('/add', [TagController::class, 'add'])->middleware('auth');
    Route::post('/add', [TagController::class, 'create']);
});

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';