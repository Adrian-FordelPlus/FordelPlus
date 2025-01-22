<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesPermissionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('roles_permissions', function (Blueprint $table) {
            $table->id(); 
            $table->timestamps();
            $table->foreignId('role_id')->cascadeOnDelete();
            $table->foreignId('permission_id')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('roles_permissions');
    }
}
