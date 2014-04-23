<?php

class ExpenseTest extends TestCase {

    public function testCreateIncomplete() {
        $expense = new Expense();
        $this->assertFalse($expense->save());
    }

    public function testCreateOk() {
        $expense = new Expense();
        $expense->category_id = 'fd';
        $expense->user_id = DB::table('users')->select('user_id')->where('name', 'reporter')->first()->user_id;
        $expense->create_date = new DateTime();
        $expense->amount = 55.75;
        $expense->descr = 'McDonald\'s';
        saveModel($expense);
    }

    public function testSearchExpense() {
        $expense = Expense::where('descr', 'McDonald\'s')->first();
        $this->assertNotEmpty($expense);
        $this->assertEquals(55.75, round($expense->amount, 2));
        $this->assertNotEmpty($expense->user);
        $this->assertEquals('reporter', $expense->user->name);
    }

    public function testFindAll() {
        $expenses = Expense::all();
        $this->assertNotEmpty($expenses);
        $this->assertEquals(4, count($expenses));
    }
}