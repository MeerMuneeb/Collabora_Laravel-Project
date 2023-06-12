<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\homeController;

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

Route::get('/login', function () {
    return view('login');
});

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});

Route::view('/signup', 'signup');
Route::post('/login', [userController::class, 'login']);
Route::post('/signup', [userController::class, 'signup']);
Route::get('/', [homeController::class, 'index']);
Route::get('/toExplore', [homeController::class, 'toExplore']);
Route::get('/detail/{id}', [homeController::class, 'detail']);
Route::post('/purchased', [homeController::class, 'purchased']);