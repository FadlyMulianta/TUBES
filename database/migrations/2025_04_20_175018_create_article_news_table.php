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
        Schema::create('article_news', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('content');
            $table->string('thumbnail')->default('thumbnails/gambar-0-alodokter.jpg')->nullable();
            $table->enum('is_featured',['featured','not_featured'])->default('featured');
            $table->foreignId('category_id')->constrained('category_articles')->cascadeOnDelete();
            // $table->string('slug')->unique();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_news');
    }
};
