<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_questions', function (Blueprint $table) {

            // Identification
            $table->bigIncrements('id');

            // Relationships
            $table->bigInteger('quiz_id')->unsigned()->references('id')->on('quiz_templates')->index();

            // Attributes
            $table->string('type', 20);
            $table->text('prompt');
            $table->text('answer_key');
            $table->tinyInteger('points_available')->nullable();
            $table->smallInteger('default_order')->unsigned();

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
        Schema::dropIfExists('quiz_questions');
    }
}
