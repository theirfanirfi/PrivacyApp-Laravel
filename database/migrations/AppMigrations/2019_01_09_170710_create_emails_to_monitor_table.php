<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailsToMonitorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //$this->down();

        Schema::create('emails_to_monitor', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('email');
            $table->integer('user_id')->unsigned();
            $table->integer('leak_id')->default(0);
            $table->tinyInteger('compromised')->default(0);
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->foreign('user_id')->references('id')->on('users')
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
        // Schema::table('emails_to_monitor', function (Blueprint $table) {
        //     //
        // });

        Schema::dropIfExists('emails_to_monitor');
    }
}
