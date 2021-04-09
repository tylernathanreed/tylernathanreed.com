<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuizRankingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_rankings', function (Blueprint $table) {

            // Identification
            $table->bigIncrements('id');

            // Relationships
            $table->bigBelongsTo('quiz_templates', 'quiz_id')->index();
            $table->tinyInteger('score')->unsigned();
            $table->integer('count')->unsigned();

            // Revision tracking
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
        Schema::dropIfExists('quiz_rankings');
    }
}
