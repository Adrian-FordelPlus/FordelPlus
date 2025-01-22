<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    public function up(): void
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id('offer_id'); // Primary key
            $table->string('offer_code')->unique(); // Unique code
            $table->string('offer_link'); // Offer link
            $table->text('description')->nullable(); // Description
            $table->string('image_link')->nullable(); // Image URL
            $table->integer('quantity')->default(0); // Quantity available
            $table->date('expiration_date')->nullable(); // Expiration date
            $table->string('slug')->unique(); // SEO-friendly slug
            $table->timestamps();
            $table->foreignId('company_id')->cascadeOnDelete();
            $table->foreignId('category_id')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
}
