<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('screen_name')->unique()->null()->comment('アカウント名');
            $table->string('name')->null()->comment('ユーザ名');;
            $table->string('email', 128)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 64);
            $table->integer('age');//生年月日
            $table->integer('user_sex_id')->unsigned()->nullable();//性別
            $table->foreign('user_sex_id')->references('id')->on('user_sexes')->onDelete('cascade');
            $table->string('profile_image')->nullable()->default('noimage.png')->comment('プロフィール画像');
            $table->char('delete_flag', 1)->default(0); //
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
