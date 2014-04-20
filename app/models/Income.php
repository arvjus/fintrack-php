<?php

use LaravelBook\Ardent\Ardent;

class Income extends Ardent
{
    public $timestamps = false;
    protected $primaryKey = 'income_id';
    protected $guarded = array('income_id');

    public function user() {
        return $this->belongsTo('User', 'user_id');
    }

    /**
     * Ardent validation rules
     */
    public static $rules = array(
        'user_id' => 'required',
        'create_date' => 'required',
        'amount' => 'required',
        'descr' => 'between:4,50'
    );
}