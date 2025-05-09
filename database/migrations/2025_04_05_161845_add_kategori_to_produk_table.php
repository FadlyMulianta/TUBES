<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->enum('kategori', [
                'mustraizer',
                'fashwas',
                'serum',
                'sunscreen',
                'produk lainnya'
            ])->after('nama_toko');
        });
    }

    public function down(): void
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->dropColumn('kategori');
        });
    }
};
