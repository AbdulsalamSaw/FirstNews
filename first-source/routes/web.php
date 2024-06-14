<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotFoundController;
use App\Http\Controllers\Admin\Cpanel\HomePageController;
use App\Http\Controllers\Admin\Cpanel\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\Cpanel\CategoryController;
use App\Http\Controllers\Admin\Cpanel\ArticleController;
use App\Http\Controllers\SearchController;

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => '\App\Http\Controllers\LanguagesController@switchLang']);


Route::group(['middleware' => 'checkrole:admin'], function () {
    Route::get('/home',[HomePageController::class,'viewPage'])->name('home');
    Route::get('/categories/create',[CategoryController::class,'create'])->name('create');
    Route::get('/categories/show',[CategoryController::class,'index'])->name('index');
    Route::get('/categories/edit',[CategoryController::class,'edit'])->name('edit');
    Route::get('/categories/search', 'CategoryController@search')->name('categories.search');
    Route::resource('articles', ArticleController::class);
    Route::resource('categories', CategoryController::class);



});

Route::get('/not-found',[NotFoundController::class,'index'])->name('not-found');
Auth::routes();


Route::get('/',[IndexController::class,'viewPage'])->name('home');




Route::get('s/{id}',[IndexController::class,'viewSingleNew'])->name('singleNew.show');
Route::get('c/{id}',[IndexController::class,'viewCategory'])->name('singleCategory.show');
Route::get('/search', [SearchController::class, 'search'])->name('search');
