<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('place_id');

            $table->string('name');
            $table->string('email');
            $table->string('web')->nullable();;
            $table->string('phone')->nullable();

            $table->string('facebook')->nullable();;
            $table->string('instagram')->nullable();;
            $table->string('twitter')->nullable();;

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');

            $table->index(['id','place_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints('contacts');
        Schema::dropIfExists('contacts');
    }
}
