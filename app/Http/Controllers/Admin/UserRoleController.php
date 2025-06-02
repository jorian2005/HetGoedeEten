<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserRoleController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'roles' => 'array',
            'roles.*' => 'exists:roles,name',
        ]);

        $user->syncRoles($request->roles ?? []);

        return redirect()->route('admin.users.index')->with('success', 'Rollen bijgewerkt.');
    }

    public function destroy(User $user)
    {
        $user->syncRoles([]);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User verwijderd.');
    }

}
