<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SquadronsInterviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('squadrons_interviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ticket');
            $table->text('why_to_join');
            $table->string('age');
            $table->string('can_pay');
            $table->string('best_field');
            $table->string('english_rate');
            $table->string('design_rate');
            $table->string('writing_speed_per_min');
            $table->text('problems_for_joining');
            $table->string('best_tech_project');
            $table->string('suits_env');
            $table->text('feedback');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
