<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('data_user.index', [
            'users' => User::all(),
        ]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'roles' => 'required|in:kabag,apoteker'
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->roles
            ]);

            return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
        }

        return view('data_user.create');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->isMethod('POST')) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'password' => 'nullable|string|min:8|confirmed',
                'roles' => 'required|in:kabag,apoteker'
            ]);

            $userData = [
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->roles
            ];

            if ($request->filled('password')) {
                $userData['password'] = Hash::make($request->password);
            }

            $user->update($userData);

            return redirect()->route('user.index')->with('success', 'User berhasil diperbarui');
        }

        return view('data_user.edit', [
            'user' => $user
        ]);
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }
}
