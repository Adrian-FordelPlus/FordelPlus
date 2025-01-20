<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyOfferTable extends Migration
{
    public function up(): void
    {
        Schema::create('company_offer', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('company_id'); // Foreign key to companies
            $table->unsignedBigInteger('offer_id'); // Foreign key to offers
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
            $table->foreign('offer_id')->references('offer_id')->on('offers')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_offer');
    }
}
