@extends('layouts.master')

@section('head')
<script language="JavaScript" src="/js/fintrack.input.js"></script>
<title>Finance Tracker - Delete Expense</title>
@stop

@section('content')
<div id="heading">Delete Expense</div><p/>

<form method="post" action="/expense@save">
    <input type="hidden" name="preinit_id" value="{{{ $preinit_id or '' }}}"/>

    @if (isset($expense->expense_id))
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
    @endif
    <p>
    <table>
        <tr>
            @if (isset($expense->expense_id))
                <td><input type="submit" value="I'm sure I want to delete the item"/></td>
                <td><input type="reset" value="Reset"/></td>
            @endif
            <td><input type="submit" class="back" value="Back to list"/></td>
        </tr>
    </table>
    <div class="error">{{{ $error or '' }}}</div>
    <div>{{{ $message or '' }}}</div>
</form>
<br/>
<div class="navigation"><a href="/home">Home</a></div>
@stop
