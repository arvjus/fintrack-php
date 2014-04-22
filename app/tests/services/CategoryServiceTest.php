<?php

use Fintrack\Storage\Services\CategoryService;

class CategoryServiceTest extends TestCase {
    public function setUp() {
        parent::setUp();

        $this->service = new CategoryService();
    }

    public function testGetAll() {
        $categories = $this->service->all();
        $this->assertNotNull($categories);
        $this->assertEquals(3, count($categories));
    }

    public function testFind() {
        $category = $this->service->find('fd');
        $this->assertNotNull($category);
        $this->assertEquals('Food', $category->name);
    }
}