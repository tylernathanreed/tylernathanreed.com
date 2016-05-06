<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions', function (Blueprint $table)
		{
			// Identification
			$table->increments('id');
			$table->string('name', 64)->index();
			$table->string('slug', 70)->unique();

			// Attributes
			$table->integer('cents')->unsigned()->index();
			$table->dateTime('settled_at')->index();
			$table->text('notes')->nullable();

			// Revision Tracking
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('transactions');
	}
}
