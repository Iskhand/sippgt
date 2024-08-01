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
        Schema::create('datalintings', function (Blueprint $table) {
            $table->id('id_linting')->autoIncrement();
            $table->string('nip', 20);
            $table->string('nama', 100);
            $table->integer('lt_merah')->default(0);
            $table->integer('lt_hitam')->default(0);
            $table->integer('lt_cokelat')->default(0);
            $table->integer('lt_jawas')->default(0);
            $table->integer('jumlah')->default(0);
            $table->date('tanggal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datalintings');
    }
};
