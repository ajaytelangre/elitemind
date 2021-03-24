<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvironmentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('environmentals', function (Blueprint $table) {
            $table->id();
            $table->Integer("user_id");
            $table->string('environmental')->length(50)->nullable();
            $table->string('personal_surrounding')->length(50)->nullable();
            $table->string('recycling_trash')->length(50)->nullable();
            $table->string('grooming')->length(50)->nullable();
            $table->string('personal_hyigeine')->length(50)->nullable();
            $table->string('nutrition')->length(50)->nullable();
            $table->string('detox')->length(50)->nullable();
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
        Schema::dropIfExists('environmentals');
    }
}
