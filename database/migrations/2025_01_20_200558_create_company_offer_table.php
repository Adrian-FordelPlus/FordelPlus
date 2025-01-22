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
            $table->timestamps();
            $table->foreignId('company_id')->cascadeOnDelete();
            $table->foreignId('offer_id')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_offer');
    }
}
