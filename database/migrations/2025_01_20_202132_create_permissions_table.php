<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id('permission_id'); // Primary key
            $table->boolean('can_create_offer')->default(false);
            $table->boolean('can_delete_offer')->default(false);
            $table->boolean('can_edit_offer')->default(false);
            $table->boolean('can_see_offer')->default(false);
            $table->boolean('can_buy_offers')->default(false);
            $table->boolean('can_delete_user')->default(false);
            $table->boolean('can_invite_user')->default(false);
            $table->boolean('can_leave_company')->default(false);
            $table->boolean('can_delete_company_member')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
}
