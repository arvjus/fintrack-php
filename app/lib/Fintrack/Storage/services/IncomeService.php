<?php namespace Fintrack\Storage\Services;

use Income;
use Beans\SummaryBean;

class IncomeService
{
    public function all($limit = 0) {
        if ($limit > 0) {
            return Income::take($limit)->
                           orderBy('create_date', 'DESC')->get();
        } else {
            return Income::orderBy('create_date', 'DESC')->get();
        }
    }

    public function plain($dateFrom, $dateTo) {
        return Income::whereBetween('create_date', array($dateFrom, $dateTo))->orderBy('create_date', 'DESC')->get();
    }

    public function summarySimple($dateFrom, $dateTo) {
        $results = \DB::select(
            \DB::raw('SELECT COUNT(income_id) AS count, SUM(amount) AS amount ' .
                     'FROM incomes ' .
                     'WHERE create_date BETWEEN ? AND ?'),
                array($dateFrom, $dateTo)
            );

        $summaries = array();
        if (count($results) > 0) {
            foreach ($results as $result) {
                $summaries[] = new SummaryBean($result->count, $result->amount);
            }
        }
        return $summaries;
    }

    public function summaryByMonth($dateFrom, $dateTo) {
        $results = \DB::select(
            \DB::raw('SELECT COUNT(income_id) AS count, SUM(amount) AS amount, SUBSTRING(create_date, 1, 7) AS grp ' .
                     'FROM incomes ' .
                     'WHERE create_date BETWEEN ? AND ? ' .
                     'GROUP BY SUBSTRING(create_date, 1, 7)' .
                     'ORDER BY SUBSTRING(create_date, 1, 7)'),
                array($dateFrom, $dateTo)
            );

        $summaries = array();
        if (count($results) > 0) {
            foreach ($results as $result) {
                $summaries[] = new SummaryBean($result->count, $result->amount, $result->grp);
            }
        }
        return $summaries;
    }
}