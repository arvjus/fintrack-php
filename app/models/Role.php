<?php

/**
 * Created by PhpStorm.
 * User: arju
 * Date: 2014/18/04
 * Time: 21:34
 */
class Role extends Eloquent
{
    public $timestamps = false;
    protected $primaryKey = 'role_id';
    protected $guarded = array('role_id');

    public function usersRoles()
    {
        return $this->hasMany('UserRole', 'role_id');
    }
}