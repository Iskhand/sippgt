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
        Schema::create('pekerjas', function (Blueprint $table) {
            $table->string('nip', 20)->primary();
            $table->string('nik', 16)->unique();
            $table->string('nama', 100);
            $table->string('telp', 12);
            $table->string('alamat', 255);
            $table->string('kel_desa', 100);
            $table->string('kec', 100);
            $table->string('kab_kota', 100);
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->date('masuk');
            $table->enum('kategori', ['BLOK 1', 'BLOK 2', 'BLOK 3']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjas');
    }
};
