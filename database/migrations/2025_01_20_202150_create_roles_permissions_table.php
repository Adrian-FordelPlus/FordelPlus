<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesPermissionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('roles_permissions', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('role_id'); // Foreign key to roles
            $table->unsignedBigInteger('permission_id'); // Foreign key to permissions
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('role_id')->references('role_id')->on('roles')->onDelete('cascade');
            $table->foreign('permission_id')->references('permission_id')->on('permissions')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('roles_permissions');
    }
}
