<?php

class UserTest extends TestCase {

    public function testCreateIncomplete() {
        $user = new User();
        $this->assertFalse($user->save());
    }

    public function testCreateOk() {
        $user = new User();
        $user->name = 'user';
        $user->password = 'password';
        $this->assertTrue($user->save());
    }

    public function testUserRoles() {
        $user = User::where('name', 'admin')->first();
        $this->assertNotEmpty($user);
        $this->assertNotEmpty($user->roles);
        $this->assertEquals(3, count($user->roles));
    }

    public function testFindAll() {
        $users = User::all();
        $this->assertNotEmpty($users);
        $this->assertEquals(3, count($users));
    }
}
