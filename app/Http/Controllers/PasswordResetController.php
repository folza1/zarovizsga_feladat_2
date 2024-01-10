<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PasswordResetController extends Controller
{
    public function reset()
    {
        return view('forgot_password');
    }

    public function send(Request $request)
    {
        // Ellenőrizd, hogy a ResetPasswordMail-nek megfelelő konstruktorparamétere van-e
        $details = [
            'title' => 'Mail from Laravel',
            'body' => 'This is for testing email using SMTP',
        ];

        Mail::to($request->email)->send(new ResetPasswordMail($details));

        return redirect()->back()->with('success', 'Az email-t kiküldtük!');
    }

}
