<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudDailyPlannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stud_daily_planners', function (Blueprint $table) {
            $table->id();
            $table->Integer("user_id")->unique();
            $table->string("morning_visualization",100)->nullable();
            $table->string("unanswred_questions",100)->nullable();
            $table->string("two_coloumn_stratergy",100)->nullable();
            $table->string("morning_plan_your_day",100)->nullable();
            $table->string("take_test",100)->nullable();
            $table->string("rule_of_three",100)->nullable();
            $table->string("rule_of_one",100)->nullable();
            $table->string("gratification",100)->nullable();
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
        Schema::dropIfExists('stud_daily_planners');
    }
}
