<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_places', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('device_id');
            $table->unsignedInteger('place_id');

            $table->string('event')->default('visited');
            $table->boolean('pushed')->default(false);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade');
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');

            $table->index(['id', 'place_id', 'device_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_places');
    }
}
