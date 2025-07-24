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
        Schema::create('ijin_usahas', function (Blueprint $table) {
            $table->id();
            //data Pemohon
            $table->string('nama')->nullable();
            $table->string('nik')->nullable();
            $table->string('email')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('alamat')->nullable();
            //informasi usaha
            $table->string('nama_usaha')->nullable();
            $table->string('jenis_usaha')->nullable();
            $table->string('alamat_usaha')->nullable();
            $table->string('modal_usaha')->nullable();
            $table->string('deskripsi')->nullable();
            //dokumen pendukung
            $table->string('ktp')->nullable();
            $table->string('npwp')->nullable();
            $table->string('akte_pendirian')->nullable();
            $table->string('surat_domisili_usaha')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ijin_usahas');
    }
};
