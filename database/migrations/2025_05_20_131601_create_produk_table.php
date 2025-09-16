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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('penjual_id')->unsigned();
            $table->foreign('penjual_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_produk');
            $table->string('harga');
            $table->integer('stok');
            $table->longtext('deskripsi');
            $table->string('gambar');
            $table->string('status')->default('ACTIVE');
            $table->unsignedBigInteger('promo_id')->nullable();
            $table->foreign('promo_id')->references('id')->on('promos')->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
