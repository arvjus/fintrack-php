@extends('layouts.master')

@section('head')
{{ HTML::script('/js/fintrack.input.js') }}
<title>Finance Tracker - Delete Income</title>
@stop

@section('content')
<div id="heading">Finance Tracker - Delete Income</div><p/>

{{ Form::open(['route'=>['income.do.delete', $income->income_id]]) }}
    <table cellspacing=5 cellpading=5>
        <tr>
            <td>Date:</td>
            <td><input type="text" class="date-pick" name="create_date" value="{{{ $income->create_date }}}" size="12"/>
            </td>
        </tr>
        <tr>
            <td>Amount:</td>
            <td><input type="text" name="amount" class="focus" value="{{{ number_format($income->amount, 2, '.', '') }}}" size="12"/></td>
        </tr>
        <tr>
            <td>Description:</td>
            <td><textarea name="descr" cols="30" rows="5">{{{ $income->descr }}}</textarea></td>
        </tr>
    </table>
    <p>
    <table>
        <tr>
            <td>{{ Form::submit('I\'m sure I want to delete the item') }}</td>
            <td>{{ Form::button('Back to list') }}</td>
        </tr>
    </table>
    <div class="error">{{{ $error or '' }}}</div>
    <div>{{{ $message or '' }}}</div>
{{ Form::close() }}
@stop
