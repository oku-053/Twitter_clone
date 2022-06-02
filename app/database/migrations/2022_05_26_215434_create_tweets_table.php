<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweets', function (Blueprint $table) {
            $table->increments('tweet_id');
            $table->string('userID')->comment('ユーザID');
            $table->string('text')->comment('本文');
            $table->softDeletes();
            $table->timestamps();

            $table->index('tweet_id');
            $table->index('userID');
            $table->index('text');

            //usersテーブルと接続
            $table->foreign('userID')
                ->references('userID')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tweets');
    }
};
