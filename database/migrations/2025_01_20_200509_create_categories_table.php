<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id('category_id'); // Primary key
            $table->string('name')->unique(); // Category name
            $table->string('slug')->unique(); // SEO-friendly slug
            $table->timestamps();
            $table->foreignId('parent_category_id')->nullable()->references('category_id')->constrained('categories')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
}
