<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentLessonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_lesson', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->index();
            $table->unsignedBigInteger('lesson_id')->index();
            $table->string('notice')->nullable();
            $table->tinyInteger('rate')->default(5);
            $table->boolean('attended')->default(true);

            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_lesson');
    }
}
