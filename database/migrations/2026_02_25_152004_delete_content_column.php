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
        Schema::table('contents', function (Blueprint $table) {
            //
            $table->dropColumn('male_number');
            $table->dropColumn('female_number');
            $table->dropColumn('sale');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contents', function (Blueprint $table) {
            //
            $table->string('male_number');
            $table->string('female_number');
            $table->integer('sale');
        });
    }
};
