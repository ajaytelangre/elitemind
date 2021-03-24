<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntellectualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intellectuals', function (Blueprint $table) {
            $table->id();
            $table->Integer("user_id");
            $table->string("gaining_knowledge")->length(50)->nullable();
            $table->string("reading")->length(50)->nullable();
            $table->string("learning_language")->length(50)->nullable();
            $table->string("planning")->length(50)->nullable();
            $table->string("imagination")->length(50)->nullable();
            $table->string("good_movie")->length(50)->nullable();
            $table->string("goals")->length(50)->nullable();
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
        Schema::dropIfExists('intellectuals');
    }
}
