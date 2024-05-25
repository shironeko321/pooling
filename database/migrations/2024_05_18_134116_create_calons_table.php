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
        Schema::create('calons', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable();
            $table->unsignedBigInteger('ketua_id')->nullable();
            $table->foreign('ketua_id')->references('id')->on('mahasiswas');
            $table->unsignedBigInteger('wakil_ketua_id')->nullable();
            $table->foreign('wakil_ketua_id')->references('id')->on('mahasiswas');
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->tinyInteger('kotak_kosong')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calons');
    }
};
