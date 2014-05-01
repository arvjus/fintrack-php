<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, height=device-height, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />

    <link href="/css/jquery.datePicker.css" rel="stylesheet" type="text/css"/>
    <link href="/css/fintrack.css" rel="stylesheet" type="text/css"/>
    <link rel="icon" href="/favicon.ico">
    <script language="JavaScript" src="/js/jquery-1.4.2.min.js"></script>
    <script language="JavaScript" src="/js/date.js"></script>
    <script language="JavaScript" src="/js/jquery.datePicker.js"></script>
    <script language="JavaScript" src="/js/fintrack.js"></script>
    @yield('head')
</head>

<body>
<table>
    <tr>
        <td valign="top">
            <div id="menu" class="menu">
                <ul>
                    <li class="sub"><img src="/images/fintrack.png"/></li>
                    <li class="sub"><div class="heading">Finances</div></li>

                        <li class="sub">
                            <ul>
                                <li class="item"><a href="/income">Add Income</a></li>
                                <li class="item"><a href="/expense">Add Expense</a></li>
                                <li class="item"><a href="/recent">Recently Added</a></li>
                                <li class="item"><a href="/list">List</a></li>
                                <li class="item"><a href="/summary">Summary</a></li>
                            </ul>
                        </li>
                        <li class="sub"><div class="heading">Session</div></li>
                        <li class="sub">
                            <ul>
                                <li class="item"><a href="/logout">Logout</a></li>
                            </ul>
                        </li>

                        <li class="sub">
                            <ul>
                                <li class="item"><a href="/login">Login</a></li>
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
