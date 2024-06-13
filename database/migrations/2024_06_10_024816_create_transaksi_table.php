<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id(); // This will create an auto-incrementing primary key named 'id'
            $table->string('id_transaksi')->unique(); // Unique transaction ID
            $table->string('name_user');
            $table->string('judul_buku');
            $table->string('gambar_buku');
            $table->timestamps(); // This will create 'created_at' and 'updated_at' columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
