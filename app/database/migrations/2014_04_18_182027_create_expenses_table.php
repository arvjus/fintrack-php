<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExpensesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('expense_id');
            $table->string('category_id', 2);
            $table->integer('user_id')->unsigned();
            $table->dateTime('create_date');
            $table->float('amount');
            $table->string('descr');

            $table->foreign('category_id')->references('category_id')->on('categories');
            $table->foreign('user_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('expenses', function (Blueprint $table) {
            Schema::drop('expenses');
        });
    }

}
