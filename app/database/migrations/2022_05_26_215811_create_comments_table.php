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
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('comment_id');
            $table->string('userID')->comment('ユーザID');
            $table->unsignedInteger('tweet_id')->comment('ツイートID');
            $table->string('text')->comment('本文');
            $table->softDeletes();
            $table->timestamps();

            $table->index('comment_id');
            $table->index('userID');
            $table->index('tweet_id');

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
        Schema::dropIfExists('comments');
    }
};
