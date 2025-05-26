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
        Schema::create('laporan', function (Blueprint $table) {
            $table->ulid('id')->primary()->index();
            $table->string('nama_pelapor', 50)->nullable();
            $table->string('email_pelapor')->nullable()->index();
            $table->string('no_hp', 15)->nullable()->index();
            $table->string('bukti_laporan')->nullable();
            $table->string('status', 20)->nullable()->default('Ditinjau');
            $table->timestamp('tanggal_selesai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
