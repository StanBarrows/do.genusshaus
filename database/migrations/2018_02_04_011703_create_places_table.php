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

            $table->uuid('uuid')->default(\Ramsey\Uuid\Uuid::uuid1())->unique();

            $table->unsignedInteger('user_id')->nullable();

            $table->unsignedInteger('region_id');

            $table->string('type')->default('basic');

            $table->string('name');

            $table->boolean('active')->default(false);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
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
