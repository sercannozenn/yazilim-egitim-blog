<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\ArticleController;
use \App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\LoginController;
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

Route::prefix("admin")->middleware("auth")->group(function()
{

    Route::get('/', function () {
        return view('admin.index');
    })->name("admin.index");

    Route::get("articles", [ArticleController::class, "index"])->name("article.index");
    Route::get("articles/create", [ArticleController::class, "create"])->name("article.create");
    Route::post("articles/create", [ArticleController::class, "store"]);
    Route::get("articles/{id}/edit", [ArticleController::class, "edit"])->name("article.edit");
    Route::post("articles/{id}/edit", [ArticleController::class, "update"]);
    Route::post('article/change-status', [ArticleController::class, 'changeStatus'])->name("article.changeStatus");
    Route::delete('article/delete', [ArticleController::class, 'delete'])->name("article.delete");


    Route::get("categories", [CategoryController::class, "index"])->name("category.index");
    Route::get("categories/create", [CategoryController::class, "create"])->name("category.create");
    Route::post("categories/create", [CategoryController::class, "store"]);
    Route::post('categories/change-status', [CategoryController::class, 'changeStatus'])->name("categories.changeStatus");
    Route::post('categories/change-feature-status', [CategoryController::class, 'changeFeatureStatus'])->name("categories.changeFeatureStatus");
    Route::post('categories/delete', [CategoryController::class, 'delete'])->name("categories.delete");
    Route::get('categories/{id}/edit', [CategoryController::class, 'edit'])->name("categories.edit")->whereNumber("id");
    Route::post('categories/{id}/edit', [CategoryController::class, 'update'])->whereNumber("id");
});

Route::get('/', function () {
//    return view('admin.index');
})->name("home");





Route::get("/login", [LoginController::class, "showLogin"])->name("login");
Route::post("/login", [LoginController::class, "login"]);
Route::post("/logout", [LoginController::class, "logout"])->name("logout");

Route::get("/register", [LoginController::class, "showRegister"])->name("register");
Route::post("/register", [LoginController::class, "register"]);

