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
        Schema::table('table_sale', function (Blueprint $table) {
            //
            //$table->integer('user_id')->nullable(false)->change();
            //$table->integer('insurance_id')->nullable(false)->change();
            //$table->integer('content_id')->nullable(false)->change();
            $table->date('date')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_sale', function (Blueprint $table) {
            //
            //$table->integer('user_id')->nullable()->change();
            $table->integer('insurance_id')->nullable()->change();
            $table->integer('content_id')->nullable()->change();
            $table->date('date')->nullable()->change();
        });
    }
};
