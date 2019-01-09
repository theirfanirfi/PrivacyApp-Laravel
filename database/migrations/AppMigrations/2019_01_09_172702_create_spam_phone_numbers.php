<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpamPhoneNumbers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spam_phone_numbers', function (Blueprint $table) {
            $this->down();

            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->string('phone_number');
            $table->integer('score')->default(0);

            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade');

            $table->foreign('company_id')->references('id')->on('companies')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spam_phone_numbers');
    }
}
