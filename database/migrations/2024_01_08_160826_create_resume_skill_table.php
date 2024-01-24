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
        Schema::create('resume_skill', function (Blueprint $table) {
            // $table->id();
            // $table->foreignId('resume_id')->constrained();
            // $table->foreignId('skill_id')->constrained();
            // $table->timestamps();

            // $table->foreign('resume_id')->references('id')->on('resumes')->onDelete('cascade');
            // $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
            $table->id();
            $table->foreignId('resume_id')->constrained()->onDelete('cascade');
            $table->foreignId('skill_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resume_skill');
    }
};
