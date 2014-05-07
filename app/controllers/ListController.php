<?php

use Fintrack\Storage\Services\CategoryService as CategoryService;
use Fintrack\Storage\Services\IncomeService as IncomeService;
use Fintrack\Storage\Services\ExpenseService as ExpenseService;

class ListController extends \BaseController {
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
        $view = View::make('list');
        $view->categories = $this->categoryService->all();
        $view->incomes = $this->incomeService->all(10);
        $view->expenses = $this->expenseService->all(15);
        $view->error = 'err';
        $view->message = 'this is a message';
        return $view;
    }
}
