<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menus', function (Blueprint $table)
		{
			// Identification
			$table->increments('id');
			$table->string('title', 64);
			$table->string('slug', 70)->unique();

			// Attributes			
			$table->string('class', 64)->nullable();

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
		Schema::drop('menus');
	}
}
