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
        Schema::create('manajemen_produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->integer('harga_sewa');
            $table->string('deskripsi_barang');
            $table->string('Ringkasan');
            $table->string('gambar');
            $table->string('status')->default('in stock');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manajemenproduks');
    }
};
