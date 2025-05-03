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
        Schema::create('card_families', function (Blueprint $table) {
            $table->id();
            $table->string('no_kk', 16)->unique();
            $table->foreignId('kepala_keluarga_id')->constrained('residents')->onDelete('cascade');
            $table->string('rt', 5);
            $table->string('rw', 5);
            $table->string('desa', 100);
            $table->string('kecamatan', 100);
            $table->string('kabupaten', 100);
            $table->string('provinsi', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_families');
    }
};
