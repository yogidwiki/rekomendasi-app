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
        Schema::create('riwayat_rekomendasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anak_id');
            $table->unsignedBigInteger('orang_tua_id'); 
            $table->json('kriteria');
            $table->json('rekomendasi');
            $table->timestamps();
            
            $table->foreign('anak_id')->references('id')->on('anak')->onDelete('cascade');
            $table->foreign('orang_tua_id')->references('id')->on('orang_tua')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_rekomendasi');
    }
};
