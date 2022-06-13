<?php

use App\Http\Controllers\Auth_admin;
use App\Http\Controllers\Category;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Product;
use App\Http\Controllers\Landing_Controller;
use App\Http\Controllers\TransaksiController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Register', [CustomerController::class, 'Register']);

Route::post('/Register', [CustomerController::class, 'store']);

Route::get('/Login', [CustomerController::class, 'index']);

Route::post('/Login', [CustomerController::class, 'login']);

Route::get('/LoginAdmin', [Auth_admin::class, 'Login']);

Route::get('/admin', [Auth_admin::class, 'index']);

Route::post('/admin/store', [Auth_admin::class, 'store']);

Route::get('/admin/create', [Auth_admin::class, 'create']);

Route::post('/Login_store', [Auth_admin::class, 'LoginStore']);

Route::get('/dashboard', [Dashboard::class, 'index']);

Route::get('/product', [Product::class, 'index']);

Route::get('/product/edit/{id}', [Product::class, 'edit']);

Route::post('/product/edit/{id}', [Product::class, 'update']);

Route::get('/product/show/{id}', [Product::class, 'show']);

Route::get('/product/delete/{id}', [Product::class, 'destroy']);

Route::get('/product/create', [Product::class, 'create']);

Route::post('/product/store', [Product::class, 'store']);

Route::get('/', [Landing_Controller::class, 'index']);

Route::get('/report', [TransaksiController::class, 'index']);

Route::get('/report/detail/{id}', [TransaksiController::class, 'show']);

Route::controller(Category::class)->group( function() {
    Route::get('/category', 'index');
    Route::get('/category/create', 'create');
    Route::get('/category/edit/{id}', 'edit');
    Route::post('/category/edit/{id}', 'update');
    Route::post('/category/store', 'store');
    Route::get('/category/delete/{id}', 'destroy');
});