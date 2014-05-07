@extends('layouts.master')

@section('head')
{{ HTML::script('/js/fintrack.input.js') }}
<title>Finance Tracker - Delete Expense</title>
@stop

@section('content')
<div id="heading">Delete Expense</div><p/>

<form method="post" action="/expense@save">
    <table cellspacing=5 cellpading=5>
        <tr>
            <td>Date:</td>
            <td><input type="text" class="date-pick" name="create_date" value="{{{ $expense->create_date }}}" size="12"/>
            </td>
        </tr>
        <tr>
            <td>Category:</td>
            <td>{{{ $expense->category->name }}}</td>
        </tr>
        <tr>
            <td>Amount:</td>
            <td><input type="text" name="amount" class="focus" value="{{{ number_format($expense->amount, 2, '.', '') }}}" size="12"/></td>
        </tr>
        <tr>
            <td>Description:</td>
            <td><textarea name="descr" cols="30" rows="5">{{{ $expense->descr }}}</textarea></td>
        </tr>
    </table>
    <p>
    <table>
        <tr>
            <td><input type="submit" value="I'm sure I want to delete the item"/></td>
        </tr>
    </table>
    <div class="error">{{{ $error or '' }}}</div>
    <div>{{{ $message or '' }}}</div>
</form>
@stop