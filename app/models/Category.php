<?php

/**
 * Created by PhpStorm.
 * User: arju
 * Date: 2014/18/04
 * Time: 21:34
 */
class Category extends Eloquent
{
    public $timestamps = false;
    protected $primaryKey = 'category_id';
    protected $guarded = array('category_id');

    public function expenses() {
        return $this->hasMany('Expense');
    }

}