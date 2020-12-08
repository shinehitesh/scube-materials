<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//categories
Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
Route::post('/category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{id}/edit', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
Route::patch('/category/{id}/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{id}/delete', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');

//materials
Route::get('/materials', [App\Http\Controllers\MaterialController::class, 'index'])->name('materials.index');
Route::get('/material/create', [App\Http\Controllers\MaterialController::class, 'create'])->name('material.create');
Route::post('/material/store', [App\Http\Controllers\MaterialController::class, 'store'])->name('material.store');
Route::get('/material/{id}/edit', [App\Http\Controllers\MaterialController::class, 'edit'])->name('material.edit');
Route::patch('/material/{id}/update', [App\Http\Controllers\MaterialController::class, 'update'])->name('material.update');
Route::delete('/material/{id}/delete', [App\Http\Controllers\MaterialController::class, 'delete'])->name('material.delete');

//inword - outword quantity
Route::get('/quantities', [App\Http\Controllers\QuantityController::class, 'index'])->name('quantities.index');
Route::get('/quantity/create', [App\Http\Controllers\QuantityController::class, 'create'])->name('quantity.create');
Route::post('/quantity/store', [App\Http\Controllers\QuantityController::class, 'store'])->name('quantity.store');
Route::get('/quantity/{id}/edit', [App\Http\Controllers\QuantityController::class, 'edit'])->name('quantity.edit');
Route::patch('/quantity/{id}/update', [App\Http\Controllers\QuantityController::class, 'update'])->name('quantity.update');
Route::delete('/quantity/{id}/delete', [App\Http\Controllers\QuantityController::class, 'delete'])->name('quantity.delete');

//ajax
Route::get('/get-material-name/{id}', [App\Http\Controllers\AjaxController::class, 'getMaterialName'])->name('quantities.index');
