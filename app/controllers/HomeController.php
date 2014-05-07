<?php

use Fintrack\Storage\Services\IncomeService as IncomeService;
use Fintrack\Storage\Services\ExpenseService as ExpenseService;

class HomeController extends BaseController
{
    public function __construct(IncomeService $incomeService, ExpenseService $expenseService) {
        $this->incomeService = $incomeService;
        $this->expenseService = $expenseService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex() {
        return View::make('home',
            array('incomes' => $this->incomeService->all(5),
                  'expenses' => $this->expenseService->all(15)
            ));
    }

    public function store() {
        return "done";

    }
}