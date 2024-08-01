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
        Schema::create('targetharians', function (Blueprint $table) {
            $table->id();
            $table->string('nama_blok', 10);
            $table->integer('tr_merah')->default(0);
            $table->integer('tr_hitam')->default(0);
            $table->integer('tr_cokelat')->default(0);
            $table->integer('tr_jawas')->default(0);
            $table->integer('tr_jumlah')->default(0);
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('targetharians');
    }
};
