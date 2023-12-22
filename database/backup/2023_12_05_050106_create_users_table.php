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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('img')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('position')->nullable();
            $table->integer('age')->nullable();
            $table->integer('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->unsignedBigInteger('preferred_category')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
