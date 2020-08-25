<?php

use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['layout' => 'frontend.templates.default'], function () {
    Route::livewire('/', 'frontend.home.index')->name('root');
    Route::livewire('/about', 'frontend.about.index')->name('about.index');
    Route::livewire('/portfolio', 'frontend.portfolio.all')->name('portfolio');
    Route::livewire('/category/{slug}', 'frontend.category.show')->name('category.show');
    Route::livewire('/author/{slug}', 'frontend.author.show')->name('author.show');
    Route::livewire('/tag/{slug}', 'frontend.tag.show')->name('tag.show');
    Route::livewire('/event/{slug}', 'frontend.event.show')->name('event.show');
    
    Route::prefix('post')->group(function () {
        Route::livewire('/all', 'frontend.post.all')->name('post.all');
        Route::livewire('/archive', 'frontend.post.archive')->name('post.archive');
        Route::livewire('/search', 'frontend.post.search')->name('post.search');
        Route::livewire('/detail/{post}', 'frontend.post.show')->name('post.show');
    });
    Route::prefix('course')->group(function () {
        Route::livewire('/all-list', 'frontend.course.all-list')->name('course.all-list');
        Route::livewire('/all-grid', 'frontend.course.all-grid')->name('course.all-grid');

    });
});

Route::group(['middleware' => 'guest'], function(){
    //login page
    Route::livewire('/login', 'backend.admin.login')->layout('layouts.auth')->name('backend.login');
    //logout page
    Route::livewire('/logout', 'backend.admin.logout')->layout('layouts.backend')->name('backend.logout');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
