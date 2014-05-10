@extends('layouts.master')

@section('head')
{{ HTML::script('/js/fintrack.input.js') }}
<title>Finance Tracker - List Expenses</title>
@stop

@section('content')
<div id="heading">List Expenses</div><p/>

{{ Form::open(['route'=>['expense.list'], 'method' => 'get']) }}
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
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ Form::checkbox('category_ids[]', $category->category_id, in_array($category->category_id, $category_ids), ['title' => $category->descr]) }} {{{ $category->name }}}</td>
                        </tr>
                    @endforeach
                </table>
            </td>
        </tr>
        <tr>
            <td>User:</td>
            <td>{{ Form::select('user_id', $users, $user_id) }}</td>
        </tr>
    </table>
    <p>
    <table>
        <tr>
            <td>{{ Form::submit('Refresh') }}</td>
            <td>{{ Form::reset('Reset') }}</td>
        </tr>
    </table>
{{ Form::close() }}

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
