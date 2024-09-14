<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
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

Route::get('/', function () {
    return view('welcome',['posts'=>Post::paginate(3)]);
})->name('home');
Route::get('/create', [PostController::class,'create'])->name('create');
Route::post('/store', [PostController::class,'ourFileStore'])->name('store');
Route::get('/edit/{id}', [PostController::class,'editData'])->name('edit');
Route::post('/update/{id}', [PostController::class,'updateData'])->name('update');
Route::delete('/delete/{id}', [PostController::class,'deleteData'])->name('delete');