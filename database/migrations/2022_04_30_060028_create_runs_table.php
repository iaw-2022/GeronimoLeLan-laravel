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
        Schema::create('runs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('validation');
            $table->string('description');
            $table->integer('positive_votes');
            $table->integer('negative_votes');
            $table->timestamps();
          //  $table->foreign('id_game')->references('id')->on('games')->nullable();
            $table->foreignId('id_game')->constrained('games')->onDelete('cascade');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('runs');
    }
};
