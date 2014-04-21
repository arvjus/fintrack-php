<?php namespace Fintrack\Storage\Services;

use Expense;

class ExpenseService
{
    public function all() {
        return Expense::all();
    }

    public function find($id) {
        return Expense::find($id);
    }

    public function plain($dateFrom, $dateTo, $categoryIds) {
        return array();
    }

    public function summaryByCategory($dateFrom, $dateTo, $categoryIds) {
        return array();
    }

    public function summaryByMonth($dateFrom, $dateTo, $categoryIds) {
        return array();
    }
}