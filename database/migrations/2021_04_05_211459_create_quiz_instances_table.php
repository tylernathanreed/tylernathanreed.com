<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->bigBelongsTo('quiz_templates', 'quiz_id');
            $table->bigBelongsTo('users');
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
