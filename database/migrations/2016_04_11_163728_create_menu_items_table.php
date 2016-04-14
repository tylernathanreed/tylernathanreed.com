<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuItemsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menu_items', function (Blueprint $table)
		{
			// Identification
			$table->increments('id');

			// Attributes
			$table->string('parent_type')->index();
			$table->integer('parent_id')->unsigned()->index();

			$table->string('name', 32);
			$table->string('route');

			$table->integer('order')->unsigned();
		});

		Schema::create('menu_item_permission',  function (Blueprint $table)
		{
			// Identification
			$table->integer('item_id')->unsigned();
			$table->foreign('item_id')->references('id')->on('menu_items')->onDelete('cascade');

			$table->integer('permission_id')->unsigned();
			$table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');

			$table->primary(array('item_id', 'permission_id'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('menu_items');
		Schema::drop('menu_item_permission');
	}
}
