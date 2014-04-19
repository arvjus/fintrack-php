<?php

/**
 * Created by PhpStorm.
 * User: arju
 * Date: 2014/18/04
 * Time: 21:34
 */
use LaravelBook\Ardent\Ardent;

class Role extends Ardent
{
    public $timestamps = false;
    protected $primaryKey = 'role_id';
    protected $guarded = array('role_id');

    public function usersRoles() {
        return $this->hasMany('UserRole', 'role_id');
    }

    /**
     * Ardent validation rules
     */
    public static $rules = array(
        'name' => 'required|between:4,20'
    );

    /**
     * Factory
     */
    public static $factory = array(
        'name' => 'a role'
    );
}