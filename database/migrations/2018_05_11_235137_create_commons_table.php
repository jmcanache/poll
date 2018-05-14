<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('custom_poll_id')->unsigned();
            $table->foreign('custom_poll_id')->references('id')->on('custom_polls')->onDelete('cascade');
            $table->string('title_table');
            $table->string('th_1');
            $table->string('th_2');
            $table->string('tf');
            $table->string('stf_1');
            $table->string('stf_2');
            $table->string('tp');
            $table->string('title_answer');
            $table->string('title_textbox');
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
        Schema::drop('commons');
    }
}
