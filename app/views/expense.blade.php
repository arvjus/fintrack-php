@extends('layouts.master')

@section('head')
<script language="JavaScript" src="/js/fintrack.input.js"></script>
<title>Finance Tracker - {{{ isset($expense->expense_id) ? 'Add' : 'Edit' }}} Expense</title>
@stop

@section('content')
<div id="heading">{{{ isset($expense->expense_id) ? 'Add' : 'Edit' }}} Expense</div><p/>

<form method="post" action="/expense@save">
    <input type="hidden" name="preinitId" value="{{{ $preinitId or '' }}}"/>
    <table cellspacing=5 cellpading=5>
        <tr>
            <td>Date:</td>
            <td><input type="text" class="date-pick" name="createDate" value="{{{ $expense->create_date }}}" size="12"/></td>
        </tr>

        <tr>
            <td>Category:</td>
            <td>
                <table>
                    @foreach($categories as $category)
                        <tr>
                            <td><input type="radio" name="categoryId" group="categoryId" value="{{{ $category->category_id }}}" title="{{{ $category->descr }}}"
                                @if ($category->category_id == $expense->category_id)
                                    checked="true"
                                @endif
                                >{{{ $category->name }}}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </td>
        </tr>

        <tr>
            <td>Amount:</td>
            <td><input type="text" name="amount" class="focus" value="{{{ $expense->amount }}}" size="12"/></td>
        </tr>
        <tr>
            <td>Description:</td>
            <td><textarea name="descr" cols="30" rows="5">{{{ $expense->descr }}}</textarea></td>
        </tr>
    </table>
    <p>
    <table>
        <tr>
            <td><input type="submit" value="Save"/></td>
            <td><input type="reset" value="Reset"/></td>
            @if (isset($expense->expense_id))
                <td><input type="submit" class="back" value="Back to list"/></td>
            @endif
        </tr>
    </table>
    <div class="error">{{{ $error or '' }}}</div>
    <div>{{{ $message or '' }}}</div>
</form>
<br/>
<div class="navigation"><a href="/home">Home</a></div>
@stop

