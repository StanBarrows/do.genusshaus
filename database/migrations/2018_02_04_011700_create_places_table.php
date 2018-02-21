<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {

            $table->increments('id');

            $table->uuid('uuid')->unique();

            $table->unsignedInteger('region_id');

            $table->string('type')->default('basic');

            $table->string('name');
            $table->longText('description')->nullable();

            $table->string('location_street')->nullable();
            $table->string('location_postcode')->nullable();
            $table->string('location_city')->nullable();
            $table->string('location_latitude')->nullable();
            $table->string('location_longitude')->nullable();

            $table->string('contact_name')->nullable();
            $table->string('contact_avatar')->nullable();

            $table->string('contact_email')->nullable();
            $table->string('contact_web')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_facebook')->nullable();
            $table->string('contact_instagram')->nullable();
            $table->string('contact_twitter')->nullable();

            $table->json('opening_hours')->nullable();
            $table->boolean('open')->default(false);

            $table->boolean('image')->default(false);
            $table->boolean('active')->default(false);
            $table->boolean('published')->default(false);
            $table->boolean('reviewed')->default(true);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');

            $table->index(['id', 'uuid']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints('places');
        Schema::dropIfExists('places');
    }
}
