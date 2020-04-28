<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taskables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('taskable_id');
            $table->string('taskable_type');
            $table->unsignedBigInteger('solver_id')->nullable()->index();
            $table->string('rate')->nullable();
            $table->enum('status', ['solving', 'solved', 'failed', 'skipped', 'submitted'])->default('solving');
            $table->text('solution')->nullable();
            $table->text('notice')->nullable();
            $table->timestamps();

            $table->foreign('solver_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taskable');
    }
}
