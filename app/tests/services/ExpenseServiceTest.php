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
        $this->assertEquals(4, count($expenses));
    }

    public function testGetPartly() {
        $expenses = $this->service->all(2);
        $this->assertNotNull($expenses);
        $this->assertEquals(2, count($expenses));
    }
}