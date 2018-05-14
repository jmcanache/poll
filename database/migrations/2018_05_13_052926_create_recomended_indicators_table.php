<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecomendedIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recomended_indicators', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('custom_poll_id')->unsigned();
            $table->foreign('custom_poll_id')->references('id')->on('custom_polls')->onDelete('cascade');
            $table->string('indicator');
            $table->longText('why');
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
        Schema::drop('recomended_indicators');
    }
}
