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
            $table->unsignedBigInteger('company_id');
            $table->string('title');
            $table->mediumText('description');
            $table->mediumText('responsibilities');
            $table->mediumText('requirements');
            $table->mediumText('benefits');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->integer('min_salary');
            $table->integer('max_salary');
            $table->string('employment_type');
            $table->string('type');
            $table->string('country');
            $table->string('city');
            $table->string('address');
            $table->string('status');
            $table->dateTime('deadline');
            $table->integer('applications');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
