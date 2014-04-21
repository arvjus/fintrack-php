<?php

Route::resource('home', 'HomeController');
Route::resource('user', 'UserController');
Route::resource('income', 'IncomeController');
Route::resource('expense', 'ExpenseController');

Route::get('/', function () {
    return View::make('hello');
});
