<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    public function reset()
    {
        return view('forgot_password');
    }

    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // Ellenőrizd, hogy az e-mailcím megtalálható-e a users táblában
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Az adott e-mailcím nem található a rendszerünkben.']);
        }

        $token = Str::random(60); // 60 karakter hosszú egyedi token

        // Az e-mailcím megtalálható, küldj e-mailt
        $details = [
            'title' => 'Mail from Laravel',
            'body' => 'This is for testing email using SMTP',
            'token' => $token,
        ];

        Mail::to($request->email)->send(new ResetPasswordMail($details));

        return redirect()->back()->with('success', 'Az email-t kiküldtük!');
    }

}
