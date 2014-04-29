@extends('layouts.master')

@section('title')
Finance Tracker - {{{ isset($income->income_id) ? 'Add' : 'Edit' }}} Income
@stop

@section('content')
<div id="heading">{{{ isset($income->income_id) ? 'Add' : 'Edit' }}} Income</div><p/>

<form method="post" action="/income@save">
    <input type="hidden" name="preinitId" value="{{{ $preinitId or '' }}}"/>
    <table cellspacing=5 cellpading=5>
        <tr>
            <td>Date:</td>
            <td><input type="text" class="date-pick" name="createDate" value="{{{ $income->create_date }}}" size="12"/></td>
        </tr>
        <tr>
            <td>Amount:</td>
            <td><input type="text" name="amount" class="focus" value="{{{ $income->amount }}}" size="12"/></td>
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
