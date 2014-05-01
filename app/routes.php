<?php

Route::resource('/', 'HomeController');
Route::resource('login', 'LoginController@login');
Route::resource('logout', 'LoginController@logout');
Route::resource('income', 'IncomeController');
Route::resource('income-delete', 'IncomeController@delete');
Route::resource('expense', 'ExpenseController');
Route::resource('expense-delete', 'ExpenseController@delete');
Route::resource('recent', 'RecentController');
Route::resource('list', 'ListController');
Route::resource('summary', 'SummaryController');
