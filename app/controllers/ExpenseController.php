<?php

use Fintrack\Storage\Services\ExpenseService as Expense;

class ExpenseController extends BaseController
{
    public function __construct(Expense $expense) {
        $this->expense = $expense;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return $this->expense->all();
    }
}