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
        Schema::create('orang_tua', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('nomor_identitas');
            $table->text('alamat');
            $table->string('nomor_telepon');
            $table->string('pekerjaan_ayah');
            $table->string('pekerjaan_ibu');
            $table->string('pendidikan_terakhir_ayah');
            $table->string('pendidikan_terakhir_ibu');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orang_tua');
    }
};
