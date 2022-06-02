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
        Schema::create('category_game', function (Blueprint $table) {
            $table->id();

            $table->Integer('game_id');
            $table->Integer('category_id');

            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            //$table->foreignId('id_game')->nullable()->constrained('game');
            //$table->foreignId('id_category')->nullable()->constrained('categoryphp ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_category');
    }
};
