@extends('layouts.master')

@section('head')
{{ HTML::script('/js/fintrack.input.js') }}
<title>Finance Tracker - Recently added expenses</title>
@stop

@section('content')
<div id="heading">Recently added expenses</div><p/>
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
            <td class="exp_l">{{{ $expense->user->username }}}</td>
            <td class="exp_l">{{ HTML::linkRoute('expense.edit', 'Edit', $expense->expense_id)}}</td>
            <td class="exp_l">{{ HTML::linkRoute('expense.delete', 'Delete', $expense->expense_id, ['class' => 'confirmation'])}}</td>
        </tr>
    @endforeach
</table>
{{ $expenses->links('pagination::slider') }}
<br>
@if($errors->has())
    @foreach($errors->all() as $error)
        <div class="error">{{ $error }}</div>
    @endforeach
@endif
@if(Session::has('success'))
    <div class="success">{{Session::get('success')}}</div>
@endif
@stop
