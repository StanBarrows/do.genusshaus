<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeaconsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beacons', function (Blueprint $table) {
            $table->string('id')->unique();

            $table->uuid('uuid')->default(\Ramsey\Uuid\Uuid::uuid1())->unique();
            $table->unsignedInteger('place_id')->nullable();

            $table->string('major');
            $table->string('minor');

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
        Schema::disableForeignKeyConstraints('events');
        Schema::dropIfExists('beacons');
    }
}
