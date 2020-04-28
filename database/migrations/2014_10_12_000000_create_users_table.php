<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedMediumInteger('band_id')->index();
            $table->unsignedMediumInteger('batch_id')->nullable()->index();
            $table->mediumInteger('points')->default(0);
            $table->string('image_path')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('messaging_id')->nullable();
            $table->string('default_locale')->default('en');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('band_id')->references('id')->on('bands')->onDelete('cascade');
            // batch_id == null >> band instructor
            // batch_id != null >> band student
            // if batch_id != null > then instructor removed it > all students must be removed
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
