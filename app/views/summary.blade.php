@extends('layouts.master')

@section('head')
<link href="/css/jquery.jqplot.css" rel="stylesheet" type="text/css"/>
<script language="JavaScript" src="/js/jquery.jqplot.min.js"></script>
<script language="JavaScript" src="/js/jqplot.categoryAxisRenderer.min.js"></script>
<script language="JavaScript" src="/js/jqplot.barRenderer.min.js"></script>
<script language="JavaScript" src="/js/fintrack.summary.js"></script>
<title>Finance Tracker - Summary</title>
@stop

@section('content')
<div id="heading">Summary</div><p/>

<form method="post" action="/summary@refresh">
    <table cellspacing=5 cellpading=5>
        <tr>
            <td>Date from:</td>
            <td><input type="text" class="date-pick" name="dateFrom" value="{{{ $dateFrom or ''}}}" size="12"/></td>
        </tr>
        <tr>
            <td>Date to:</td>
            <td><input type="text" class="date-pick" name="dateTo" value="{{{ $dateTo or ''}}}" size="12"/></td>
        </tr>

        <tr>
            <td>Categories:</td>
            <td>
                <table>
                    <tr>
                        <td><input type="checkbox" name="incomeSelected" value="true">Income</td>
                    </tr>
                    @foreach($categories as $category)
                        <tr>
                            <td><input type="checkbox" name="categoryId" group="categoryId"
                                       value="{{{ $category->category_id }}}" title="{{{ $category->descr }}}"
                                    >{{{ $category->name }}}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </td>
        </tr>
        <tr>
            <td>Report:</td>
            <td>
                <table>
                    <tr>
                        <td><input type="radio" name="grouppedBy" class="plot-chart" group="grouppedBy"
                                   value="categories">Group by categories
                        </td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="grouppedBy" class="plot-chart" group="grouppedBy" value="months">Group
                            by months
                        </td>
                    </tr>
                    <td><input type="checkbox" name="plotChart" class="plot-chart" value="true">Plot chart</td>
                </table>
            </td>
        </tr>
    </table>
    <p>
    <table>
        <tr>
            <td><input type="submit" value="Refresh"/></td>
            <td><input type="reset" value="Reset"/></td>
        </tr>
    </table>
    <div class="error">{{{ $error or '' }}}</div>
    <div>{{{ $message or '' }}}</div>
</form>

<hr/>
<br/>
@if ($plotChart)
    <div class="summary-chart jqPlot" id="summary-total-chart" style="height:0px; width:800px;"></div>
    <br/>
@endif
<table class="data">
    <tbody>
    <tr>
        <th class="inc_h">Incomes</th>
        <th class="inc_h">Count</th>
        <th class="inc_h">Amount</th>
        <th class="exp_h">Expenses</th>
        <th class="exp_h">Count</th>
        <th class="exp_h">Amount</th>
    </tr>
    <tr class="total_values">
        <td class="inc_l">Total</td>
        <td class="inc_r">{{{ $incomesTotal->count }}}</td>
        <td class="inc_r">{{{ $incomesTotal->amount }}}</td>
        <td class="exp_l">Total</td>
        <td class="exp_r">{{{ $expensesTotal->count }}}</td>
        <td class="exp_r">{{{ $expensesTotal->amount }}}</td>
    </tr>
    </tbody>
</table>
<br/>
@if ($grouppedBy == 'categories')
    @if ($plotChart)
        <div class="summary-chart jqPlot" id="summary-categories-chart" style="height:0px; width:800px;"></div>
        <br/>
    @endif
    <br/>
    <table class="data">
        <tbody>
        <tr>
            <th class="exp_h">Category</th>
            <th class="exp_h">Count</th>
            <th class="exp_h">Amount</th>
        </tr>
        @foreach ($expenses as $expense)
            <tr class="category_values">
                <td class="exp_l">{{{ $expense->group }}}</td>
                <td class="exp_l">{{{ $expense->count }}}</td>
                <td class="exp_r">{{{ $expense->amount }}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
@if ($grouppedBy == 'months')
    @if ($plotChart)
        <div class="summary-chart jqPlot" id="summary-months-chart" style="height:0px; width:800px;"></div>
        <br/>
    @endif
    <table class="data">
        <tbody>
        <tr>
            <th class="inc_h">Incomes</th>
            <th class="inc_h">Count</th>
            <th class="inc_h">Amount</th>
            <th class="exp_h">Expences</th>
            <th class="exp_h">Count</th>
            <th class="exp_h">Amount</th>
        </tr>
        @foreach ($summary as $item)
            <tr class="month_values">
                <td class="inc_l">{{{ $item->yyyymm }}}</td>
                <td class="inc_l">{{{ $item->income->count }}}</td>
                <td class="inc_r">{{{ $item->income->amount }}}</td>
                <td class="exp_l">{{{ $item->yyyymm }}}</td>
                <td class="exp_l">{{{ $item->expense->count }}}</td>
                <td class="exp_r">{{{ $item->expense->amount }}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif

<br/>
<div class="navigation"><a href="/home">Home</a></div>

@stop
