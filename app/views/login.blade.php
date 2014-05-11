@extends('layouts.master')

@section('head')
<title>Finance Tracker</title>
@stop

@section('content')
<div id="heading">Fintrack login</div><p/>

{{ Form::open(['route'=>['login']]) }}
    <table>
        <tr><td>User name:</td><td>{{ Form::text('username', Input::old('username')) }}</td></tr>
        <tr><td>Password:</td><td>{{ Form::password('password') }}</td></tr>
        <tr><td></td><td>{{ Form::submit('Login') }}</td></tr>
    </table>
{{ Form::close() }}
<br>
@if (Session::has('error'))
    <div class="error">{{ Session::get('error') }}</div>
@endif
@stop
