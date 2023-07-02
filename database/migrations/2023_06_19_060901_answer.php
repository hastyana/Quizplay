<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_room');
            $table->unsignedBigInteger('id_quiz');
            $table->unsignedBigInteger('id_user');
            $table->string('username');
            $table->string('answer');
            $table->integer('score');
            $table->timestamps();

            $table->foreign('id_room')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('id_quiz')->references('id')->on('quiz')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
