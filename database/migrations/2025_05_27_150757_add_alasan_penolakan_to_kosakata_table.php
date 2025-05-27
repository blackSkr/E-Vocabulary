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
        Schema::table('kosakata', function (Blueprint $table) {
            //
            $table->text('alasan_penolakan')->after('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kosakata', function (Blueprint $table) {
            //
                    $table->dropColumn('alasan_penolakan');
        });
    }
};
