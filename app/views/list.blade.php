@extends('layouts.master')

@section('title')
Finance Tracker - List
@stop

@section('content')
<div id="heading">Filter Records For Listing/Editing/Deletion</div><p/>

<form method="post" action="/list@refresh">
    <table cellspacing=5 cellpading=5>
        <tr>
            <td>Date from:</td>
            <td><input type="text" class="date-pick" name="dateFrom" value="{{{ $dateFrom or ''}}}" size="12"/></td>
        </tr>
        <tr>
            <td>Date to:</td>
            <td><input type="text" class="date-pick" name="dateTo" value="{{{ $dateTo or ''}}}" size="12"/></td>
        </tr>

        <tr>
            <td>Categories:</td>
            <td>
                <table>
                    <tr>
                        <td><input type="checkbox" name="incomeSelected" value="true">Income</td>
                    </tr>
                    @foreach($categories as $category)
                    <tr>
                        <td><input type="checkbox" name="categoryId" group="categoryId"
                                   value="{{{ $category->category_id }}}" title="{{{ $category->descr }}}"
                                >{{{ $category->name }}}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </td>
        </tr>
        <tr>
            <td>User:</td>
            <td><input type="text" name="userId" value="{{{ $userId or ''}}}" size="12"/></td>
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
<br>
<b>Incomes</b>
<table class="data">
    <tr>
        <th class="inc_h">Date</th>
        <th class="inc_h">Amount</th>
        <th class="inc_h">Description</th>
        <th class="inc_h">User</th>
        <th class="inc_h">Edit</th>
        <th class="inc_h">Delete</th>
    </tr>
    @foreach ($incomes as $income)
    <tr>
        <td class="inc_l">{{{ $income->create_date }}}</td>
        <td class="inc_r">{{{ number_format($income->amount, 2, '.', '') }}}</td>
        <td class="inc_l">{{{ $income->descr }}}</td>
        <td class="inc_l">{{{ $income->user->name }}}</td>
        <td class="inc_l"><a href="/income@edit?preinitId={{ $income->income_id }}">Edit</a></td>
        <td class="inc_l"><a href="/income@delete?preinitId={{ $income->income_id }}">Delete</a></td>
    </tr>
    @endforeach
</table>
<br/>
<b>Expences</b>
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
        <td class="exp_l"><a href="/income@edit?preinitId={{ $expense->expense_id }}">Edit</a></td>
        <td class="exp_l"><a href="/income@delete?preinitId={{ $expense->expense_id }}">Delete</a></td>
    </tr>
    @endforeach
</table>
<br/>
<div class="navigation"><a href="/home">Home</a></div>

@stop
