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
        Schema::create('privat_curhat', function (Blueprint $table) {
            $table->id('id_privat');
            $table->unsignedBigInteger('id_tamu')->nullable();
            $table->unsignedBigInteger('id_admin')->nullable();
            $table->text('isi_pesan');
            
            $table->foreign('id_tamu')->references('id_tamu')->on('tamu_satgas')->onDelete('no action')->onUpdate('no action');
            $table->foreign('id_admin')->references('id_admin')->on('admin_satgas')->onDelete('no action')->onUpdate('no action');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('privat_curhat');
    }
};
