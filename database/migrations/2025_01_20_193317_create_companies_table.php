<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id('company_id'); // Primary key
            $table->string('name'); // Company name
            $table->string('address')->nullable(); // Address
          //  $table->string('cvr')->unique(); // Unique company registration number
            $table->string('cvr');
            $table->boolean('b2b')->default(false); // Business-to-business flag
            $table->boolean('b2c')->default(false); // Business-to-consumer flag
            // $table->unsignedBigInteger('type_id'); // Foreign key for company type
            $table->boolean('is_company')->default(true); // Whether it’s a company or not
            $table->string('branch_code')->nullable(); // Branch code
            $table->string('slug'); // SEO-friendly identifier
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('type_id')->references('id')->on('company_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
}
