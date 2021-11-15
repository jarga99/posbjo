<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::get('/', fn () => redirect()->route('login'));

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('homeapp');
})->name('dashboard');


Route::group(['middleware' => 'auth'],function () {
    // category routing
    Route::get('/category/data', [CategoryController::class, 'data'])->name('category.data');
    Route::resource('/category',CategoryController::class);

    // Product routing
    Route::get('/product/data', [ProductController::class, 'data'])->name('product.data');
    Route::post('/product/delete-selected', [ProdukController::class, 'deleteSelected'])->name('product.delete_selected');
    Route::resource('/product',ProductController::class);
});