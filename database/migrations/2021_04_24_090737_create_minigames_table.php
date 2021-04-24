<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinigamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minigames', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('minigame_user', function (Blueprint $table) {
            $table->unsignedBigInteger('minigame_id');
            $table->unsignedBigInteger('user_id');
            $table->unique(['minigame_id', 'user_id']);
            $table->integer('puntuation',6);
            $table->timestamps();

            $table->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade');
            $table->foreign('minigame_id')->references('id')
            ->on('minigames')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('minigames');
    }
}
