<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id('id_produk'); 
            $table->string('nama_produk');
            $table->text('deskripsi_produk')->nullable();
            $table->decimal('harga', 10, 2);
            $table->integer('stok')->default(0);
            $table->string('gambar_produk')->nullable(); 
            $table->string('nama_toko'); 
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('produk');
    }
};
