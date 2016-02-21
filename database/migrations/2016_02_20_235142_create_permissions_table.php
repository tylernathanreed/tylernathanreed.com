<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('permissions', function(Blueprint $table)
		{
			// Identification
			$table->increments('id') 				->comment('The Unique Identifier for the Role.');
			$table->string('name', 32)->unique()	->comment('The Name of the Role.');
			$table->string('slug', 70)->unique()	->comment('The Unique Slug for the Role.');

			// Attributes
			$table->string('display', 32) 			->comment('The Display Name of the Role.');
			$table->text('description') 			->comment('The Description of the Role.');

			// Revision Tracking
			$table->timestamps();
		});

		Schema::create('permission_role', function(Blueprint $table)
		{
			$table->integer('role_id')->unsigned();
			$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

			$table->integer('permission_id')->unsigned();
			$table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');

			$table->primary(array('role_id', 'permission_id'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('permission_role');
		Schema::drop('permissions');
	}
}
