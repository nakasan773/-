<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            //外部キー制約（ユーザーID）
            $table->unsignedInteger('user_id')->comment('ユーザID');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            //外部キー制約（ツイートID）
            $table->unsignedInteger('tweet_id')->comment('ツイートID');
            $table->foreign('tweet_id')->references('id')->on('tweets')->onDelete('cascade')->onUpdate('cascade');
            
            $table->string('text')->comment('本文');
            $table->softDeletes();
            $table->timestamps();

            $table->index('id');
            $table->index('user_id');
            $table->index('tweet_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
