<?php

/**
 * Created by PhpStorm.
 * User: arju
 * Date: 2014/18/04
 * Time: 21:34
 */
class Income extends Eloquent
{
    public $timestamps = false;
    protected $primaryKey = 'income_id';
    protected $guarded = array('income_id');

    public function user() {
        return $this->belongsTo('User', 'user_id');
    }
}