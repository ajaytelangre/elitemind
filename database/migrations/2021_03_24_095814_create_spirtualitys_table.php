<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpirtualitysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spirtualitys', function (Blueprint $table) {
            $table->id();
            $table->Integer("user_id");
            $table->string("meditation")->nullable();
            $table->string("planned_solitude")->nullable();
            $table->string("walk_in_nature")->nullable();
            $table->string("contemplation")->nullable();
            $table->string("prayer")->nullable();
            $table->string("devotional_song")->nullable();
            $table->string("visit_to_religious_place")->nullable();
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
        Schema::dropIfExists('spirtualitys');
    }
}
