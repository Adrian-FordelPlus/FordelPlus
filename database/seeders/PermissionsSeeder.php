<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        Permission::create([
            'can_create_offer' => true,
            'can_delete_offer' => true,
            'can_edit_offer' => true,
            'can_see_offer' => true,
            'can_buy_offers' => false,
            'can_delete_user' => false,
            'can_invite_user' => false,
            'can_leave_company' => false,
            'can_delete_company_member' => false,
        ]);

        Permission::create([
            'can_create_offer' => false,
            'can_delete_offer' => false,
            'can_edit_offer' => false,
            'can_see_offer' => true,
            'can_buy_offers' => true,
            'can_delete_user' => false,
            'can_invite_user' => false,
            'can_leave_company' => true,
            'can_delete_company_member' => false,
        ]);
    }
}
