<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    public function getRoles()
    {
        return Role::with('permissions')->get();
    }
    
    public function getPermissions()
    {
        return Permission::all();
    }
    
}
