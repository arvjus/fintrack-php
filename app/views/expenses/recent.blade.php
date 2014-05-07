@extends('layouts.master')

@section('head')
<title>Finance Tracker - Recently added expenses</title>
@stop

@section('content')
<div id="heading">Recently added expenses</div><p/>
{{ $expenses->links('pagination::simple') }}
<table class="data">
    <tr>
        <th class="exp_h">Date</th>
        <th class="exp_h">Amount</th>
        <th class="exp_h">Category</th>
        <th class="exp_h">Description</th>
        <th class="exp_h">User</th>
        <th class="exp_h">Edit</th>
        <th class="exp_h">Delete</th>
    </tr>
    @foreach ($expenses as $expense)
        <tr>
            <td class="exp_l">{{{ $expense->create_date }}}</td>
            <td class="exp_r">{{{ number_format($expense->amount, 2, '.', '') }}}</td>
            <td class="exp_l">{{{ $expense->category->name_short }}}</td>
            <td class="exp_l">{{{ $expense->descr }}}</td>
            <td class="exp_l">{{{ $expense->user->name }}}</td>
            <td class="exp_l">{{ HTML::linkRoute('expense.edit', 'Edit', $expense->expense_id )}}</td>
            <td class="exp_l">{{ HTML::linkRoute('expense.delete', 'Delete', $expense->expense_id )}}</td>
        </tr>
    @endforeach
</table>
@stop
