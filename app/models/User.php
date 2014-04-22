<?php

use LaravelBook\Ardent\Ardent;

class User extends Ardent
{
    public $timestamps = false;
    protected $primaryKey = 'user_id';
    protected $guarded = array('user_id', 'password', 'is_admin', 'is_reporter');

    /**
     * Ardent validation rules
     */
    public static $rules = array(
        'name' => 'required|between:4,16',
        'password' => 'required|between:4,64',
    );
}
