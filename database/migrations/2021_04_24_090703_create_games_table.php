<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 35);
            $table->text('description', 150);
            $table->string('img', 35);
            $table->enum('pegi', ['3','7','12','16','18']);
            $table->double('price',6,2);
            $table->enum('state', ['mal', 'regular', 'bien', 'como nuevo'])->default('bien');
            $table->date('published_at');
            $table->timestamps();
        });
        Schema::create('category_game', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('game_id')->nullable();
            $table->unique(['category_id', 'game_id']);
            $table->foreign('category_id')->references('id')
            ->on('categories')->onDelete('cascade');
            $table->foreign('game_id')->references('id')
            ->on('games')->onDelete('cascade');
        });
        Schema::create('game_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('game_id')->nullable();
            $table->boolean('is_purchased')->default(false);
            $table->text('comment', 150)->nullable();

            $table->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade');
            $table->foreign('game_id')->references('id')
            ->on('games')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
