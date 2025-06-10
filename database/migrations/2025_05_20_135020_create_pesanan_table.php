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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pembeli_id')->unsigned();
            $table->foreign('pembeli_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('alamat_id')->unsigned();
            $table->foreign('alamat_id')->references('id')->on('alamat')->onDelete('cascade')->onUpdate('cascade');
            $table->string('kode_pesanan');
            $table->string('total_harga');
            $table->date('tanggal_pesanan');
            $table->string('status_pesanan');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
