<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::middleware('auth')->group(function (){

Route::get('users', [UserController::class, 'index'])
->name('user.index');

Route::get('users/create', [UserController::class, 'create'])
->name('user.create');

Route::post('users/store', [UserController::class, 'store'])
->name('user.store');

Route::get('users/{users}', [UserController::class, 'show'])
->name('user.show');

Route::get('users/edit/{users}', [UserController::class, 'edit'])
->name('user.edit');

Route::post('users/update/{users}', [UserController::class, 'update'])
->name('user.update');

Route::delete('users/destroy/{users}', [UserController::class, 'destroy'])
->name('user.destroy');

Route::get('posts', [PostController::class, 'index'])
->name('post.index');


Route::get('posts/create', [PostController::class, 'create'])
->name('post.create');


Route::post('posts/store', [PostController::class, 'store'])
->name('post.store');


Route::get('posts/{posts}', [PostController::class, 'show'])
->name('post.show');


Route::get('posts/edit/{posts}', [PostController::class, 'edit'])
->name('post.edit');


Route::post('posts/update/{posts}', [PostController::class, 'update'])
->name('post.update');


Route::delete('posts/destroy/{posts}', [PostController::class, 'destroy'])
->name('post.destroy');

Route::delete('posts/forceDelete/{posts}', [PostController::class, 'forceDelete'])
->name('post.forceDelete');

Route::resource('tags', TagController::class);


});


Route::get('login', [AuthController::class, 'showLogin'])
->name('auth.showLogin');

Route::post('login', [AuthController::class, 'login'])
->name('auth.login');

Route::post('logout', [AuthController::class, 'logout'])
->name('auth.logout');


Route::get('register', [AuthController::class, 'showRegister'])
->name('auth.showRegister');


Route::post('register', [AuthController::class, 'register'])
->name('auth.register');
