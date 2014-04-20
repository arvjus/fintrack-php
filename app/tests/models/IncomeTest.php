<?php

class IncomeTest extends TestCase {

    public function testCreateIncomplete() {
        $income = new Income();
        $this->assertFalse($income->save());
    }

    public function testCreateOk() {
        $income = new Income();
        $income->user_id = DB::table('users')->select('user_id')->where('name', 'reporter')->first()->user_id;
        $income->create_date = new DateTime();
        $income->amount = 12345.67;
        $income->descr = 'Salary';
        saveModel($income);
    }

    public function testSearchIncome() {
        $income = Income::where('descr', 'Salary')->first();
        $this->assertNotEmpty($income);
        $this->assertEquals(12345.67, $income->amount);
        $this->assertNotEmpty($income->user);
        $this->assertEquals('reporter', $income->user->name);
    }

    public function testFindAll() {
        $categories = Income::all();
        $this->assertNotEmpty($categories);
        $this->assertEquals(2, count($categories));
    }
}