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
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id('id_pengaduan');
            $table->unsignedBigInteger('id_tamu');
            $table->foreign('id_tamu')->references('id_tamu')->on('tamu_satgas')->onDelete('no action')->onUpdate('no action');
            $table->enum('peran_pelapor', ['saksi', 'korban']);
            $table->string('nama_penyintas', 100);
            $table->enum('jenis_kelamin', ['wanita', 'laki-laki']);
            $table->enum('status_pelapor', ['mahasiswa', 'pendidik', 'tenaga kependidikan', 'warga kampus', 'masyarakat umum']);
            $table->date('tanggal_pelaporan');
            $table->string('domisili_pelapor', 100);
            $table->enum('alasan_pengaduan', ['Saya seorang saksi yang khawatir dengan keadaan korban', 'Saya seorang korban yang memerlukan bantuan pemulihan',
            'Saya ingin perguruan tinggi menindak tegas terlapor', 'Saya ingin satuan satgas mendokumentasikan kejadiaanya', 
            'meningkatkan keamanan perguruan tinggi dari kekerasan seksual', 'memberikan perlindungan bagi saya']);
            $table->text('alasan_pengaduan_lainnya')->nullable();
            $table->string('bukti_gambar')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
