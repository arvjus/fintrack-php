@extends('layouts.master')

@section('head')
<title>Finance Tracker</title>
@stop

@section('content')
@if(Auth::check())
<div id="heading">Welcome to Fintrack, {{ Auth::user()->username }}!</div><p/>
@else
<div id="heading">Welcome to Fintrack!</div><p/>
Please, login {{HTML::linkRoute('login', 'here')}}
@endif
@stop

