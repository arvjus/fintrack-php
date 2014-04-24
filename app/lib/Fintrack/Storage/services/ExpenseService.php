<?php namespace Fintrack\Storage\Services;

use Expense;
use Beans\SummaryBean;

class ExpenseService
{
    public function all($limit = 0) {
        if ($limit > 0) {
            return Expense::take($limit)->
                   orderBy('create_date', 'DESC')->get();
        } else {
            return Expense::orderBy('create_date', 'DESC')->get();
        }
    }

    public function plain($dateFrom, $dateTo, $categoryIds = array()) {
        if (count($categoryIds) > 0) {
            return Expense::whereBetween('create_date', array($dateFrom, $dateTo))->
                            whereRaw("category_id in ('" . implode("','", $categoryIds) . "')")->
                            orderBy('create_date', 'DESC')->get();
        }
        return Expense::whereBetween('create_date', array($dateFrom, $dateTo))->
                        orderBy('create_date', 'DESC')->get();
    }

    public function summaryByCategory($dateFrom, $dateTo, $categoryIds = array()) {
        $where_categories = '';
        if (count($categoryIds) > 0) {
            $where_categories = " AND e.category_id in ('" . implode("','", $categoryIds) . "')";
        }

        $results = \DB::select(
            \DB::raw('SELECT COUNT(e.expense_id) AS count, SUM(e.amount) AS amount, c.name AS grp ' .
                ' FROM expenses e, categories c ' .
                'WHERE c.category_id = e.category_id ' .
                '  AND e.create_date BETWEEN ? AND ? ' . $where_categories .
                'GROUP BY c.name ' .
                'ORDER BY c.name '),
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

    public function summaryByMonth($dateFrom, $dateTo, $categoryIds = array()) {
        $where_categories = '';
        if (count($categoryIds) > 0) {
            $where_categories = " AND category_id in ('" . implode("','", $categoryIds) . "')";
        }

        $results = \DB::select(
            \DB::raw('SELECT COUNT(expense_id) AS count, SUM(amount) AS amount, SUBSTRING(create_date, 1, 7) AS grp ' .
                ' FROM expenses ' .
                'WHERE create_date BETWEEN ? AND ? ' . $where_categories .
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