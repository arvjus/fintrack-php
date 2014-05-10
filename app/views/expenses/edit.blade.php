@extends('layouts.master')

@section('head')
{{ HTML::script('/js/fintrack.input.js') }}
<title>Finance Tracker - Edit Expense</title>
@stop

@section('content')
<div id="heading">Edit Expense</div><p/>

{{ Form::open(['route'=>['expense.update', $expense->expense_id]]) }}
    <table cellspacing=5 cellpading=5>
        <tr>
            <td>Date:</td>
            <td><input type="text" class="date-pick" name="create_date" value="{{{ $expense->create_date }}}" size="12"/></td>
        </tr>
        <tr>
            <td>Category:</td>
            <td>
                <table>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ Form::radio('category_id', $category->category_id, $category->category_id == $expense->category_id, ['title' => $category->descr]) }} {{{ $category->name }}}</td>
                        </tr>
                    @endforeach
                </table>
            </td>
        </tr>
        <tr>
            <td>Amount:</td>
            <td><input type="text" name="amount" class="focus" value="{{{ number_format($expense->amount, 2, '.', '') }}}" size="12"/></td>
        </tr>
        <tr>
            <td>Description:</td>
            <td><textarea name="descr" cols="30" rows="5">{{{ $expense->descr }}}</textarea></td>
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

