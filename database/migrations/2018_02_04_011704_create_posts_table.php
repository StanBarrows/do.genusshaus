<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');

            $table->uuid('uuid')->default(\Ramsey\Uuid\Uuid::uuid1())->unique();

            $table->unsignedInteger('place_id');

            $table->boolean('published')->default(false);
            $table->boolean('pushed')->default(false);

            $table->string('title');
            $table->text('teaser');
            $table->longText('body');
            $table->string('author')->nullable();
            $table->string('src')->nullable();

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
        Schema::disableForeignKeyConstraints('posts');
        Schema::dropIfExists('posts');
    }
}
