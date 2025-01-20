<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('users', UserController::class);
Route::resource('companies', CompanyController::class);
Route::resource('company-types', CompanyTypeController::class)->only(['index', 'show']);
