<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ('This parent route');
})->name('parent')->middleware('auth', 'role:parent');