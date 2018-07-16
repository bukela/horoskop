<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoroscopesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horoscopes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sign_id')->unsigned();
            $table->foreign('sign_id')->references('id')->on('signs');
            $table->integer('horoscopegroup_id')->unsigned();
            $table->foreign('horoscopegroup_id')->references('id')->on('horoscopegroups');            
            $table->string('title');
            $table->text('short_description');
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
        Schema::dropIfExists('horoscopes');
    }
}
