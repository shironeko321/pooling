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
        Schema::create('pilihans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id')->unique();
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas');
            $table->unsignedBigInteger('calon_id');
            $table->foreign('calon_id')->references('id')->on('calons');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilihans');
    }
};
