<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudBrainstormingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stud_brainstorming', function (Blueprint $table) {
            $table->id();
            $table->Integer("user_id");
      
            $table->string("brainstormingsession")->length(50)->nullable();
            $table->string("getanswers")->length(50)->nullable();
            $table->string("review")->length(50)->nullable();
            $table->string("practice")->length(50)->nullable();
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
        Schema::dropIfExists('stud_brainstorming');
    }
}
