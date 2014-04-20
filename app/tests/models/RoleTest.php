<?php
use Illuminate\Database\QueryException;
use Zizaco\FactoryMuff\Facade\FactoryMuff;

/**
 * Created by PhpStorm.
 * User: arju
 * Date: 19/04/14
 * Time: 23:48
 */

class RoleTest extends TestCase {

    public function testNoName() {
        $role = new Role();
        $this->assertFalse($role->save());
    }

    public function testNonUniue() {
        $role = FactoryMuff::create('Role');
        $this->assertTrue($role->save());

        try {
            $role = FactoryMuff::create('Role');
            $role->save();
            $this->fail('expected QueryException');
        } catch (QueryException $e) {
            $this->assertEquals(23000, $e->getCode());
        }
    }
} 