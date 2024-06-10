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
        Schema::create('CatalogItem', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('judul_buku')->nullable()->index();
            $table->string('gambar_buku', 45)->nullable();
            $table->string('desc_buku')->nullable();
            $table->integer('harga');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
