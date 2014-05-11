@extends('layouts.master')

@section('head')
{{ HTML::script('/js/fintrack.input.js') }}
<title>Finance Tracker - List Income</title>
@stop

@section('content')
<div id="heading">List Income</div><p/>

{{ Form::open(['route'=>['income.list'], 'method' => 'get']) }}
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
            <td class="inc_l">{{{ $income->user->username }}}</td>
            <td class="inc_l">{{ HTML::linkRoute('income.edit', 'Edit', $income->income_id)}}</td>
            <td class="inc_l">{{ HTML::linkRoute('income.delete', 'Delete', $income->income_id, ['class' => 'confirmation'])}}</td>
        </tr>
    @endforeach
</table>
{{ $incomes->links('pagination::slider') }}
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
