<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physiques', function (Blueprint $table) {
            $table->id();

            $table->Integer("user_id");
            $table->string('yoga')->length(50)->nullable();
            $table->string('hit_the_gym')->length(50)->nullable();
            $table->string('swimming')->length(50)->nullable();
            $table->string('cycling')->length(50)->nullable();
            $table->string('walking')->length(50)->nullable();
            $table->string('trekking')->length(50)->nullable();
            $table->string('dancing')->length(50)->nullable();
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
        Schema::dropIfExists('physiques');
    }
}
