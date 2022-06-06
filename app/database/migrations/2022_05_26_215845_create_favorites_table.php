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
            $table->string('user_id')->comment('ユーザーID');
            $table->unsignedInteger('tweet_id')->comment('ツイートID');

            $table->index('favo_id');
            $table->index('user_id');
            $table->index('tweet_id');

            $table->unique([
                'user_id',
                'tweet_id'
            ]);

            $table->foreign('user_id')
                ->references('user_id')
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
