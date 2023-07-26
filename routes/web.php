<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\Autentikasi\LoginController;
use App\Http\Controllers\Ormawa\IzinKegiatanController;
use App\Http\Controllers\Ormawa\LaporanKegiatanController;
use App\Http\Controllers\SuperAdmin\IzinKegiatanController as SuperAdminIzinKegiatanController;
use App\Http\Controllers\SuperAdmin\LaporanKegiatanController as SuperAdminLaporanKegiatanController;
use App\Http\Controllers\SuperAdmin\PenggunaController;
use App\Http\Controllers\Wadir\IzinKegiatanController as WadirIzinKegiatanController;
use App\Http\Controllers\Wadir\LaporanKegiatanController as WadirLaporanKegiatanController;
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

        Route::prefix("izin_kegiatan")->group(function () {
            Route::get("/", [SuperAdminIzinKegiatanController::class, "index"]);
            Route::get("/show/{id}", [SuperAdminIzinKegiatanController::class, "show"]);
            Route::put("/update/{id}", [SuperAdminIzinKegiatanController::class, "update"]);
        });

        Route::prefix("laporan_kegiatan")->group(function () {
            Route::get("/", [ SuperAdminLaporanKegiatanController::class, "index"]);
            Route::get("/show/{id}", [ SuperAdminLaporanKegiatanController::class, "show"]);
            Route::get("/lpj/{id}", [ SuperAdminLaporanKegiatanController::class, "lpj"]);
        });

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

        Route::prefix("izin_kegiatan")->group(function () {
            Route::get("/", [WadirIzinKegiatanController::class, "index"]);
            Route::get("/show/{id}", [WadirIzinKegiatanController::class, "show"]);
            Route::put("/{id}", [WadirIzinKegiatanController::class, "update"]);
        });

        Route::prefix("laporan_kegiatan")->group(function () {
            Route::get("/", [ WadirLaporanKegiatanController::class, "index"]);
            Route::get("/show/{id}", [ WadirLaporanKegiatanController::class, "show"]);
            Route::get("/lpj/{id}", [ WadirLaporanKegiatanController::class, "lpj"]);

        });
    });

    Route::prefix("ormawa")->group(function () {
        Route::get("/dashboard", [AppController::class, "dashboard_ormawa"]);

        Route::prefix("izin_kegiatan")->group(function() {
            Route::get("/", [IzinKegiatanController::class, "index"]);
            Route::get("/create", [IzinKegiatanController::class, "create"]);
            Route::post("/store", [IzinKegiatanController::class, "store"]);
            Route::get("/show/{id}", [IzinKegiatanController::class, "show"]);
            Route::delete("/destroy/{id}", [IzinKegiatanController::class,"destroy"]);
        });

        Route::prefix("laporan_kegiatan")->group(function () {
            Route::get("/", [ LaporanKegiatanController::class, "index"]);
            Route::get("/show/{id}", [ LaporanKegiatanController::class, "show"]);
            Route::put("/update/{id}", [ LaporanKegiatanController::class, "update"]);
            Route::get("/laporan/{id}", [ LaporanKegiatanController::class, "laporan"]);
        });
    });

    Route::get("/logout", [LoginController::class, "logout"]);
});
