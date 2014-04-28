@extends('layouts.master')

@section('title')
Fintrack - Recently added records
@stop

@section('content')
<table cellspacing=5 cellpading=5>
    <tr>
        <td>Date:</td>
        <td><input type="text" class="date-pick" name="createDate" value="{{ $income->create_date }}" size="12"/></td>
    </tr>
    <tr>
        <td>Amount:</td>
        <td><input type="text" name="amount" class="focus" value="{{ $income->amount }}" size="12"/></td>
    </tr>
    <tr>
        <td>Description:</td>
        <td><textarea name="descr" cols="30" rows="5">{{ $income->descr }}</textarea></td>
    </tr>
</table><p>

{{ $income }}
@stop


