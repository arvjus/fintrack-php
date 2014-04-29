<?php

use Fintrack\Storage\Services\IncomeService as IncomeService;

class IncomeController extends BaseController
{
    protected $layout = 'layouts.master';

    public function __construct(IncomeService $incomeService) {
        $this->incomeService = $incomeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $income = new Income();
        $income->income_id = 1;
        $income->create_date = date('now');
        $income->amount = 123.45;
        $income->descr = 'salary';
        return View::make('income', array('income' => $income, 'error' => 'err', 'message' => 'msg'));
    }

    public function delete() {
        $income = new Income();
        $income->income_id = 1;
        $income->create_date = date('now');
        $income->amount = 123.45;
        $income->descr = 'salary';
        return View::make('income-delete', array('income' => $income, 'error' => 'err', 'message' => 'msg'));
    }
}