<?php

class UserRole extends Eloquent
{
    public $timestamps = false;
    protected $table = 'users_roles';
    protected $primaryKey = 'user_role_id';
    protected $guarded = array('*');

    public function user()
    {
        return $this->belongsTo('User', 'user_id', 'user_id');
    }

    public function role()
    {
        return $this->belongsTo('Role', 'role_id', 'role_id');
    }
}
