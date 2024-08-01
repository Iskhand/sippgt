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
        Schema::create('mandors', function (Blueprint $table) {
            $table->string('nim', 20)->primary();
            $table->string('nama_mandor', 50);
            $table->string('username', 50)->unique();
            $table->string('password');
            $table->enum('unit', ['Blok 1', 'Blok 2', 'Blok 3']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mandors');
    }
};
