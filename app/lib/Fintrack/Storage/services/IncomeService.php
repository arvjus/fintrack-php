<?php namespace Fintrack\Storage\Services;

use Income;

class IncomeService
{
    public function all() {
        return Income::all();
    }

    public function find($id) {
        return Income::find($id);
    }

    public function plain($dateFrom, $dateTo) {
        return array();
    }

    public function summarySimple($dateFrom, $dateTo) {
        return array();
    }

    public function summaryByMonth($dateFrom, $dateTo) {
        return array();
    }
}