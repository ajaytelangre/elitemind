<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaDailyPlannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loa_daily_planners', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('morning_visualisation')->nullable();
            $table->string('90_day_goal')->nullable();
            $table->string('30_day_goal')->nullable();
            $table->string('plan_for_today')->nullable();
            $table->string('steal_one_hour')->nullable();
            $table->string('focus_160_minute')->nullable();
            $table->string('time_for_gratification')->nullable();
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
        Schema::dropIfExists('loa_daily_planners');
    }
}
