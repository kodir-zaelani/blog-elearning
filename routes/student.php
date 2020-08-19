<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ('This student route');
})->name('student')->middleware('auth', 'role:student');