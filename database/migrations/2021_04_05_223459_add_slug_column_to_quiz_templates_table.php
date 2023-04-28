<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AddSlugColumnToQuizTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Drop the column if it already exists
        if (Schema::hasColumn('quiz_templates', 'slug')) {
            Schema::table('quiz_templates', function (Blueprint $table) {
                $table->dropColumn('slug');
            });
        }

        // Create the column as nullable
        Schema::table('quiz_templates', function (Blueprint $table) {
            $table->string('slug', 255)->nullable();
        });

        // Fill in the column
        DB::table('quiz_templates')->cursor()->each(function ($quiz) {
            DB::table('quiz_templates')->where('id', $quiz->id)->update(['name' => Str::slug($quiz->name)]);
        });

        // Make the column non-nullable
        Schema::table('quiz_templates', function (Blueprint $table) {
            $table->string('slug', 255)->change()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quiz_templates', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
