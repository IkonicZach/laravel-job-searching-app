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
        // Schema::table('users', function (Blueprint $table) {
        //     $table->foreign('company_id')->references('id')->on('companies')->onUpdate('cascade')->onDelete('cascade')->nullable();
        //     $table->foreign('preferred_category')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade')->nullable();
        // });

        // Schema::table('categories', function (Blueprint $table) {
        //     $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        //     $table->foreign('updated_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade')->nullable();
        // });

        // Schema::table('companies', function (Blueprint $table) {
        //     $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
        //     $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        //     $table->foreign('updated_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade')->nullable();

        // });

        Schema::table('jobs', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('updated_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade')->nullable();
        });

        // Schema::table('faqs', function (Blueprint $table) {
        //     $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        //     $table->foreign('updated_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade')->nullable();
        // });

        // Schema::table('news', function (Blueprint $table) {
        //     $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        //     $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        //     $table->foreign('updated_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade')->nullable();

        // });

        // Schema::table('ratings', function (Blueprint $table) {
        //     $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        //     $table->foreign('company_id')->references('id')->on('companies')->onUpdate('cascade')->onDelete('cascade')->nullable();
        //     $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        //     $table->foreign('updated_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade')->nullable();

        // });

        // Schema::table('subcategories', function (Blueprint $table) {
        //     // $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
        //     // $table->foreign('subcategory_id')->references('id')->on('subcategories')->onUpdate('cascade')->onDelete('cascade');
        //     // $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        //     // $table->foreign('updated_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade')->nullable();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tables', function (Blueprint $table) {
            //
        });
    }
};
