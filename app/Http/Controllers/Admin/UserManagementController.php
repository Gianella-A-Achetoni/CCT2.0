<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->with('roles:id,name')
            ->orderBy('name')
            ->get();

        return view('admin.users', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
            'role' => ['required', Rule::in(['admin', 'teacher', 'student'])],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        $user->assignRole($validated['role']);

        return back()->with('status', 'Usuario creado correctamente.');
    }

    public function destroy(Request $request, User $user)
    {
        if ((int) $request->user()->id === (int) $user->id) {
            return back()->withErrors(['user' => 'No puedes eliminar tu propio usuario.']);
        }

        $user->delete();

        return back()->with('status', 'Usuario eliminado.');
    }
}
