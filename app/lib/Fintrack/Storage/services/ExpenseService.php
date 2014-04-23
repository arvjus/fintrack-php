<?php namespace Fintrack\Storage\Services;

use Expense;

class ExpenseService
{
    public function all($limit = 0) {
        if ($limit > 0) {
            return Expense::take($limit)->get();
        } else {
            return Expense::all();
        }
        return Expense::all();
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