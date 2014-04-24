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
        return View::make('recent',
            array('incomes' => $this->incomeService->all(5),
                  'expenses' => $this->expenseService->all(15)
            ));
    }
}