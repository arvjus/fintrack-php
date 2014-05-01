@extends('layouts.master')

@section('head')
<title>Finance Tracker - Recently added records</title>
@stop

@section('content')
<div id="heading">Recently added records</div><p/>
<b>Incomes</b>
<table class="data">
    <tr>
        <th class="inc_h">Date</th>
        <th class="inc_h">Amount</th>
        <th class="inc_h">Description</th>
    </tr>
    @foreach ($incomes as $income)
        <tr>
            <td class="inc_l">{{{ $income->create_date }}}</td>
            <td class="inc_r">{{{ number_format($income->amount, 2, '.', '') }}}</td>
            <td class="inc_l">{{{ $income->descr }}}</td>
        </tr>
    @endforeach
</table>
<br/>
<b>Expences</b>
<table class="data">
    <tr>
        <th class="exp_h">Date</th>
        <th class="exp_h">Amount</th>
        <th class="exp_h">Category</th>
        <th class="exp_h">Description</th>
    </tr>
    @foreach ($expenses as $expense)
        <tr>
            <td class="exp_l">{{{ $expense->create_date }}}</td>
            <td class="exp_r">{{{ number_format($expense->amount, 2, '.', '') }}}</td>
            <td class="exp_l">{{{ $expense->category->name_short }}}</td>
            <td class="exp_l">{{{ $expense->descr }}}</td>
        </tr>
    @endforeach
</table>
<br/>
<div class="navigation"><a href="/home">Home</a></div>
@stop
