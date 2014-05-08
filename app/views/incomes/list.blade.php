@extends('layouts.master')

@section('head')
{{ HTML::script('/js/fintrack.input.js') }}
<title>Finance Tracker - List Incomes</title>
@stop

@section('content')
<div id="heading">List Incomes</div><p/>

{{ Form::open(['route'=>['income.list'], 'method' => 'get']) }}
    <table cellspacing=5 cellpading=5>
        <tr>
            <td>Date from:</td>
            <td><input type="text" class="date-pick" name="date_from" value="{{{ $date_from or ''}}}" size="12"/></td>
        </tr>
        <tr>
            <td>Date to:</td>
            <td><input type="text" class="date-pick" name="date_to" value="{{{ $date_to or ''}}}" size="12"/></td>
        </tr>
        <tr>
            <td>User:</td>
            <td><input type="text" name="user_id" value="{{{ $user_id or ''}}}" size="12"/></td>
        </tr>
    </table>
    <p>
    <table>
        <tr>
            <td>{{ Form::submit('Refresh') }}</td>
            <td>{{ Form::reset('Reset') }}</td>
        </tr>
    </table>
    <div class="error">{{{ $error or '' }}}</div>
    <div>{{{ $message or '' }}}</div>
{{ Form::close() }}

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
