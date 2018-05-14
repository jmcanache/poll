<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_indicators', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('indicator_id')->unsigned();
            $table->foreign('indicator_id')->references('id')->on('indicators')->onDelete('cascade');
            $table->string('description');
            $table->integer('point');
            $table->longText('main_text');
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
        Schema::drop('data_indicators');
    }
}
