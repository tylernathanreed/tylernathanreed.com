<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cards', function (Blueprint $table)
		{
			// Identification
			$table->increments('id');
			$table->string('sport', 12)->index();

			// Card Attributes
			$table->smallInteger('number')->unsigned()->index();
			$table->smallInteger('year')->unsigned()->index();
			$table->boolean('rookie')->default(false)->index();
			$table->integer('price')->unsigned()->nullable()->index();

			// Player Attributes
			$table->string('player', 30)->index();
			$table->string('position', 24)->nullable()->index();
			$table->string('team', 30)->index();

			// Other Attributes
			$table->text('description')->nullable();

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
		Schema::drop('cards');
	}
}
