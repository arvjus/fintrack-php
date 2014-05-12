<?php

use Fintrack\Storage\Services\IncomeService;
use Fintrack\Storage\Services\UserService;

class IncomeController extends BaseController
{
    public function __construct(IncomeService $incomeService, UserService $userService) {
        $this->incomeService = $incomeService;
        $this->userService = $userService;
    }

    /* get functions */
    public function recentIncome() {
        $incomes = $this->incomeService->paginate(ITEMS_PER_PAGE);
        $this->layout->main = View::make('incomes.recent')->with(compact('incomes'));
    }

    public function listIncome() {
        $date_from = Input::get('date_from', date('Y-m-01', time()));
        $date_to = Input::get('date_to', date('Y-m-d', time()));
        $user_id = Input::get('user_id', 0);

        $users = ['0' => '--- select ---'];
        $allusers = $this->userService->allAsArray();
        foreach ($allusers as $id => $name) {
            $users[$id] = $name;
        }

        $incomes = $this->incomeService->plain(ITEMS_PER_PAGE, $date_from, $date_to, $user_id);
        $incomes->appends(compact('date_from', 'date_to', 'user_id'));
        $this->layout->main = View::make('incomes.list')->with(compact('date_from', 'date_to', 'user_id', 'users', 'incomes'));
    }

    public function newIncome() {
        $create_date = date('Y-m-d', time());
        $this->layout->main = View::make('incomes.new')->with(compact('create_date'));;
    }

    public function editIncome(Income $income) {
        // If called from another page, save requested URL in order to redirect afterwards
        if (strpos(URL::previous(), 'edit') === false) {
            Session::put('previous_url', URL::previous());
        }

        $users = User::lists('username', 'user_id');
        $this->layout->main = View::make('incomes.edit')->with(compact('users', 'income'));
    }

    public function saveIncome() {
        $data = [
            'create_date' => Input::get('create_date'),
            'amount' => Input::get('amount'),
            'descr' => Input::get('descr'),
            'user_id' => $this->userService->findByName(Auth::user()->username)->user_id
        ];
        $valid = Validator::make($data, Income::$rules);
        if ($valid->passes()) {
            $income = new Income($data);
            $income->save();
            return Redirect::route('income.recent')->with('success', Lang::get('messages.status.added.income'));
        } else {
            return Redirect::back()->withErrors($valid)->withInput();
        }
    }

    public function updateIncome(Income $income) {
        $data = [
            'create_date' => Input::get('create_date'),
            'amount' => Input::get('amount'),
            'descr' => Input::get('descr'),
            'user_id' => Input::get('user_id')
        ];
        $valid = Validator::make($data, Income::$rules);
        if ($valid->passes()) {
            $income->create_date = $data['create_date'];
            $income->amount = $data['amount'];
            $income->descr = $data['descr'];
            $income->user_id = $data['user_id'];
            $income->save();
            return Redirect::route('income.edit', array('income' => $income->income_id))->with('success', Lang::get('messages.status.updated.income'))->withInput();
        } else {
            return Redirect::back()->withErrors($valid)->withInput();
        }
    }

    public function deleteIncome(Income $income) {
        if ($income->delete()) {
            return Redirect::back()->with('success', Lang::get('messages.status.deleted.income'));
        } else {
            return Redirect::back()->withErrors([Lang::get('messages.status.no.deleted.record')]);
        }
    }
}
