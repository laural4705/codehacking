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

        //When we delete a user we also want to delete related info - to do that we need
        //to set up a constraint
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index()->unsigned();
            $table->integer('category_id')->index()->unsigned();
            $table->integer('photo_id')->index()->unsigned();
            $table->string('title');
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
