<?php

use Fintrack\Storage\Services\IncomeService as IncomeService;
use Fintrack\Storage\Services\ExpenseService as ExpenseService;

class RecentController extends BaseController
{
    protected $layout = 'layouts.master';

    public function __construct(IncomeService $incomeService, ExpenseService $expenseService) {
        $this->incomeService = $incomeService;
        $this->expenseService = $expenseService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $income = new Income();
        $income->income_id = 1;
        $income->user_id = 1;
        $income->create_date = date('now');
        $income->amount = 123.45;
        $income->descr = 'salary';

        $view = View::make('recent');
        $view->incomes = $this->incomeService->all(5);
        $view->expenses = $this->expenseService->all(15);
        $view->msg = 'this is a message';
        return $view;
    }
}