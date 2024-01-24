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
            $table->string('title');
            $table->string('name');
            $table->integer('age');
            $table->string('img');
            $table->string('email');
            $table->integer('phone')->nullable();
            $table->string('linkedin')->nullable();
            $table->mediumText('address');
            $table->string('education_status');
            $table->string('degree')->nullable();
            $table->string('institution_name')->nullable();
            $table->string('major')->nullable();
            $table->date('graduation_date')->nullable();
            $table->string('job_title');
            $table->string('company_name');
            $table->string('location')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->mediumText('job_description')->nullable();
            $table->longText('skills');
            $table->string('certificate')->nullable();
            $table->string('certificate_issuing_org')->nullable();
            $table->date('obtained_date')->nullable();
            $table->mediumText('goals');
            $table->string('project_name')->nullable();
            $table->string('project_description')->nullable();
            $table->string('technologies_used')->nullable();
            $table->string('project_role')->nullable();
            $table->string('award')->nullable();
            $table->string('award_issuing_org')->nullable();
            $table->date('received_date')->nullable();
            $table->string('languages');
            $table->mediumText('hobbies')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
