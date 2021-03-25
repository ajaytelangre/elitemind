<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudEnvironmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stud_environment', function (Blueprint $table) {
            $table->id();
            $table->Integer("user_id");
      
            $table->string("familytime")->length(50)->nullable();
            $table->string("friends")->length(50)->nullable();
            $table->string("buddies")->length(50)->nullable();
            $table->string("personal_surroundings")->length(50)->nullable();
            $table->string("recycling_trash")->length(50)->nullable();
            $table->string("grooming")->length(50)->nullable();
            $table->string("personal_hyigeine")->length(50)->nullable();
            $table->string("nutirtion")->length(50)->nullable();
            $table->string("desired_environment")->length(50)->nullable();
            $table->string("be_with_friends")->length(50)->nullable();
            $table->string("love_life")->length(50)->nullable();
            $table->string("shower_empathy")->length(50)->nullable();
            $table->string("positive_feelings_on_relations")->length(50)->nullable();
            $table->string("positive_feelings_with_colleagues")->length(50)->nullable();
            $table->string("gratification")->length(50)->nullable();
            $table->string("meditation")->length(50)->nullable();
            $table->string("plannedsolitude")->length(50)->nullable();
            $table->string("walks_in_nature")->length(50)->nullable();
            $table->string("contemplation")->length(50)->nullable();
            $table->string("family")->length(50)->nullable();
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
        Schema::dropIfExists('stud_environment');
    }
}
