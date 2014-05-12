<?php

use Fintrack\Storage\Services\ExpenseService;
use Fintrack\Storage\Services\CategoryService;
use Fintrack\Storage\Services\UserService;


class ExpenseController extends BaseController
{
    public function __construct(ExpenseService $expenseService, CategoryService $categoryService, UserService $userService) {
        $this->expenseService = $expenseService;
        $this->categoryService = $categoryService;
        $this->userService = $userService;
    }

    /* get functions */
    public function recentExpense() {
        $expenses = $this->expenseService->paginate(ITEMS_PER_PAGE);
        $this->layout->main = View::make('expenses.recent')->with(compact('expenses'));
    }

    public function listExpense() {
        $date_from = Input::get('date_from', date('Y-m-01', time()));
        $date_to = Input::get('date_to', date('Y-m-d', time()));
        $category_ids = Input::get('category_ids', array());
        $user_id = Input::get('user_id', 0);
        $categories = $this->categoryService->all();

        $users = ['0' => '--- select ---'];
        $allusers = $this->userService->allAsArray();
        foreach ($allusers as $id => $name) {
            $users[$id] = $name;
        }

        $expenses = $this->expenseService->plain(ITEMS_PER_PAGE, $date_from, $date_to, $category_ids, $user_id);
        $expenses->appends(compact('date_from', 'date_to', 'category_ids', 'user_id'));
        $this->layout->main = View::make('expenses.list')->with(compact('date_from', 'date_to', 'category_ids', 'user_id', 'categories', 'users', 'expenses'));
    }

    public function newExpense() {
        $create_date = date('Y-m-d', time());
        $categories = $this->categoryService->all();
        $this->layout->main = View::make('expenses.new')->with(compact('create_date', 'categories'));
    }

    public function editExpense(Expense $expense) {
        // If called from another page, save requested URL in order to redirect afterwards
        if (strpos(URL::previous(), 'edit') === false) {
            Session::put('previous_url', URL::previous());
        }

        $categories = $this->categoryService->all();
        $users = User::lists('username', 'user_id');
        $this->layout->main = View::make('expenses.edit')->with(compact('expense', 'users', 'categories'));
    }

    public function saveExpense() {
        $data = [
            'create_date' => Input::get('create_date'),
            'category_id' => Input::get('category_id'),
            'amount' => Input::get('amount'),
            'descr' => Input::get('descr'),
            'user_id' => $this->userService->findByName(Auth::user()->username)->user_id
        ];

        $valid = Validator::make($data, Expense::$rules);
        if ($valid->passes()) {
            $expense = new Expense($data);
            $expense->save();
            return Redirect::route('expense.recent')->with('success', Lang::get('messages.status.added.expense'));
        } else {
            return Redirect::back()->withErrors($valid)->withInput();
        }
    }

    public function updateExpense(Expense $expense) {
        $data = [
            'create_date' => Input::get('create_date'),
            'category_id' => Input::get('category_id'),
            'amount' => Input::get('amount'),
            'descr' => Input::get('descr'),
            'user_id' => Input::get('user_id')
        ];
        $valid = Validator::make($data, Expense::$rules);
        if ($valid->passes()) {
            $expense->create_date = $data['create_date'];
            $expense->category_id = $data['category_id'];
            $expense->amount = $data['amount'];
            $expense->descr = $data['descr'];
            $expense->user_id = $data['user_id'];
            $expense->save();
            return Redirect::route('expense.edit', array('income' => $expense->expense_id))->with('success', Lang::get('messages.status.updated.expense', ['id' => $expense->expense_id]))->withInput();
        } else {
            return Redirect::back()->withErrors($valid)->withInput();
        }
    }

    public function deleteExpense(Expense $expense) {
        if ($expense->delete()) {
            return Redirect::back()->with('success', Lang::get('messages.status.deleted.expense', ['id' => $expense->expense_id]));
        } else {
            return Redirect::back()->withErrors([Lang::get('messages.status.no.deleted.record')]);
        }
    }
}