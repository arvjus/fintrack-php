<?php

use Fintrack\Storage\Services\CategoryService as CategoryService;
use Fintrack\Storage\Services\IncomeService as IncomeService;
use Fintrack\Storage\Services\ExpenseService as ExpenseService;

class SummaryController extends \BaseController {
    protected $layout = 'layouts.master';

    public function __construct(CategoryService $categoryService, IncomeService $incomeService, ExpenseService $expenseService) {
        $this->categoryService = $categoryService;
        $this->incomeService = $incomeService;
        $this->expenseService = $expenseService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $view = View::make('summary');
        $view->categories = $this->categoryService->all();
        $view->incomes = $this->incomeService->all(10);
        $view->expenses = $this->expenseService->all(15);

        $view->incomesTotal = new stdClass();
        $view->incomesTotal->count = 5;
        $view->incomesTotal->amount = 123.456;

        $view->expensesTotal = new stdClass();
        $view->expensesTotal->count = 10;
        $view->expensesTotal->amount = 223.322;

        $view->grouppedBy = 'none';
        $view->plotChart = false;
        $view->error = 'err';
        $view->message = 'this is a message';
        return $view;
    }
}
