<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();
        Schema::create('companies', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('company_name')->default(null);
            $table->string('country')->default(null);
            $table->integer('score')->default(0);
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->string('main_activity')->default(null);
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
        // Schema::table('companies', function (Blueprint $table) {
        //     //
        // });

        Schema::dropIfExists('companies');
    }
}
