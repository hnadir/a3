<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersAndCodesTables extends Migration
{
    /**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->default('');
			$table->string('email')->default('');
			$table->string('password')->default('');
			$table->string('role')->default('');
		});
 
		Schema::create('codes', function(Blueprint $table) {
			$table->increments('cid');
			$table->integer('uid')->unsigned()->default('0');
			$table->foreign('uid')->references('id')->on('users')->onDelete('cascade');
			$table->text('code')->default('');
		});
	}
 
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
		Schema::drop('codes');
	}
}