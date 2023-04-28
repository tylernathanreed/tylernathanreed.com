<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizInstancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_instances', function (Blueprint $table) {

            // Identification
            $table->bigIncrements('id');

            // Relationships
            $table->bigInteger('quiz_id')->unsigned()->references('id')->on('quiz_templates')->index();
            $table->bigInteger('user_id')->unsigned()->references('id')->on('users')->index();
            $table->decimal('score', 4, 2)->nullable();

            // Revision tracking
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_instances');
    }
}
