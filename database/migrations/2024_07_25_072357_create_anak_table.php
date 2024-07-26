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
        Schema::create('anak', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orang_tua_id');
            $table->string('nama_lengkap');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('golongan_darah');
            $table->float('berat_lahir');
            $table->float('tinggi_lahir');
            $table->float('lingkar_kepala_lahir');
            $table->integer('anak_ke');
            $table->string('kondisi_kesehatan');
            $table->timestamps();

            $table->foreign('orang_tua_id')->references('id')->on('orang_tua')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anak');
    }
};
