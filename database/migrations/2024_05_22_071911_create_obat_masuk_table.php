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
        Schema::create('obat_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_obat');
            $table->date('tanggal_masuk');
            $table->string('kategori_obat');
            $table->string('satuan');
            $table->string('sisa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat_masuk');
    }
};
