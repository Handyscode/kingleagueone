<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $validated['password'] = Hash::make($request->get('password'));
        $validated['role'] = 'user';
        User::create($validated);
        return redirect('/login')->with('success', 'Register Success');
    }
}
