@extends('layouts.master')

@section('head')
<title>Finance Tracker</title>
@stop

@section('content')
<div id="heading">Fintrack login</div><p/>

{{ Form::open(['route'=>['login'], 'class' => 'form-vertical']) }}
    <table>
        <tr><td>User name:</td><td>{{ Form::text('username', Input::old('username')) }}</td></tr>
        <tr><td>Password:</td><td>{{ Form::password('password') }}</td></tr>
    </table>
    <div class="controls">
        {{ Form::submit('Login', ['class' => 'btn btn-small btn-primary']) }}
    </div>

<div class="control-group">
    <div class="controls">
    </div>
</div>
<div class="control-group">
    <div class="controls">
    </div>
</div>

{{ Form::close() }}
<br>
@if (Session::has('error'))
    <div class="error">{{ Session::get('error') }}</div>
@endif
@stop
