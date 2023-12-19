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
        Schema::create('data_anggaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kelompok_anggaran')->nullable();
            $table->integer('Anggaran');
            $table->date('Tanggal');
            $table->enum('Jenis', ['Pemasukan', 'Pengeluaran']);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_kelompok_anggaran')-> references('id')->on('kelompok_anggaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_anggaran');
    }
};
