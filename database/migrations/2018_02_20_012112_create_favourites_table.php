<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavouritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favourites', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('device_id');
            $table->unsignedInteger('place_id');

            $table->timestamps();

            $table->foreign('device_id')->references('id')
                ->on('devices')->onDelete('cascade');

            $table->foreign('place_id')->references('id')
                ->on('places')->onDelete('cascade');

            $table->index(['device_id', 'place_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints('favourites');
        Schema::dropIfExists('favourites');
    }
}
