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
        Schema::create('user_skill', function (Blueprint $table) {
            // $table->id();
            // $table->foreignId('user_id')->constrained();
            // $table->foreignId('skill_id')->constrained();
            // $table->unsignedTinyInteger('proficiency')->default(50);

            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('skill_id')->constrained()->onDelete('cascade');
            $table->integer('proficiency')->default(50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_skill');
    }
};
