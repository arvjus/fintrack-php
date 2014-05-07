<?php

use Fintrack\Storage\Services\CategoryService as CategoryService;
use Fintrack\Storage\Services\IncomeService as IncomeService;
use Fintrack\Storage\Services\ExpenseService as ExpenseService;

class SummaryController extends \BaseController {
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
    public function getIndex() {
        $view = View::make('summary');
        $view->categories = $this->categoryService->all();
        $view->incomes = $this->incomeService->all(10);
        $view->expenses = $this->expenseService->all(15);

        $view->incomes_total = new stdClass();
        $view->incomes_total->count = 5;
        $view->incomes_total->amount = 123.456;

        $view->expenses_total = new stdClass();
        $view->expenses_total->count = 10;
        $view->expenses_total->amount = 223.322;

        $view->groupped_by = 'none';
        $view->plot_chart = false;
        $view->error = 'err';
        $view->message = 'this is a message';
        return $view;
    }
}
