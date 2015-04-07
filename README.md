## Fintrack - Personal Financial Tracking Software

Powered by [Laravel 4 Framework](http://github.com/laravel/framework)


### License

The MIT License (MIT)

Copyright © 2014 Arvid Juskaitis <arvydas.juskaitis@gmail.com>


### Some of screenshots

Click to view.

[![List expenses](https://raw.githubusercontent.com/arvjus/fintrack/master/screenshots/list-expenses-thumb.png)](https://raw.githubusercontent.com/arvjus/fintrack/master/screenshots/list-expenses.png)

[![Show summary](https://raw.githubusercontent.com/arvjus/fintrack/master/screenshots/summary-thumb.png)](https://raw.githubusercontent.com/arvjus/fintrack/master/screenshots/summary.png)

[![Add new income](https://raw.githubusercontent.com/arvjus/fintrack/master/screenshots/add-income-thumb.png)](https://raw.githubusercontent.com/arvjus/fintrack/master/screenshots/add-income.png)

[![Add new expense](https://raw.githubusercontent.com/arvjus/fintrack/master/screenshots/add-expense-thumb.png)](https://raw.githubusercontent.com/arvjus/fintrack/master/screenshots/add-expense.png)


### Prerequisites

* PHP >= 5.4
* [Composer](https://getcomposer.org)
* MySQL 5.x
* Apache 2 Web Server (optional)


### Installation

Clone repository, install components
```bash
$ git clone https://github.com/arvjus/fintrack-php.git
$ cd fintrack
$ composer.phar install
```

Install database, configure in app/configure/database.php

Migrate database, seed test data
```bash
$ php artisan migrate:make
$ php artisan migrate:refresh
$ php db:seed
```

Optionally, run unitests
```bash
$ phpunit
```


Start built-in web server
```bash
$ php artisan serve
```

Go to [http://localhost:8000](http://localhost:8000) and login with admin/admin123


### Changelog

2014-05-17 Release Version 1.0


