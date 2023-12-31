<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\adminController;

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
    if(Session::has('user')){
        Session::forget('user');
    }elseif(Session::has('admin')){
        Session::forget('admin');
    }    
    return redirect('login');
});


Route::middleware('admin')->group(function () {
    Route::get('/admin', [adminController::class, 'index']);
    Route::get('/category', [adminController::class, 'categories']);
    Route::post('/addCategory', [adminController::class, 'addCategory']);
    Route::put('/editCategory', [adminController::class, 'editCategory']);
    Route::post('/deleteCategory', [adminController::class, 'deleteCategory']);
    Route::get('/users', [adminController::class, 'users']);
    Route::post('/addUser', [adminController::class, 'addUser']);
    Route::put('/editUser', [adminController::class, 'editUser']);
    Route::post('/deleteUser', [adminController::class, 'deleteUser']);
    Route::get('/services', [adminController::class, 'services']);
    Route::post('/addService', [adminController::class, 'addService']);
    Route::put('/editService', [adminController::class, 'editService']);
    Route::post('/deleteService', [adminController::class, 'deleteService']);
});



Route::view('/signup', 'signup');
Route::post('/login', [userController::class, 'login']);
Route::post('/signup', [userController::class, 'signup']);
Route::get('/', [homeController::class, 'index']);
Route::get('/toExplore', [homeController::class, 'toExplore']);
Route::get('/detail/{id}', [homeController::class, 'detail']);
Route::get('/Cexplore/{id}', [homeController::class, 'Cexplore']);
Route::post('/purchased', [homeController::class, 'purchased']);
Route::post('/searchDetail', [homeController::class, 'searchDetail']);