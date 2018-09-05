<?php

use Illuminate\Database\Schema\Blueprint;
use LaravelRocket\Foundation\Database\Migration;

class CreateAdminPasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_password_resets', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('email');
            $table->string('token');

            $table->timestamps();

            $table->index(['email'], 'email_index');
            $table->index(['token'], 'token_index');
        });

        $this->updateTimestampDefaultValue('admin_password_resets', ['updated_at'], ['created_at']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CreateAdminPasswordResetsTable');
    }
}
