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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('email')->unique();
            $table->foreignId('role_id')->constrained('roles', 'role_id')->cascadeOnDelete();
            $table->foreignId('company_id')->nullable()->constrained('companies', 'company_id')->nullOnDelete();
            $table->string('name');
            $table->string('phone_nr')->nullable();
            $table->string('employee_id')->unique()->nullable();
            $table->string('password');
            $table->timestamps();
        });
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_company_id_foreign');
        });
    }
};
