<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('body')->nullable();
            $table->text('solution')->nullable();
            $table->string('notice')->nullable();
            $table->boolean('open_for_solving')->default(true);
            $table->timestamp('start_date');
            $table->timestamp('end_date')->nullable();
            $table->unsignedBigInteger('creator_id')->nullable()->index();
            $table->timestamps();

            $table->foreign('creator_id')->references('id')->on('users')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
