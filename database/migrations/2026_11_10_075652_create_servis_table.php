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
        Schema::create('servis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_servis')->unique();
            $table->string('nama_pelanggan');
            $table->string('no_hp');
            $table->string('nama_barang');
            $table->text('kerusakan');
            $table->enum('status', ['Menunggu', 'Sedang Dikerjakan', 'Selesai', 'Diambil'])->default('Menunggu');
            $table->integer('biaya')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servis');
    }
};
