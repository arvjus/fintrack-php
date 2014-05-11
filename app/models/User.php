<?php

use LaravelBook\Ardent\Ardent;
use Illuminate\Auth\UserInterface;

class User extends Ardent implements UserInterface
{
    public $timestamps = false;
    protected $primaryKey = 'user_id';
    protected $guarded = array('user_id', 'password', 'is_admin', 'is_reporter');

    /**
     * Ardent validation rules
     */
    public static $rules = array(
        'username' => 'required|between:4,16',
        'password' => 'required|between:4,64',
    );

    public function getAuthIdentifier() {
        return $this->username;
    }

    public function getAuthPassword() {
        return $this->password;
    }

    public function getRememberToken() {
        return false;
    }

    public function setRememberToken($value) {
        // TODO: Implement setRememberToken() method.
    }

    public function getRememberTokenName() {
        // TODO: Implement getRememberTokenName() method.
    }
}
