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
        Schema::create('users', function (Blueprint $table) {
            //$table->id();
            $table->string('userId',20)->primary()->unique()->nullable(false)->comment('ユーザーID');
            $table->string('name')->comment('ユーザ-名');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            //$table->string('userID')->unique()->null()->comment('ユーザーID');
            $table->string('password');
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
};
