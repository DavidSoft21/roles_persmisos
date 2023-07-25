<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;

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

Auth::routes();
Route::get('/',[App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * 'can:users.index' - limitar a un permiso
 * 'permission:users.index|users.edit' - limitar varios permisos
 * 'role:admin|blogger' - limitar uno o varios roles
 */
Route::group(['middleware' => ['auth','role:admin|blogger']], function(){
    Route::resource('rol',RolController::class);
    Route::resource('blog',BlogController::class);
    Route::resource('user',UserController::class);

});

