<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudLearnandteachsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stud_learnandteachs', function (Blueprint $table) {
            $table->id();

            $table->Integer("user_id");
      
            $table->string("chapters")->length(50)->nullable();
            $table->string("diagrams")->length(50)->nullable();
            $table->string("flowcharts")->length(50)->nullable();
            $table->string("imaginaryaudience")->length(50)->nullable();
            $table->string("ownwords")->length(50)->nullable();
            $table->string("activework")->length(50)->nullable();

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
        Schema::dropIfExists('stud_learnandteachs');
    }
}
