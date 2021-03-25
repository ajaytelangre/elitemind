<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudIntellectualbreaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stud_intellectualbreaks', function (Blueprint $table) {
            $table->id();

            $table->Integer("user_id");
      
            $table->string("gainingknowledge")->length(50)->nullable();
            $table->string("reading")->length(50)->nullable();
            $table->string("learning")->length(50)->nullable();
            $table->string("planning")->length(50)->nullable();
            $table->string("imagination")->length(50)->nullable();
            $table->string("goodmovies")->length(50)->nullable();
            $table->string("goals")->length(50)->nullable();
            $table->string("values")->length(50)->nullable();
            $table->string("music")->length(50)->nullable();
            $table->string("audiomotivational")->length(50)->nullable();
         
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
        Schema::dropIfExists('stud_intellectualbreaks');
    }
}
