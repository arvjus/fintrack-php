@extends('layouts.master')

@section('head')
{{ HTML::style('/css/jquery.jqplot.css') }}
{{ HTML::script('/js/jquery.jqplot.min.js') }}
{{ HTML::script('/js/jqplot.categoryAxisRenderer.min.js') }}
{{ HTML::script('/js/jqplot.barRenderer.min.js') }}
{{ HTML::script('/js/fintrack.summary.js') }}
<title>Finance Tracker - Summary</title>
@stop

@section('content')
<div id="heading">Summary</div><p/>

{{ Form::open(['route'=>['summary'], 'method' => 'get']) }}
    <table cellspacing=5 cellpading=5>
        <tr>
            <td>Date from:</td>
            <td><input type="text" class="date-pick" name="date_from" value="{{{ $date_from }}}" size="12"/></td>
        </tr>
        <tr>
            <td>Date to:</td>
            <td><input type="text" class="date-pick" name="date_to" value="{{{ $date_to }}}" size="12"/></td>
        </tr>
        <tr>
            <td>Categories:</td>
            <td>
                <table>
                    <tr>
                        <td>{{ Form::checkbox('income_selected', true, $income_selected) }} Income</td>
                    </tr>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ Form::checkbox('category_ids[]', $category->category_id, in_array($category->category_id, $category_ids), ['title' => $category->descr]) }} {{{ $category->name }}}</td>
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
                        <td>{{ Form::radio('groupped_by', 'categories', $groupped_by == 'categories') }} Group by categories</td>
                    </tr>
                    <tr>
                        <td>{{ Form::radio('groupped_by', 'months', $groupped_by == 'months') }} Group by months</td>
                    </tr>
                    <td>{{ Form::checkbox('plot_chart', true, $plot_chart) }} Plot chart</td>
                </table>
            </td>
        </tr>
    </table>
    <p>
    <table>
        <tr>
            <td>{{ Form::submit('Refresh') }}</td>
            <td>{{ Form::reset('Reset') }}</td>
        </tr>
    </table>
    @if($errors->has())
        @foreach($errors->all() as $error)
            <div class="error">{{ $error }}</div>
        @endforeach
    @endif
{{ Form::close() }}
<hr/>
<br/>
@if ($plot_chart)
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
        <td class="inc_r">{{{ $incomes_total->count }}}</td>
        <td class="inc_r">{{{ number_format($incomes_total->amount, 2, '.', '') }}}</td>
        <td class="exp_l">Total</td>
        <td class="exp_r">{{{ $expenses_total->count }}}</td>
        <td class="exp_r">{{{ number_format($expenses_total->amount, 2, '.', '') }}}</td>
    </tr>
    </tbody>
</table>
<br/>
@if ($groupped_by == 'categories')
    @if ($plot_chart)
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
                <td class="exp_r">{{{ number_format($expense->amount, 2, '.', '') }}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
@if ($groupped_by == 'months')
    @if ($plot_chart)
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
                <td class="inc_r">{{{ number_format($item->income->amount, 2, '.', '') }}}</td>
                <td class="exp_l">{{{ $item->yyyymm }}}</td>
                <td class="exp_l">{{{ $item->expense->count }}}</td>
                <td class="exp_r">{{{ number_format($item->expense->amount, 2, '.', '') }}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
@stop
