<?php

use LaravelBook\Ardent\Ardent;

class User extends Ardent
{
    public $timestamps = false;
    protected $primaryKey = 'user_id';
    protected $guarded = array('user_id', 'password');

    public function roles() {
        return $this->belongsToMany('Role', 'users_roles', 'user_id', 'role_id');
    }

    /**
     * Ardent validation rules
     */
    public static $rules = array(
        'name' => 'required|between:4,16',
        'password' => 'required|between:4,64'
    );
}
