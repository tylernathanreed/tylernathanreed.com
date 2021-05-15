<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuizQuestionInstancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_question_instances', function (Blueprint $table) {

            // Identifications
            $table->bigIncrements('id');

            // Relationships
            $table->bigBelongsTo('quiz_instances');

            // Attributes
            $table->text('answer_provided');
            $table->tinyInteger('points_awarded')->nullable();
            $table->smallInteger('random_order')->unsigned();

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
        Schema::dropIfExists('quiz_question_instances');
    }
}
