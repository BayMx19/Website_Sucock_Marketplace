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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nohp', 13)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role');
            $table->text('alamat')->nullable();
            $table->text('provinsi')->nullable();
            $table->text('kota')->nullable();
            $table->text('kecamatan')->nullable();
            $table->text('kelurahan')->nullable();
            $table->text('RT', 3)->nullable();
            $table->text('RW', 3)->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('foto_profil')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('status')->default('ACTIVE')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
