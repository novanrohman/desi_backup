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
        Schema::create('publik_curhats', function (Blueprint $table) {
            $table->id('id_publik');
            $table->unsignedBigInteger('id_tamu');
            $table->foreign('id_tamu')->references('id_tamu')->on('tamu_satgas')->onDelete('no action')->onUpdate('no action');
            $table->string('judul_curhat', 100);
            $table->text('isi_curhat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publik_curhats');
    }
};
