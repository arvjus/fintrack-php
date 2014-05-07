<?php

use Fintrack\Storage\Services\ExpenseService as ExpenseService;
use Fintrack\Storage\Services\CategoryService as CategoryService;

class ExpenseController extends BaseController
{
    public function __construct(ExpenseService $expenseService, CategoryService $categoryService) {
        $this->expenseService = $expenseService;
        $this->categoryService = $categoryService;
    }

    /* get functions */
    public function recentExpense() {
        $expenses = $this->expenseService->get(15);
        $this->layout->main = View::make('expenses.recent')->with(compact('expenses'));
    }

    public function listExpense() {
        $categories = $this->categoryService->all();
        $expenses = $this->expenseService->get(15);
        $this->layout->main = View::make('expenses.list')->with(compact('expenses', 'categories'));
    }

    public function newExpense() {
        $categories = $this->categoryService->all();
        $this->layout->main = View::make('expenses.new')->with(compact('categories'));
    }

    public function editExpense(Expense $expense) {
        $categories = $this->categoryService->all();
        $this->layout->main = View::make('expenses.edit')->with(compact('expense', 'categories'));
    }

    public function deleteExpense(Expense $expense) {
        $this->layout->main = View::make('expenses.delete')->with(compact('expense'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    /*
    public function index() {
        $expense = new Expense();
        $expense->expense_id = 1;
        $expense->create_date = date('Y-m-d', time());
        $expense->category_id = 'fd';
        $expense->amount = 123.45;
        $expense->descr = 'stuff';

        $category = new Category();
        $category->catetoy_id = 'fd';
        $category->name = 'Food';
        $category->descr = 'Food food food!';
        $categories = array($category);

        return View::make('expenses', array('expenses' => $expense, 'error' => 'err', 'message' => 'msg', 'categories' => $categories));
    }

    public function delete() {
        $expense = new Expense();
        $expense->expense_id = 1;
        $expense->create_date = date('Y-m-d', time());
        $expense->category_id = 'fd';
        $expense->amount = 123.45;
        $expense->descr = 'stuff';

        $category = new Category();
        $category->catetoy_id = 'fd';
        $category->name = 'Food';
        $category->descr = 'Food food food!';
        $categories = array($category);

        return View::make('expenses-delete', array('expenses' => $expense, 'error' => 'err', 'message' => 'msg', 'categories' => $categories));
    }
    */
}