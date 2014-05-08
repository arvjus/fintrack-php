@extends('layouts.master')

@section('head')
{{ HTML::script('/js/fintrack.input.js') }}
<title>Finance Tracker - New Expense</title>
@stop

@section('content')
<div id="heading">New Expense</div><p/>

{{ Form::open(['route'=>['expense.do.save']]) }}
    <table cellspacing=5 cellpading=5>
        <tr>
            <td>Date:</td>
            <td><input type="text" class="date-pick" name="create_date" value="{{{ date('Y-m-d', time()) }}}" size="12"/></td>
        </tr>
        <tr>
            <td>Category:</td>
            <td>
                <table>
                    @foreach($categories as $category)
                        <tr>
                            <td><input type="radio" name="category_id" group="category_id" value="{{{ $category->category_id }}}" title="{{{ $category->descr }}}">{{{ $category->name }}}</td>
                        </tr>
                    @endforeach
                </table>
            </td>
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
            <td>{{ Form::button('Back to list') }}</td>
        </tr>
    </table>

    <div class="error">{{{ $error or '' }}}</div>
    <div>{{{ $message or '' }}}</div>
{{ Form::close() }}
@stop



