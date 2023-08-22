<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotFoundController;
use App\Http\Controllers\Admin\Cpanel\HomePageController;
use App\Http\Controllers\Admin\Cpanel\UserController;
use App\Http\Controllers\IndexController;

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => '\App\Http\Controllers\LanguagesController@switchLang']);

Route::get('/not-found',[NotFoundController::class,'index'])->name('not-found');

Auth::routes();


Route::group(['middleware' => 'checkrole:admin'], function () {
    Route::get('/home',[HomePageController::class,'viewPage'])->name('home');    

});


Route::get('/',[IndexController::class,'viewPage'])->name('home');
