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
        Schema::create('kampanye', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kampanye');
            $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade');
            $table->unsignedBigInteger('target');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kampanye');
    }
};
