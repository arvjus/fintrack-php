<?php namespace Fintrack\Storage\Services;

use Beans\SummaryBean;

class DataAggregationService
{
    public function total($beans) {
        $count = 0;
        $amount = 0;
        foreach($beans as $bean) {
            $count += $bean->count;
            $amount += $bean->amount;
        }
        return new SummaryBean($count, $amount);
    }

    public function joinSummary($incomes, $expenses) {
        return array();
    }
} 