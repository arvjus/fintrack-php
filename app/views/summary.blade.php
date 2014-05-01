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


{{--
<tmpl:composition template="/WEB-INF/jsp/include/template.jsp">
    <tmpl:define name="header">
        <link href="<c:url value="/css/jquery.jqplot.css"/>" rel="stylesheet" type="text/css"/>
        <script language="JavaScript" src="<c:url value="/js/jquery.jqplot.min.js"/>"></script>
        <script language="JavaScript" src="<c:url value="/js/jqplot.categoryAxisRenderer.min.js"/>"></script>
        <script language="JavaScript" src="<c:url value="/js/jqplot.barRenderer.min.js"/>"></script>
        <script language="JavaScript" src="<c:url value="/js/fintrack.summary.js"/>"></script>
    </tmpl:define>
    <tmpl:define name="title">Fintrack - Summary</tmpl:define>
    <tmpl:define name="body">
        <div id="heading">Summary</div><p/>

        <form method="post">
            <table cellspacing=5 cellpading=5>
                <tr>
                    <td>Date from:</td>
                    <td><input type="text" class="date-pick" id="dateFrom" name="dateFrom" value="<fmt:formatDate value="${dateFrom}" pattern="yyyy-MM-dd"/>" size="12"/></td>
                </tr>
                <tr>
                    <td>Date to:</td>
                    <td><input type="text" class="date-pick" id="dateTo" name="dateTo" value="<fmt:formatDate value="${dateTo}" pattern="yyyy-MM-dd"/>" size="12"/></td>
                </tr>
                <tr>
                    <td>Categories: </td>
                    <td><table>
                            <tr><td><input type="checkbox" name="incomeSelected" value="true" <c:if test="${incomeSelected}">checked="true"</c:if>>Income</td></tr>
                            <c:forEach var="category" items="${categories}">
                                <tr><td><input type="checkbox" name="categoryIds" value="${category.categoryId}" title="${category.descr}" <c:if test="${categoryIds[category.categoryId]}">checked="true"</c:if>>${category.name}</td></tr>
                            </c:forEach>
                        </table></td>
                </tr>
                <tr>
                    <td>Report: </td>
                    <td><table>
                            <tr><td><input type="radio" name="grouppedBy" class="plot-chart" group="grouppedBy" value="categories" <c:if test="${grouppedBy == 'categories'}">checked="true"</c:if>>Group by categories</td></tr>
                            <tr><td><input type="radio" name="grouppedBy" class="plot-chart" group="grouppedBy" value="months" <c:if test="${grouppedBy == 'months'}">checked="true"</c:if>>Group by months</td></tr>
                            <td><input type="checkbox" name="plotChart" class="plot-chart" value="true" <c:if test="${plotChart}">checked="true"</c:if>>Plot chart</td>
                        </table></td>
                </tr>
            </table>
            <p>
            <table><tr>
                    <td><input type="submit" value="Refresh"/></td>
                    <td><input type="reset" value="Reset"/></td>
                </tr></table>
        </form>
        <hr/>
        <br/>
        <c:if test="${plotChart}">
            <div class="summary-chart jqPlot" id="summary-total-chart" style="height:0px; width:800px;"></div>
            <br/>
        </c:if>
        <table class="data">
            <tbody>
            <tr><th class="inc_h">Incomes</th><th class="inc_h">Count</th><th class="inc_h">Amount</th><th class="exp_h">Expenses</th><th class="exp_h">Count</th><th class="exp_h">Amount</th></tr>
            <tr class="total_values"><td class="inc_l">Total</td><td class="inc_r">${incomesTotal.count}</td><td class="inc_r">${incomesTotal.amount}</td><td class="exp_l">Total</td><td class="exp_r">${expensesTotal.count}</td><td class="exp_r">${expensesTotal.amount}</td></tr>
            </tbody>
        </table>
        <br/>
        <c:if test="${grouppedBy == 'categories'}">
            <c:if test="${plotChart}">
                <div class="summary-chart jqPlot" id="summary-categories-chart" style="height:0px; width:800px;"></div>
                <br/>
            </c:if>
            <br/>
            <table class="data">
                <tbody>
                <tr><th class="exp_h">Category</th><th class="exp_h">Count</th><th class="exp_h">Amount</th></tr>
                <c:forEach var="expense" items="${expenses}">
                    <tr class="category_values"><td class="exp_l">${expense.group}</td><td class="exp_l">${expense.count}</td><td class="exp_r">${expense.amount}</td></tr>
                </c:forEach>
                </tbody>
            </table>
        </c:if>
        <c:if test="${grouppedBy == 'months'}">
            <c:if test="${plotChart}">
                <div class="summary-chart jqPlot" id="summary-months-chart" style="height:0px; width:800px;"></div>
                <br/>
            </c:if>
            <table class="data">
                <tbody>
                <tr><th class="inc_h">Incomes</th><th class="inc_h">Count</th><th class="inc_h">Amount</th><th class="exp_h">Expences</th><th class="exp_h">Count</th><th class="exp_h">Amount</th></tr>
                <c:forEach var="item" items="${summary}">
                    <tr class="month_values"><td class="inc_l">${item.yyyymm}</td><td class="inc_l">${item.income.count}</td><td class="inc_r">${item.income.amount}</td><td class="exp_l">${item.yyyymm}</td><td class="exp_l">${item.expense.count}</td><td class="exp_r">${item.expense.amount}</td></tr>
                </c:forEach>
                </tbody>
            </table>
        </c:if>
        <br/>
        <div class="navigation"><a href="<c:url value="/user/home.page"/>">Home</a></div>
    </tmpl:define>
</tmpl:composition>
--}}