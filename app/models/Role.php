<?php

use LaravelBook\Ardent\Ardent;

class Role extends Ardent
{
    public $timestamps = false;
    protected $primaryKey = 'role_id';
    protected $guarded = array('role_id');

    public function users() {
        return $this->belongsToMany('User', 'users_roles', 'role_id', 'user_id');
    }

    /**
     * Ardent validation rules
     */
    public static $rules = array(
        'name' => 'required|between:4,20'
    );
}