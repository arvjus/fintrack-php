<?php

use Fintrack\Storage\Services\UserService;

class UserServiceTest extends TestCase {
    public function setUp() {
        parent::setUp();

        $this->service = new UserService();
    }

    public function testAll() {
        $users = $this->service->all();
        $this->assertNotNull($users);
        $this->assertEquals(3, count($users));
    }

}