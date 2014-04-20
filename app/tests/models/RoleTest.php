<?php

use Illuminate\Database\QueryException;

class RoleTest extends TestCase {

    public function testCreateIncomplete() {
        $role = new Role();
        $this->assertFalse($role->save());
    }

    public function testNotUnique() {
        $role = new Role();
        $role->name = 'a role';
        $this->assertTrue($role->save());

        try {
            $role = new Role();
            $role->name = 'a role';
            $role->save();
            $this->fail('expected QueryException');
        } catch (QueryException $e) {
            $this->assertEquals(23000, $e->getCode());
        }
    }

    public function testRoleUsers() {
        $role = Role::where('name', 'reporter')->first();
        $this->assertNotEmpty($role);
        $this->assertNotEmpty($role->users);
        $this->assertEquals(2, count($role->users));
    }

    public function testFindAll() {
        $roles = Role::all();
        $this->assertNotEmpty($roles);
        $this->assertEquals(3, count($roles));
    }
}