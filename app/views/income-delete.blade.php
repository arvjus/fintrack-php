@extends('layouts.master')

@section('head')
<script language="JavaScript" src="/js/fintrack.input.js"></script>
<title>Finance Tracker - Delete Income</title>
@stop

@section('content')
<div id="heading">Finance Tracker - Delete Income</div><p/>

<form method="post" action="/income@doDelete">
    <input type="hidden" name="preinit_id" value="{{{ $preinit_id or '' }}}"/>
    @if (isset($income->income_id))
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
    @endif
    <p>
    <table>
        <tr>
            @if (isset($income->income_id))
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
