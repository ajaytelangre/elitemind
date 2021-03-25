<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudCelebrateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stud_celebrate', function (Blueprint $table) {
            $table->id();
            
            $table->Integer("user_id");
            $table->string("party_time")->length(50)->nullable();
            $table->string("music")->length(50)->nullable();
            $table->string("movie")->length(50)->nullable();
            $table->string("dinner")->length(50)->nullable();
            $table->string("eat_out")->length(50)->nullable();
            $table->string("play_with_siblings")->length(50)->nullable();
            $table->string("friends_night_out")->length(50)->nullable();
            $table->string("others")->length(50)->nullable();

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
        Schema::dropIfExists('stud_celebrate');
    }
}
