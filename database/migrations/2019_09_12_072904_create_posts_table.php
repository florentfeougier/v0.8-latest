<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('description')->nullable();
            $table->string('color_code')->default('#ee8896');
            $table->integer('duration')->default(5);
            $table->integer('difficulty')->default(1);
            $table->string('thumbnail')->nullable();
            $table->boolean('is_public')->default(0);
            $table->string('image')->nullable()->default('storage/posts/comment-rempoter-son-aloe-vera.jpg');
            $table->longText('content');
            $table->bigInteger('postcategorie_id')->unsigned()->nullable();
            $table->foreign('postcategorie_id')->references('id')
                  ->on('postcategories')->onDelete('cascade');
                  $table->datetime('deleted_at')->nullable();

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
