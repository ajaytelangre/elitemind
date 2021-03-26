<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudPhysiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stud_physiques', function (Blueprint $table) {
            $table->id();
            $table->Integer("user_id");
      
            $table->string("yoga")->length(50)->nullable();
            $table->string("hitthegym")->length(50)->nullable();
            $table->string("swimming")->length(50)->nullable();
            $table->string("cycling")->length(50)->nullable();
            $table->string("walking")->length(50)->nullable();
            $table->string("trekking")->length(50)->nullable();
            $table->string("dancing")->length(50)->nullable();
            $table->string("timelyeating")->length(50)->nullable();
            $table->string("playing")->length(50)->nullable();
            $table->string("jogging")->length(50)->nullable();
            $table->string("sleep")->length(50)->nullable();

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
        Schema::dropIfExists('stud_physiques');
    }
}
