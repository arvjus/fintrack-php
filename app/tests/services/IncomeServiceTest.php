<?php

use Fintrack\Storage\Services\IncomeService;

class IncomeServiceTest extends TestCase {
    public function setUp() {
        parent::setUp();

        $this->service = new IncomeService();
    }

    public function testGetAll() {
        $incomes = $this->service->all();
        $this->assertNotNull($incomes);
        $this->assertEquals(2, count($incomes));
    }

}