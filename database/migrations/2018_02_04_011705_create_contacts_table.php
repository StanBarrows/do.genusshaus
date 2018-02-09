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
            $table->string('web');
            $table->string('phone');

            $table->string('facebook');
            $table->string('instagram');
            $table->string('twitter');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
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
