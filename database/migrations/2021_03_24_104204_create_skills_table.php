<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->Integer("user_id");
            $table->string("spend_time_on_project")->length(50)->nullable();
            $table->string("planning_for_financial_helth")->length(50)->nullable();
            $table->string("saving")->length(50)->nullable();
            $table->string("investment")->length(50)->nullable();
            $table->string("negotiating_skills")->length(50)->nullable();
            $table->string("value_you_are_worth_for")->length(50)->nullable();
            $table->string("develop_new_skill_sets")->length(50)->nullable();
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
        Schema::dropIfExists('skills');
    }
}
