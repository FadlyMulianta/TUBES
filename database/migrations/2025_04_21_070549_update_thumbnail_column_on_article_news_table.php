<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('article_news', function (Blueprint $table) {
            $table->string('thumbnail')
                ->default('thumbnails/gambar-0-alodokter.jpg')
                ->nullable()
                ->change();
        });
    }

    public function down(): void
    {
        Schema::table('article_news', function (Blueprint $table) {
            $table->string('thumbnail')->default('thumbnails/gambar-0-alodokter.jpg')->change();
        });
    }
};
