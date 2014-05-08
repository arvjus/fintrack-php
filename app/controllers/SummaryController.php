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
        $date_from = date('Y-01-01', time());
        $date_to = date('Y-m-d', time());

        $categories = $this->categoryService->all();

        $incomes_total = new stdClass();
        $incomes_total->count = 5;
        $incomes_total->amount = 123.456;

        $expenses_total = new stdClass();
        $expenses_total->count = 10;
        $expenses_total->amount = 223.322;

        $groupped_by = 'none';
        $plot_chart = false;

        $this->layout->main = View::make('summary')->with(compact('date_from', 'date_to', 'categories', 'incomes_total', 'expenses_total', 'groupped_by', 'plot_chart'));
    }
}
