<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\Autentikasi\LoginController;
use App\Http\Controllers\SuperAdmin\PenggunaController;
use Illuminate\Support\Facades\Route;

Route::group(["middleware" => ["guest"]], function () {
    Route::prefix("login")->group(function () {
        Route::get("/", [LoginController::class, "login"]);
        Route::post("/", [LoginController::class, "post_login"]);
    });
});

Route::group(["middleware" => ["is_autentikasi"]], function () {
    Route::prefix("super_admin")->group(function () {
        Route::get("/dashboard", [AppController::class, "dashboard_admin"]);

        Route::prefix("pengguna")->group(function () {
            Route::get("/", [PenggunaController::class, "index"]);
            Route::get("/create", [PenggunaController::class, "create"]);
            Route::post("/store", [PenggunaController::class, "store"]);
            Route::get("/edit/{id}", [PenggunaController::class, "edit"]);
            Route::put("/update/{id}", [PenggunaController::class, "update"]);
            Route::delete("/destroy/{id}", [PenggunaController::class,"destroy"]);

        });
    });

    Route::prefix("wadir")->group(function () {
        Route::get("/dashboard", [AppController::class, "dashboard_wadir"]);
    });

    Route::prefix("ormawa")->group(function () {
        Route::get("/dashboard", [AppController::class, "dashboard_ormawa"]);
    });

    Route::get("/logout", [LoginController::class, "logout"]);
});
