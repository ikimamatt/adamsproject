<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('jumbotrons', function (Blueprint $table) {
        $table->id();
        $table->string('text_left'); // Untuk teks di kiri
        $table->string('text_right'); // Untuk teks di kanan
        $table->string('background_image'); // Untuk gambar latar belakang
        $table->string('profile_image'); // Untuk gambar profil
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jumbotrons');
    }
};
