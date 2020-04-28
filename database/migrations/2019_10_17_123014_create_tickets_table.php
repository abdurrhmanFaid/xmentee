<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('owner_name');
            $table->string('code');
            $table->string('password');
            $table->unsignedMediumInteger('band_id')->index();
            $table->enum('type', ['instructor', 'student'])->default('student');
            $table->enum('status', ['reviewing', 'approved', 'rejected'])->default('reviewing');
            $table->boolean('unlimited_usage')->default(false);
            $table->integer('usage_limit')->default(1);
            $table->boolean('distributed_by_band')->default(false);
            $table->timestamps();

            $table->foreign('band_id')->references('id')->on('bands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
