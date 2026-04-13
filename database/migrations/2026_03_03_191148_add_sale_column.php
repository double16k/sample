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
        Schema::table('sales', function (Blueprint $table) {
            //
            $table->integer('user_id');
            $table->integer('insurance_id');
            $table->integer('content_id');
            $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sales', function (Blueprint $table) {
            //
            $table->dropColumn('user_id');
            $table->dropColumn('insurance_id');
            $table->dropColumn('content_id');
            $table->dropColumn('date');
        });
    }
};
