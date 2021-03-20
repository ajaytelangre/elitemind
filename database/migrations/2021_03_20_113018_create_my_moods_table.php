<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyMoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_moods', function (Blueprint $table) {
            $table->id();
            $table->Integer("user_id");
            $table->string("angry");
            $table->string("anxious");
            $table->string("energetic");
            $table->string("calm");
            $table->string("depressed");
            $table->string("active");
            $table->string("happy");
            $table->string("exhausted");
            $table->string("stressed");
            $table->string("normal");
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
        Schema::dropIfExists('my_moods');
    }
}
