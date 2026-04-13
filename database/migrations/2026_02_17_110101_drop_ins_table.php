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
        Schema::table('ins', function (Blueprint $table) {
            //
            Schema::dropIfExists('ins');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ins', function (Blueprint $table) {
            //
            Schema::create('ins', function (Blueprint $table) {
            $table->id();
            $table->string('ins_name');
            // ... 必要なカラム
            $table->timestamps();
        });
        });
    }
};
