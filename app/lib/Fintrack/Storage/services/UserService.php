<?php namespace Fintrack\Storage\Services;

use User;

class UserService
{
    public function all() {
        return User::all();
    }

    public function find($id) {
        return User::find($id);
    }
}