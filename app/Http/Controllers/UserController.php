<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created user in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'role_id' => 'required|exists:roles,id',
            'name' => 'required|string|max:255',
            'phone_nr' => 'nullable|string|max:20',
            'employee_id' => 'nullable|string|max:50|unique:users,employee_id',
            'password' => 'required|min:8',
            'company_id' => 'nullable|exists:companies,id',
        ]);

        $user = User::create(array_merge($validated, [
            'password' => bcrypt($validated['password']),
        ]));

        return response()->json($user, 201);
    }

    /**
     * Display the specified user.
     */
    public function show(User $user)
    {
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified user in the database.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'role_id' => 'sometimes|exists:roles,id',
            'name' => 'sometimes|string|max:255',
            'phone_nr' => 'nullable|string|max:20',
            'employee_id' => 'nullable|string|max:50|unique:users,employee_id,' . $user->id,
            'password' => 'sometimes|min:8',
            'company_id' => 'nullable|exists:companies,id',
        ]);

        $user->update(array_merge($validated, [
            'password' => isset($validated['password']) ? bcrypt($validated['password']) : $user->password,
        ]));

        return response()->json($user);
    }

    /**
     * Remove the specified user from the database.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }
}
