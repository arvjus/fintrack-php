@extends('layouts.master')

@section('head')
<title>Finance Tracker</title>
@stop

@section('content')
<div id="heading">Welcome to Fintrack!</div><p/>

{{ Form::open(array('url' => '/', 'action' => 'HomeController@save')) }}
<input type="submit" value="Save"/>
<div class="error">{{{ $error or '' }}}</div>
<div>{{{ $message or '' }}}</div>
{{ Form::close() }}

@stop

