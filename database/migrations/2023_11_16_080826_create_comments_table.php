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
        Schema::create('comments', function (Blueprint $table) {
            $table->id('id_comment');
            $table->unsignedBigInteger('id_tamu');
            $table->unsignedBigInteger('id_publik');
            $table->text('isi_comment');
            $table->foreign('id_tamu')->references('id_tamu')->on('tamu_satgas')->onDelete('no action')->onUpdate('no action');
            $table->foreign('id_publik')->references('id_publik')->on('publik_curhats')->onDelete('no action')->onUpdate('no action');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
