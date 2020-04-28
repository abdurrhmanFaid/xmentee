<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBandOwnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('band_owner', function (Blueprint $table) {
            $table->unsignedMediumInteger('band_id')->index();
            $table->unsignedBigInteger('owner_id')->index();
            $table->timestamps();

            $table->foreign('band_id')->references('id')->on('bands')->onDelete('cascade');
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_owner');
    }
}
