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
            $table->id('company_id'); 
            $table->string('name'); 
            $table->string('address')->nullable(); 
          //  $table->string('cvr')->unique(); 
            $table->string('cvr');
            $table->boolean('b2b')->default(false); 
            $table->boolean('b2c')->default(false); 
            $table->foreignId('type_id')->default(1)->constrained('company_types','type_id')->cascadeOnDelete();
            $table->boolean('is_company')->default(true); 
            $table->string('branch_code')->nullable(); 
            $table->string('slug'); 
            $table->timestamps();
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
