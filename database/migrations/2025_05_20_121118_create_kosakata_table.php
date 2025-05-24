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
        Schema::create('kosakata', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('user_id')->index();
            $table->foreignUlid('jenis_kosakata_id')->index()->nullable();
            $table->string('kata_indo')->nullable()->index();
            $table->string('kata_inggris')->nullable()->index();
            $table->string('slug')->nullable()->index();
            $table->string('suara')->nullable();
            $table->string('contoh_penerapan')->nullable();
            $table->string('contoh_gambar')->nullable();
            $table->string('status', 35)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kosakata');
    }
};
