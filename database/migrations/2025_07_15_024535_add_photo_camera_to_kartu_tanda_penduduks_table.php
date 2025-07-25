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
        Schema::table('kartu_tanda_penduduks', function (Blueprint $table) {
            //
            $table->json('photo_camera')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kartu_tanda_penduduks', function (Blueprint $table) {
            //
            $table->dropColumn('photo_camera');
        });
    }
};
