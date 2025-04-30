<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use Hash;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\ForgotPasswordMail;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data['meta_title'] = 'Login Page';
        return view('auth.login', $data);
    }

    public function login_post(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            if (Auth::User()->is_role == '1') {
                if (!Auth::User()->welcome_email_sent) {
                    Mail::to(Auth::User()->email)->queue(new WelcomeEmail(Auth::User()));
                    Auth::User()->update(['welcome_email_sent' => true]);
                }
                return redirect('admin/dashboard'); // Kept original redirect
            } else {
                Auth::logout(); // Log out non-admin users
                return redirect('/')->with('error', 'Admin Not Found');
            }
        } else {
            return redirect()->back()->with('error', 'Please Enter Correct Credentials');
        }
    }

    public function register(Request $request)
    {
        $data['meta_title'] = 'Register Page';
        return view('auth.register', $data);
    }

    public function register_post(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => trim($request->name),
            'email' => trim($request->email),
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(50),
        ]);

        Mail::to($user->email)->queue(new WelcomeEmail($user));

        return redirect('/')->with('success', 'Registration Successfully.');
    }

    public function forgot_password(Request $request)
    {
        $data['meta_title'] = 'Forgot Password Page';
        return view('auth.forgot_password', $data);
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $token, 'created_at' => Carbon::now()]
        );

        $resetLink = url('/reset-password/' . $token . '?email=' . urlencode($request->email));

        // Displaying the reset link instead of sending email
        return back()->with('success', 'Password reset link generated: <a href="' . $resetLink . '">' . $resetLink . '</a>');
    }

    public function showResetForm($token, Request $request)
    {
        return view('auth.reset_password', [
            'token' => $token,
            'email' => $request->query('email')
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:6',
            'token' => 'required'
        ]);

        $check = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if (!$check || Carbon::parse($check->created_at)->addHours(1)->isPast()) {
            return back()->with('error', 'Invalid or expired token.');
        }

        User::where('email', $request->email)->update([
            'password' => Hash::make($request->password)
        ]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect('/login')->with('success', 'Password changed successfully.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url('/'));
    }
}