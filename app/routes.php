<?php

/* Model Bindings */
Route::model('income', 'Income');
Route::model('expense', 'Expense');

/* GET routes */
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@getIndex']);

Route::get('income/recent', ['as' => 'income.recent', 'uses' => 'IncomeController@recentIncome']);
Route::get('income/list', ['as' => 'income.list', 'uses' => 'IncomeController@listIncome']);
Route::get('income/new', ['as' => 'income.new', 'uses' => 'IncomeController@newIncome']);
Route::get('income/{income}/edit', ['as' => 'income.edit', 'uses' => 'IncomeController@editIncome']);
Route::get('income/{income}/delete', ['as' => 'income.delete', 'uses' => 'IncomeController@deleteIncome']);

Route::get('expense/recent', ['as' => 'expense.recent', 'uses' => 'ExpenseController@recentExpense']);
Route::get('expense/list', ['as' => 'expense.list', 'uses' => 'ExpenseController@listExpense']);
Route::get('expense/new', ['as' => 'expense.new', 'uses' => 'ExpenseController@newExpense']);
Route::get('expense/{expense}/edit', ['as' => 'expense.edit', 'uses' => 'ExpenseController@editExpense']);
Route::get('expense/{expense}/delete', ['as' => 'expense.delete', 'uses' => 'ExpenseController@deleteExpense']);

Route::get('summary', ['as' => 'summary', 'uses' => 'SummaryController@getIndex']);

/* POST routes */
Route::post('income/save', ['as' => 'income.save', 'uses' => 'IncomeController@saveIncome']);
Route::post('income/{income}/update', ['as' => 'income.update', 'uses' => 'IncomeController@updateIncome']);

Route::post('expense/save', ['as' => 'expense.save', 'uses' => 'ExpenseController@saveExpense']);
Route::post('expense/{expense}/update', ['as' => 'expense.update', 'uses' => 'ExpenseController@updateExpense']);

