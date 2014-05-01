@extends('layouts.master')

@section('head')
<title>Finance Tracker</title>
@stop

@section('content')
<div id="heading">Fintrack login</div><p/>

<form action="j_security_check">
    <table>
        <tr><td>User name:</td><td><input type="text" name="j_username"/></td></tr>
        <tr><td>Password:</td><td><input type="password" name="j_password"/></td></tr>
        <tr><td></td><td><input type="submit" value="Login"/></td></tr>
    </table>
</form>
@stop
