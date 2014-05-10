@extends('layouts.master')

@section('head')
{{ HTML::script('/js/fintrack.input.js') }}
<title>Finance Tracker - New Income</title>
@stop

@section('content')
<div id="heading">New Income</div><p/>
{{ Form::open(['route'=>['income.save']]) }}
    <table cellspacing=5 cellpading=5>
        <tr>
            <td>Date:</td>
            <td><input type="text" class="date-pick" name="create_date" value="{{{ $create_date }}}" size="12"/></td>
        </tr>
        <tr>
            <td>Amount:</td>
            <td><input type="text" name="amount" class="focus" value="" size="12"/></td>
        </tr>
        <tr>
            <td>Description:</td>
            <td><textarea name="descr" cols="30" rows="5"></textarea></td>
        </tr>
    </table>
    <p>
    <table>
        <tr>
            <td>{{ Form::submit('Save') }}</td>
            <td>{{ Form::reset('Reset') }}</td>
        </tr>
    </table>
    @if($errors->has())
        @foreach($errors->all() as $error)
            <div class="error">{{ $error }}</div>
        @endforeach
    @endif
{{ Form::close() }}
@stop
