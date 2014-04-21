<?php

use Fintrack\Storage\Services\IncomeService as Income;

class IncomeController extends BaseController
{
    public function __construct(Income $income) {
        $this->income = $income;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return $this->income->all();
    }
}