<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LessonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('faculty_id')->unsigned();


            $table->string('sub_title')->nullable();
            $table->string('subsub_title')->nullable();

            // lesson
            $table->string('lesson_title')->nullable();
            $table->string('lesson_term')->nullable();
            $table->string('lesson_date')->nullable();
            $table->bigInteger('lesson_credit')->unsigned()->nullable();

            $table->string('lesson_professor')->nullable();
            $table->longText('lesson_objectives')->nullable();
            $table->longText('lesson_content')->nullable();

            $table->longText('lesson_style')->nullable();
            $table->string('lesson_evaluation')->nullable();
            $table->string('lesson_textbook')->nullable();
            $table->longText('lesson_read')->nullable();
            $table->longText('lesson_officehour')->nullable();
            $table->longText('lesson_info')->nullable();

            // evaluate
            $table->string('evaluate_exam')->nullable();
            $table->string('evaluate_report')->nullable();
            $table->string('evaluate_mintest')->nullable();
            $table->string('evaluate_apply')->nullable();
            $table->string('evaluate_others')->nullable();
            $table->string('evaluate_total')->nullable();


            $table->string('url')->nullable();
            $table->bigInteger('year')->unsigned()->nullable();


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
        //
    }
}
