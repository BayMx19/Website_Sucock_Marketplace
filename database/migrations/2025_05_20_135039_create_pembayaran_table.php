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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pesanan_id');
            $table->foreign('pesanan_id')->references('id')->on('pesanan')->onDelete('cascade')->onUpdate('cascade');
            $table->string('metode_pembayaran');
            $table->date('tanggal_pembayaran');
            $table->string('status_pembayaran');
            $table->timestamps();
        });
        Schema::table('pembayaran', function (Blueprint $table){
            $table->foreign('pesanan_id')->references('id')->on('pesanan')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
