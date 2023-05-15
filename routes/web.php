<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/templating", function () {
    return view("page.layouts.main");
});

