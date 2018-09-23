<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AffiliateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('lesson_id')->unsigned()->index();
            $table->bigInteger('lesson_textbook_id')->default(0);
            $table->bigInteger('lesson_read_id')->default(0);

            $table->longText('amazon_a_href')->nullable();
            $table->longText('amazon_img_src')->nullable();
            $table->longText('amazon_title')->nullable();
            $table->longText('moshimo_img_src')->nullable();


            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');

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
