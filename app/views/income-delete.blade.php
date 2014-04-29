@extends('layouts.master')

@section('title')
Finance Tracker - Delete Income
@stop

@section('content')
<div id="heading">Finance Tracker - Delete Income</div><p/>

<form method="post" action="/income@doDelete">
    <input type="hidden" name="preinitId" value="{{{ $preinitId or '' }}}"/>
    @if (isset($income->income_id))
    <table cellspacing=5 cellpading=5>
        <tr>
            <td>Date:</td>
            <td><input type="text" class="date-pick" name="createDate" value="{{{ $income->create_date }}}" size="12"/>
            </td>
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
