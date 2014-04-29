<?php

use Fintrack\Storage\Services\ExpenseService as ExpenseService;

class ExpenseController extends BaseController
{
    public function __construct(ExpenseService $expenseService) {
        $this->expenseService = $expenseService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $expense = new Expense();
        $expense->expense_id = 1;
        $expense->create_date = date('now');
        $expense->category_id = 'fd';
        $expense->amount = 123.45;
        $expense->descr = 'stuff';

        $category = new Category();
        $category->catetoy_id = 'fd';
        $category->name = 'Food';
        $category->descr = 'Food food food!';
        $categories = array($category);

        return View::make('expense', array('expense' => $expense, 'error' => 'err', 'message' => 'msg', 'categories' => $categories));
    }

    public function delete() {
        $expense = new Expense();
        $expense->expense_id = 1;
        $expense->create_date = date('now');
        $expense->category_id = 'fd';
        $expense->amount = 123.45;
        $expense->descr = 'stuff';

        $category = new Category();
        $category->catetoy_id = 'fd';
        $category->name = 'Food';
        $category->descr = 'Food food food!';
        $categories = array($category);

        return View::make('expense-delete', array('expense' => $expense, 'error' => 'err', 'message' => 'msg', 'categories' => $categories));
    }
}