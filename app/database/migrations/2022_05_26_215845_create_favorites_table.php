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
        Schema::create('favorites', function (Blueprint $table) {
            $table->increments('favo_id');
            $table->string('userID')->comment('ユーザID');
            $table->unsignedInteger('tweet_id')->comment('ツイートID');

            $table->index('favo_id');
            $table->index('userID');
            $table->index('tweet_id');

            $table->unique([
                'userID',
                'tweet_id'
            ]);

            $table->foreign('userID')
                ->references('userID')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('tweet_id')
                ->references('tweet_id')
                ->on('tweets')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorites');
    }
};
