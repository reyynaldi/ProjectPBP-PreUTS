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
        Schema::create('ruang', function (Blueprint $table) {
            $table->string('kode_ruang')->primary();
            $table->string('kode_fakultas');
            $table->integer('kapasitas');
            $table->enum('status_ketersediaan', ['Tersedia', 'Penuh'])->default('Tersedia');
            $table->foreign('kode_fakultas')->references('kode_fakultas')->on('fakultas')->onDelete('cascade');;
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('ruang');
    }
};
