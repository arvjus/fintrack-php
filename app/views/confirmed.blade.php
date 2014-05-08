@extends('layouts.master')

@section('head')
<title>Finance Tracker</title>
@stop

@section('content')
<div class="error">{{{ $error or '' }}}</div>
<div>{{{ $message or '' }}}</div>
@stop

