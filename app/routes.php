<?php

Route::resource('/', 'HomeController');
Route::resource('recent', 'RecentController');
Route::resource('income', 'IncomeController');
Route::resource('income-delete', 'IncomeController@delete');
Route::resource('expense', 'ExpenseController');
Route::resource('expense-delete', 'ExpenseController@delete');
Route::resource('user', 'UserController');
Route::resource('login', 'LoginController');
Route::resource('logout', 'LoginController@logout');
