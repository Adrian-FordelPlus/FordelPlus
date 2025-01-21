<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $primaryKey = 'permission_id';

    protected $fillable = [
        'can_create_offer',
        'can_delete_offer',
        'can_edit_offer',
        'can_see_offer',
        'can_buy_offers',
        'can_delete_user',
        'can_invite_user',
        'can_leave_company',
        'can_delete_company_member',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_permissions', 'permission_id', 'role_id');
    }
}
