@extends('layouts.master')

@section('head')
{{ HTML::script('/js/fintrack.input.js') }}
<title>Finance Tracker - Edit Income</title>
@stop

@section('content')
<div id="heading">Edit Income</div><p/>

{{ Form::open(['route'=>['income.update', $income->income_id]]) }}
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
        <tr>
            <td>User:</td>
            <td>{{ Form::select('user_id', $users, $income->user_id) }}</td>
        </tr>
    </table>
    <p>
    <table>
        <tr>
            <td>{{ Form::submit('Update') }}</td>
            <td>{{ Form::reset('Reset') }}</td>
            <td><a href="{{ Session::get('previous_url') }}">{{ Form::button('Back to list') }}</a></td>
        </tr>
    </table>
    <br>
    @if($errors->has())
        @foreach($errors->all() as $error)
            <div class="error">{{ $error }}</div>
        @endforeach
    @endif
    @if(Session::has('success'))
        <div class="success">{{Session::get('success')}}</div>
    @endif
{{ Form::close() }}
@stop
