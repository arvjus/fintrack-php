<?php

use Fintrack\Storage\Services\CategoryService;

class CategoryServiceTest extends TestCase {
    public function setUp() {
        parent::setUp();

        $this->service = new CategoryService();
    }

    public function testAll() {
        $categories = $this->service->all();
        $this->assertNotNull($categories);
        $this->assertEquals(3, count($categories));
    }

}