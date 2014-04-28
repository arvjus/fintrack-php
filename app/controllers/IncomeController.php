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

        //return View::make('test', array('income' => $income, 'err' => 'err', 'msg' => 'msg'));

        return View::make('income', array('income' => $income, 'err' => 'err', 'msg' => 'msg'));
    }
}