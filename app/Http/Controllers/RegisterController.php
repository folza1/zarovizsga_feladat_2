<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        // Validáció adatai
        $attributes = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'country' => 'required', // Assumed country is stored as a numeric ID
            'city' => 'required',
            'telefonszam' => 'required|numeric',
            'born' => 'required|date',
            'password' => 'required|string|min:8|max:64|confirmed',
            'gender' => 'required|string|in:male,female,other',
            'felhasznalasi' => 'required|boolean',
        ]);

        $attributes['password'] = Hash::make($request->input('password'));

        $user=User::create($attributes);
        $token = $user->createToken('registration-token')->plainTextToken;
        return redirect('/login')->with('success', 'A fiókod sikeresen létrehozva!');
    }
}
