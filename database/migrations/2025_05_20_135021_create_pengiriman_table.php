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
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pesanan_id')->unsigned();
            $table->foreign('pesanan_id')->references('id')->on('pesanan')->onDelete('cascade')->onUpdate('cascade');
            $table->string('metode_pengiriman');
            $table->date('tanggal_pengiriman');
            $table->date('tanggal_diterima')->nullable();
            $table->string('status_pengiriman');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengiriman');
    }
};
