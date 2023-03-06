<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\ArticleController;
use \App\Http\Controllers\Admin\CategoryController;
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
    return view('admin.index');
})->name("home");

Route::get("articles", [ArticleController::class, "index"])->name("article.index");
Route::get("articles/create", [ArticleController::class, "create"])->name("article.create");

Route::get("categories", [CategoryController::class, "index"])->name("category.index");
Route::get("categories/create", [CategoryController::class, "create"])->name("category.create");
Route::post('categories/change-status', [CategoryController::class, 'changeStatus'])->name("categories.changeStatus");
Route::post('categories/change-feature-status', [CategoryController::class, 'changeFeatureStatus'])->name("categories.changeFeatureStatus");
Route::post('categories/delete', [CategoryController::class, 'delete'])->name("categories.delete");
Route::get('categories/{id}/edit', [CategoryController::class, 'edit'])->name("categories.edit")->whereNumber("id");

