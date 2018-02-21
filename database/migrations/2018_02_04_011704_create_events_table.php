<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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

            $table->uuid('uuid')->unique();

            $table->unsignedInteger('place_id');

            $table->string('name');
            $table->longText('description');

            $table->dateTime('start');

            $table->boolean('image')->default(false);
            $table->boolean('published')->default(false);
            $table->boolean('pushed')->default(false);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');

            $table->index(['id', 'uuid', 'place_id']);
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
