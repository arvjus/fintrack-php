@extends('layouts.master')

@section('head')
<script language="JavaScript" src="/js/fintrack.input.js"></script>
<title>Finance Tracker - {{{ isset($income->income_id) ? 'Add' : 'Edit' }}} Income</title>
@stop

@section('content')
<div id="heading">{{{ isset($income->income_id) ? 'Add' : 'Edit' }}} Income</div><p/>

<form method="post" action="/income@save">
    <input type="hidden" name="preinit_id" value="{{{ $preinit_id or '' }}}"/>
    <table cellspacing=5 cellpading=5>
        <tr>
            <td>Date:</td>
            <td><input type="text" class="date-pick" name="create_date" value="{{{ $income->create_date }}}" size="12"/></td>
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
            <td><input type="submit" value="Save"/></td>
            <td><input type="reset" value="Reset"/></td>
            @if (isset($income->income_id))
                <td><input type="submit" class="back" value="Back to list"/></td>
            @endif
        </tr>
    </table>
    <div class="error">{{{ $error or '' }}}</div>
    <div>{{{ $message or '' }}}</div>
</form>
<br/>
<div class="navigation"><a href="/home">Home</a></div>
@stop
