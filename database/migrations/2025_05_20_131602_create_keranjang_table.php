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
        Schema::create('keranjang', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('produk_id')->unsigned();
            $table->foreign('produk_id')->references('id')->on('produk')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('pembeli_id')->unsigned();
            $table->foreign('pembeli_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('amount');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjang');
    }
};
