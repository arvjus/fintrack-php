@extends('layouts.master')

@section('head')
<title>Finance Tracker - Recently added income</title>
@stop

@section('content')
<div id="heading">Recently added income</div><p/>
{{ $incomes->links('pagination::simple') }}
<table class="data">
    <tr>
        <th class="inc_h">Date</th>
        <th class="inc_h">Amount</th>
        <th class="inc_h">Description</th>
        <th class="inc_h">User</th>
        <th class="inc_h">Edit</th>
        <th class="inc_h">Delete</th>
    </tr>
    @foreach ($incomes as $income)
        <tr>
            <td class="inc_l">{{{ $income->create_date }}}</td>
            <td class="inc_r">{{{ number_format($income->amount, 2, '.', '') }}}</td>
            <td class="inc_l">{{{ $income->descr }}}</td>
            <td class="inc_l">{{{ $income->user->name }}}</td>
            <td class="inc_l">{{ HTML::linkRoute('income.edit', 'Edit', $income->income_id )}}</td>
            <td class="inc_l">{{ HTML::linkRoute('income.delete', 'Delete', $income->income_id )}}</td>
        </tr>
    @endforeach
</table>
@stop
