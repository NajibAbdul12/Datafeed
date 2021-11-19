<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::get('/category/index', function () {
//     return view('category.index');
// })->middleware(['auth'])->name('category.index');


Route::get('/category', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/category/{slug}',[CategoryController::class, 'show'])->name('categories.show');



//Routes For Categories 
Route::get('/categories',[CategoryController::class, 'create'])->middleware(['isAdmin'])->name('categories.create');
Route::get('/categories/{id}', [CategoryController::class, 'edit'])->middleware(['isAdmin'])->name('categories.edit');
Route::put('/category/{id}', [CategoryController::class, 'update'])->middleware(['isAdmin'])->name('categories.update');
Route::post('/category', [CategoryController::class, 'store'])->middleware(['isAdmin'])->name('categories.store');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->middleware(['isAdmin'])->name('categories.destroy');


//Routes For Products
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/product', [ProductController::class, 'create'])->middleware(['isAdmin'])->name('products.create');
Route::get('/product/{id}', [ProductController::class, 'edit'])->middleware(['isAdmin'])->name('products.edit');
Route::put('/product/{id}', [ProductController::class, 'update'])->middleware(['isAdmin'])->name('products.update');
Route::post('/product', [ProductController::class, 'store'])->middleware(['isAdmin'])->name('products.store');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->middleware(['isAdmin'])->name('products.destroy');



//Routes For Users
Route::get('/users', [UserController::class, 'index'])->middleware(['isAdmin'])->name('users.index');
Route::get('/user/{id}', [UserController::class, 'show'])->middleware(['isAdmin'])->name('users.show');
Route::get('/users/{id}', [UserController::class, 'edit'])->middleware(['isAdmin'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->middleware(['isAdmin'])->name('users.update');

Route::view('profile', 'user.profile')->name('users.profile');
 

require __DIR__.'/auth.php';
