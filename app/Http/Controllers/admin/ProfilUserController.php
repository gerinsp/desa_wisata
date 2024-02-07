<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfilUserController extends Controller
{
    public function index()
    {
        return view('admin.profil-user', [
            'title' => 'Profile',
            'active' => ''
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'username' => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'required|min:8',
            'role_id' => 'required'
        ]);

        if ($request->password === $user->password) {
            unset($validatedData['password']);
        } else {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }
        User::where('id', $id)->update($validatedData);

        return redirect('/admin/profil-user')->with('success', 'Profile berhasil di update.');
    }
}
