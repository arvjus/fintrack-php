@extends('layouts.master')

@section('head')
{{ HTML::script('/js/fintrack.input.js') }}
<title>Finance Tracker - List Expenses</title>
@stop

@section('content')
<div id="heading">List Expenses</div><p/>

<form method="post" action="/list@refresh">
    <table cellspacing=5 cellpading=5>
        <tr>
            <td>Date from:</td>
            <td><input type="text" class="date-pick" name="date_from" value="{{{ $date_from or ''}}}" size="12"/></td>
        </tr>
        <tr>
            <td>Date to:</td>
            <td><input type="text" class="date-pick" name="date_to" value="{{{ $date_to or ''}}}" size="12"/></td>
        </tr>

        <tr>
            <td>Categories:</td>
            <td>
                <table>
                    @foreach($categories as $category)
                        <tr>
                            <td><input type="checkbox" name="category_id" group="category_id"
                                       value="{{{ $category->category_id }}}" title="{{{ $category->descr }}}">
                                    {{{ $category->name }}}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </td>
        </tr>
        <tr>
            <td>User:</td>
            <td><input type="text" name="user_id" value="{{{ $user_id or ''}}}" size="12"/></td>
        </tr>
    </table>
    <p>
    <table>
        <tr>
            <td><input type="submit" value="Refresh"/></td>
            <td><input type="reset" value="Reset"/></td>
        </tr>
    </table>
    <div class="error">{{{ $error or '' }}}</div>
    <div>{{{ $message or '' }}}</div>
</form>
{{ $expenses->links('pagination::simple') }}
<table class="data">
    <tr>
        <th class="exp_h">Date</th>
        <th class="exp_h">Amount</th>
        <th class="exp_h">Category</th>
        <th class="exp_h">Description</th>
        <th class="exp_h">User</th>
        <th class="exp_h">Edit</th>
        <th class="exp_h">Delete</th>
    </tr>
    @foreach ($expenses as $expense)
        <tr>
            <td class="exp_l">{{{ $expense->create_date }}}</td>
            <td class="exp_r">{{{ number_format($expense->amount, 2, '.', '') }}}</td>
            <td class="exp_l">{{{ $expense->category->name_short }}}</td>
            <td class="exp_l">{{{ $expense->descr }}}</td>
            <td class="exp_l">{{{ $expense->user->name }}}</td>
            <td class="exp_l">{{ HTML::linkRoute('expense.edit', 'Edit', $expense->expense_id )}}</td>
            <td class="exp_l">{{ HTML::linkRoute('expense.delete', 'Delete', $expense->expense_id )}}</td>
        </tr>
    @endforeach
</table>
@stop
