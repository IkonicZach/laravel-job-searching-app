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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('title');
            $table->string('country');
            $table->string('city');
            $table->integer('min_salary');
            $table->integer('max_salary');
            $table->mediumText('description');
            $table->mediumText('responsibilities');
            $table->mediumText('requirements');
            $table->mediumText('benefits');
            $table->string('employment_type');
            $table->string('type');
            $table->string('status');
            $table->integer('deadline');
            $table->integer('applications');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
