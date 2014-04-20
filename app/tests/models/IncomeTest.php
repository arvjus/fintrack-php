<?php

class ExpenseTest extends TestCase {

    public function testCreateUncomplete() {
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
        $this->assertEquals('fd', $expense->category_id);
    }

    public function testFindAll() {
        $categories = Expense::all();
        $this->assertNotEmpty($categories);
        $this->assertEquals(3, count($categories));
    }
}