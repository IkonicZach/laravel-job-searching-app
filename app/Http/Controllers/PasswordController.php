<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordController extends Controller
{
    public function create()
    {
        return view('auth.forgot');
    }

    public function send(Request $request)
    {
        $request->validate([
            'email' => "required|email|exists:users",
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->input('email'),
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        Mail::send('emails.forgot-password', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Your Password | Skilltrack');
        });

        $message = "Email sent successfully!";
        return redirect()->route('password.forgot')->with(compact('message'));
    }

    public function resetPage($token)
    {
        return view('auth.reset-password', compact('token'));
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => "required|email|exists:users",
            'password' => "required|confirmed",
            'password_confirmation' => 'required',
        ]);

        $new_password = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token,
            ])->first();

        if (!$new_password) {
            return redirect()->route('password.reset', $request->token)->with('error', 'Resetting Failed');
        }

        User::where('email', $request->email)
            ->update(['password' => bcrypt($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        $message = "Password reset successfully";
        $messageBody = "Your password has been reset successfully! Please login.";

        return redirect()->route('user.login')->with(compact('message', 'messageBody'));
    }
}
