<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, height=device-height, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
    <link rel="icon" href="/favicon.ico">
    {{ HTML::style('/css/jquery.datePicker.css') }}
    {{ HTML::style('/css/fintrack.css') }}
    {{ HTML::script('/js/jquery-1.4.2.min.js') }}
    {{ HTML::script('/js/date.js') }}
    {{ HTML::script('/js/jquery.datePicker.js') }}
    {{ HTML::script('/js/fintrack.js') }}
    @yield('head')
</head>

<body>
<table>
    <tr>
        <td valign="top">
            <div id="menu" class="menu">
                <ul>
                    <li class="sub"><img src="/images/fintrack.png"/></li>
                    <li class="sub"><div class="heading">Incomes</div></li>
                    <li class="sub">
                        <ul>
                            <li class="item">{{HTML::linkRoute('income.new', 'Add new income')}}</li>
                            <li class="item">{{HTML::linkRoute('income.recent', 'Recently added')}}</li>
                            <li class="item">{{HTML::linkRoute('income.list', 'List income')}}</li>
                        </ul>
                    </li>
                    <li class="sub"><div class="heading">Expenses</div></li>
                    <li class="sub">
                        <ul>
                            <li class="item">{{HTML::linkRoute('expense.new', 'Add new expense')}}</li>
                            <li class="item">{{HTML::linkRoute('expense.recent', 'Recently added')}}</li>
                            <li class="item">{{HTML::linkRoute('expense.list', 'List expenses')}}</li>
                        </ul>
                    </li>
                    <li class="sub"><div class="heading">Summary</div></li>
                    <li class="sub">
                        <ul>
                            <li class="item">{{HTML::linkRoute('summary', 'Summary records')}}</li>
                        </ul>
                    </li>

                    <li class="sub"><div class="heading">Session</div></li>
                    <li class="sub">
                        <ul>
                            @if(Auth::check())
                                <li class="item">{{HTML::linkRoute('logout', Auth::user()->username . ' logout')}}</li>
                            @else
                                <li class="item">{{HTML::linkRoute('login', 'Login')}}</li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </td>
        <td colspan="10"/>
        <td valign="top">
            <div class="body">
                @yield('content')
            </div>
        </td>
    </tr>
</table>
</body>
</html>
