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
            $table->bigInteger('popular_id')->default(0);
            $table->bigInteger('recommend_id')->default(0);


            $table->string('sub_title')->nullable();
            $table->string('subsub_title')->nullable();

            // lesson
            $table->string('lesson_title')->nullable();
            $table->string('lesson_term')->nullable();
            $table->string('lesson_date')->nullable();
            $table->string('lesson_hour')->nullable();
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
            $table->bigInteger('evaluate_exam')->unsigned()->nullable();
            $table->bigInteger('evaluate_report')->unsigned()->nullable();
            $table->bigInteger('evaluate_mintest')->unsigned()->nullable();
            $table->bigInteger('evaluate_apply')->unsigned()->nullable();
            $table->bigInteger('evaluate_others')->unsigned()->nullable();
            $table->bigInteger('evaluate_total')->unsigned()->nullable();


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
