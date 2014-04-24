<?php

Route::resource('/', 'HomeController');
Route::resource('recent', 'RecentController');
Route::resource('user', 'UserController');
Route::resource('income', 'IncomeController');
Route::resource('expense', 'ExpenseController');
