<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('incomes', function(Blueprint $table)
		{
            $table->increments('income_id');
            $table->integer('user_id')->unsigned();
            $table->dateTime('create_date');
            $table->float('amount');
            $table->string('descr');

            $table->foreign('user_id')->references('user_id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('incomes', function(Blueprint $table)
		{
            Schema::drop('incomes');
		});
	}

}
