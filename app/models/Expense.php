<?php

use LaravelBook\Ardent\Ardent;

class Expense extends Ardent
{
    public $timestamps = false;
    protected $primaryKey = 'expense_id';
    protected $guarded = array('expense_id');

    public function category() {
        return $this->belongsTo('Category', 'category_id');
    }

    public function user() {
        return $this->belongsTo('user', 'user_id');
    }

    /**
     * Ardent validation rules
     */
    public static $rules = array(
        'category_id' => 'size:2',
        'user_id' => 'required',
        'create_date' => 'required',
        'amount' => 'required',
        'descr' => 'between:4,50'
    );
}
