<?php

/**
 * Created by PhpStorm.
 * User: arju
 * Date: 2014/18/04
 * Time: 21:34
 */
class Expense extends Eloquent
{
    public $timestamps = false;
    protected $primaryKey = 'expense_id';
    protected $guarded = array('expense_id');

    public function category() {
        return $this->belongsTo('Category', 'category_id');
    }

    public function user() {
        return $this->belongsTo('User', 'user_id');
    }
}