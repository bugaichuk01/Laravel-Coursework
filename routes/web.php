<?php

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
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
Route::get('/' , function () {
   return redirect('home');
});

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category/{category:id}', [\App\Http\Controllers\HomeController::class, 'categoryFilter']);
Route::get('/post/{post:id}', [\App\Http\Controllers\HomeController::class, 'postFilter'])->name('postPage');


Route::middleware(['role:admin'])->prefix('admin_panel')->group(function() {
    Route::get('home-admin', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('homeAdmin');
    Route::resource('category', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('post', App\Http\Controllers\Admin\PostController::class);
});
