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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->integer('phone')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('address');
            $table->string('education_status');
            $table->string('degree')->nullable();
            $table->string('institution_name')->nullable();
            $table->string('major')->nullable();
            $table->dateTime('graduation_date')->nullable();
            $table->string('job_title');
            $table->string('company_name');
            $table->string('location')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->mediumText('job_description')->nullable();
            $table->string('skills');
            $table->string('certificate')->nullable();
            $table->string('certificate_issuing_org')->nullable();
            $table->dateTime('obtained_date')->nullable();
            $table->mediumText('goals');
            $table->string('project_name')->nullable();
            $table->string('project_description')->nullable();
            $table->string('technologies_used')->nullable();
            $table->string('project_role')->nullable();
            $table->string('award')->nullable();
            $table->string('award_issuing_org')->nullable();
            $table->dateTime('received_date')->nullable();
            $table->string('languages');
            $table->string('hobbies')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
