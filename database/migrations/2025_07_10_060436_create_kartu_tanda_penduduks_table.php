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
        Schema::create('kartu_tanda_penduduks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nik', 16)->unique()->nullable();
            $table->string('nomor_kk',255)->nullable();
            $table->string('tempat_lahir', 255)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('nama', 255)->nullable();
            $table->string('jenis_kelamin', 255)->nullable();
            $table->string('golongan_darah', 255)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('rt_rw', 50)->nullable();
            $table->string('kelurahan_desa', 255)->nullable();
            $table->string('kecamatan', 255)->nullable();
            $table->string('agama', 255)->nullable();
            $table->string('status_perkawinan', 255)->nullable();
            $table->string('pekerjaan', 255)->nullable();
            $table->string('kewarganegaraan', 255)->nullable();
            $table->string('berlaku_hingga', 255)->nullable();
            $table->string('foto', 255)->nullable();
            $table->date('tanggal_disahkan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kartu_tanda_penduduks');
    }
};
