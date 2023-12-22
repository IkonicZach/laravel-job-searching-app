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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('created_by');
            $table->dropForeign('updated_by');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign('created_by');
            $table->dropForeign('updated_by');
        });

        Schema::table('companies', function (Blueprint $table) {
            $table->dropForeign('category_id');
            $table->dropForeign('created_by');
            $table->dropForeign('updated_by');
        });
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
