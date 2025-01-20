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
            $table->unsignedBigInteger('parent_category_id')->nullable(); // Self-referencing parent category
            $table->string('slug')->unique(); // SEO-friendly slug
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('parent_category_id')->references('category_id')->on('categories')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
}
