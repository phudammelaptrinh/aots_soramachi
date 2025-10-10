<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    // Danh sách
    public function index()
    {
        Gate::authorize('view-users');

        $users = User::latest('id')->get();
        return view('users.index', compact('users'));
    }

    // Form tạo user
    public function create()
    {
        Gate::authorize('create-user');

        return view('users.create');
    }

    // Lưu user mới
    public function store(Request $request)
    {
        Gate::authorize('create-user');

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'nullable|string',
        ]);

        // Admin chỉ được tạo user role = user
        if (auth()->user()->role === 'admin') {
            $data['role'] = 'user';
        } else {
            $data['role'] = $data['role'] ?? 'user';
        }

        $data['password'] = Hash::make($request->password);

        User::create($data);
        return redirect()->route('users.index')->with('ok', 'User created successfully!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        Gate::authorize('edit-user', $user);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        Gate::authorize('edit-user', $user);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,$id",
            'password' => 'nullable|string|min:6',
            'role' => 'nullable|string',
        ]);

        
        if (auth()->user()->role === 'admin') {
            $data['role'] = 'user';
        } else {
            $data['role'] = $data['role'] ?? $user->role;
        }

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']); 
        }

        $user->update($data);
        return redirect()->route('users.index')->with('ok', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        Gate::authorize('delete-user');

        $user->delete();
        return redirect()->route('users.index')->with('ok', 'User deleted successfully!');
    }
}
