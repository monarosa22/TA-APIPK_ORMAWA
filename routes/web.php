<?php

use App\Http\Controllers\SuperAdmin\AppController;
use App\Http\Controllers\Autentikasi\LoginController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/templating", function () {
    return view("page.layouts.main");
});

Route::group(["middleware" => ["guest"]], function () {
    Route::get("/login", [LoginController::class, "login"]);
Route::post("/login", [LoginController::class, "post_login"]);
});

Route::group(["middleware" => ["is_admin"]], function () {
    Route::prefix("super_admin")->group(function() {
        Route::get("/dashboard", [AppController::class, "dashboard"]);
    });
});
