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
        Schema::table('categories', function (Blueprint $table) {
            $table->string('color', 6)->default('ff0000')->after('name');
            $table->string('name', 200)->change();
        });
        
        Schema::table('folders', function (Blueprint $table) {
            $table->foreignId('categories_id')->constrained('categories')->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('color');
            $table->string('name', 100)->change();
        });

        Schema::table('folders', function (Blueprint $table) {
            $table->dropForeign(['categories_id']);
            $table->dropColumn('categories_id');
        });
    }
};
