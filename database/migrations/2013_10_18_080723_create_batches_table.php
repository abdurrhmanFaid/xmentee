<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->unsignedMediumInteger('band_id')->index();
            $table->boolean('paid')->default(true);
            $table->unsignedInteger('default_payment_value')->default(0);
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
        Schema::dropIfExists('batches');
    }
}
