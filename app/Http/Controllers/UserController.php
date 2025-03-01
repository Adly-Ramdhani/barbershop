<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('users.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'phone_number' => 'required|string|max:15|unique:users,phone_number',
                'role' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
            ]);

            User::create([
                'name' => $validated['name'],
                'phone_number' => $validated['phone_number'],
                'role' => $validated['role'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            return to_route('users.index')->with('success', 'User berhasil dibuat.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage())->withInput();
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try {
            $validated = $request->validate([
                'name'  => 'string|max:255',
                'phone_number' => 'numeric|digits_between:10,15',
                'email' => 'string|email|max:255|unique:users,email,' . $user->id,
                'password' => 'nullable|string|min:8|confirmed',
            ]);
        
            // Jika password diisi, enkripsi dan tambahkan ke data yang akan diupdate
            if ($request->filled('password')) {
                $validated['password'] = Hash::make($request->password);
            } else {
                unset($validated['password']); // Hilangkan password jika kosong
            }
        
            // Update data user
            $user->update($validated);
        
            return to_route('users.index')->with('success', 'User berhasil diupdate.');
        } catch (Exception $e) {
            return to_route('users.index')->with('error', 'Terjadi kesalahan saat mengupdate data: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return to_route('users.index')->with('success', 'User berhasil dihapus.');
        } catch (\Exception $e) {
            return to_route('users.index')->with('error', 'Gagal menghapus user: ' . $e->getMessage());
        }
    }
}
