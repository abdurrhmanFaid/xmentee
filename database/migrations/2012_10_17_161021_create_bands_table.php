<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bands', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('description', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->timestamp('applying_deadline')->nullable();
            $table->unsignedInteger('members_count')->default(0);
            $table->boolean('student_reception_open')->default(false);
            $table->unsignedMediumInteger('receiving_batch_id')->nullable()->index();
            $table->string('messaging_group_id')->nullable();
            $table->string('notifications_locale')->default('en');
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
        Schema::dropIfExists('bands');
    }
}
