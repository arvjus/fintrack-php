<?php namespace Fintrack\Storage\Services;

use User;

class UserService
{
    public function all() {
        return User::all();
    }

    public function find($user_id) {
        return User::find($user_id);
    }

    public function findByName($name) {
        return User::where('name', $name)->first();
    }
}