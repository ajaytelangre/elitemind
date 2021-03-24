<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emotions', function (Blueprint $table) {
            $table->id();
            $table->Integer("user_id");
            $table->string("spend_time_with_family")->nullable();
            $table->string("be_with_friend")->nullable();
            $table->string("love_life")->nullable();
            $table->string("shower_emphathy")->nullable();
            $table->string("positive_feeling_on_relation")->nullable();
            $table->string("positive_feeling_with_colleagues")->nullable();
            $table->string("gratification")->nullable();
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
        Schema::dropIfExists('emotions');
    }
}
