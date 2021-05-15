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
            $table->bigIncrements('id');
            $table->string('user_name');
            $table->string('email', 128)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 64);
            $table->string('comment', 200)->nullable();
            $table->integer('age');//生年月日
            $table->integer('user_sexes_id')->unsigned();//性別
            $table->foreign('user_sexes_id')->references('id')->on('user_sexes')->onDelete('cascade');
            $table->char('residence');//居住地
            $table->char('delete_flag', 1)->default(0); //デリートフラグ修正
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
