<?php

use Fintrack\Storage\Services\ExpenseService;

class ExpenseServiceTest extends TestCase {
    public function setUp() {
        parent::setUp();

        $this->service = new ExpenseService();
    }

    public function testGetAll() {
        $expenses = $this->service->all();
        $this->assertNotNull($expenses);
        $this->assertEquals(3, count($expenses));
    }

}