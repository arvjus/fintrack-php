<?php

class User extends Eloquent
{
    public $timestamps = false;
    protected $primaryKey = 'user_id';
    protected $guarded = array('user_id', 'password');

    public function usersRoles() {
        return $this->hasMany('UserRole', 'user_id');
    }
}
