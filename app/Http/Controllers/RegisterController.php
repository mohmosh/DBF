<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // User registration
    public function register(Request $request)
{
    try {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'fitness_goal' => 'nullable|string|max:255',
            'preferences' => 'nullable|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'fitness_goal' => $request->fitness_goal,
            'preferences' => $request->preferences,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['user' => $user, 'message' => 'Registration successful. Please log in.'], 201);

    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


}




