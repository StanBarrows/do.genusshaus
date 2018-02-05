<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');

            $table->uuid('uuid')->default(\Ramsey\Uuid\Uuid::uuid1())->unique();

            $table->unsignedInteger('place_id');

            $table->boolean('published')->default(false);
            $table->boolean('pushed')->default(false);

            $table->string('name');
            $table->longText('description');

            $table->dateTime('start');
            $table->dateTime('finish')->nullable();

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
        Schema::dropIfExists('events');
    }
}
