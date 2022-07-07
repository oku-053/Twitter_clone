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
        Schema::create('followers', function (Blueprint $table) {
            $table->string('following_user_id')->comment('フォローしているユーザーID');
            $table->string('followed_user_id')->comment('フォローされているユーザーID');

            $table->index('following_user_id');
            $table->index('followed_user_id');

            $table->unique([
                'following_user_id',
                'followed_user_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('followers');
    }
};
