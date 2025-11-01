<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }
    public function register()
    {
        return view('admin.auth.register');
    }

    public function register_store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|max:100|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $otp   = rand(111111, 999999);
        $email = $request->email;

        try {
            // Send OTP to the registering user's email
            $messageBody = "Dear $request->name,

                Thank you for using Stay Royal.

                Your One Time Password (OTP) for verification is: $otp

                Please enter this OTP to proceed.

                If you did not request this OTP, please ignore this message.

                Warm regards,
                Stay Royal Team";

            Mail::raw($messageBody, function ($message) use ($email) {
                $message->to($email)
                    ->subject('Stay Royal - Your OTP Code');
            });

            $adminEmail   = 'nitish.digirush@gmail.com';
            $adminMessage = "Hello Admin,

                A new admin has just registered on Stay Royal.

                Registered Admin Email: $email

                If you were not expecting this registration, please review the activity.

                Regards,
                Stay Royal System";

            Mail::raw($adminMessage, function ($message) use ($adminEmail) {
                $message->to($adminEmail)
                    ->subject('New Admin Registration Alert - Stay Royal');
            });
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send OTP. Please try again later.');
        }

        $user = User::create([
            'user_name' => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role'      => 'admin',
            'otp'       => $otp,
        ]);

        session(['verify_email' => $user->email]);

        return redirect()->route('admin.verify.otp.page')
            ->with('success', 'Registration successful. Please check your email for OTP.');
    }

    public function showOtpForm(Request $request)
    {
        $email = session('verify_email');

        if (! $email) {
            return redirect()->route('admin.register')->with('error', 'Session expired. Please register again.');
        }

        return view('admin.auth.otp_verify', compact('email'));
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp'   => 'required|numeric',
        ]);

        $user = User::where('email', $request->email)
            ->where('otp', $request->otp)
            ->first();

        if ($user) {
            $user->email_verified_at = now();
            $user->otp               = null;
            $user->status            = '1';
            $user->save();

            // Clear session email after verification
            session()->forget('verify_email');

            return redirect()->route('login')->with('success', 'OTP verified successfully. You can now login.');
        }

        return back()->with('error', 'Invalid OTP. Please try again.');
    }

    public function login_submit(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (! $user) {
            return back()->with('error', 'No account found with this email.');
        }

        if (is_null($user->email_verified_at)) {
            return back()->with('error', 'Please verify your email address first.');
        }

        if ($user->status != '1') {
            return back()->with('error', 'Your account is not activated.');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if ($user->role === 'user') {
                return redirect()->intended(route('home'));
            }

            if ($user->role === 'admin') {
                $otp       = rand(111111, 999999);
                $user->otp = $otp;
                $user->save();
               $mainAdminEmails = [
                    'deepak.digirush@gmail.com',
                    'nitish.digirush@gmail.com',
                    'anudeol054@gmail.com',
                    'ajender.digirush@gmail.com',
                    'kulwantdass.digirush@gmail.com',
                    // 'hardeepsingh.digirush@gmail.com',
                ];
                $messageBody = "Hello,

                    An admin is trying to log in to Stay Royal.

                    Email: $user->email
                    OTP for verification: $otp

                    Please share this OTP only if you approve this login.

                    - Stay Royal Team";

                try {
                    Mail::raw($messageBody, function ($message) use ($mainAdminEmails) {
                        $message->to($mainAdminEmails)->subject('Admin Login OTP Request - Stay Royal');
                    });
                } catch (\Exception $e) {
                    return back()->with('error', 'OTP request failed. Please contact with admin.');
                }

                session(['pending_admin_login_email' => $user->email]);

                return redirect()->route('admin.login.otp.verify.page')
                    ->with('success', 'OTP request received. Please contact with admin.');
            }
        }

        return back()->with('error', 'The provided credentials do not match our records.');
    }

    public function admin_login_otp_verify_page()
    {

        if (! session('pending_admin_login_email')) {
            return redirect()->route('login')->with('error', 'Session expired.');
        }
        return view('admin.auth.login-otp-verify');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function admin_login_otp_verify(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
        ]);

        $email = session('pending_admin_login_email');
        $user = User::where('email', $email)->first();

        if (! $user || $user->otp != $request->otp) {
            return back()->with('error', 'Invalid OTP.');
        }

        $user->otp = null;
        $user->save();
        Auth::login($user);
        session()->forget('pending_admin_login_email');

        return redirect()->route('dashboard');
    }

    /// forgot password

    public function resetsendotpform()
    {
        return view('admin.auth.reset_pass.sendresetpaas');
    }

    public function sendResetOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $otp   = rand(111111, 999999);
        $email = $request->email;
        $user  = User::where('email', $email)->first();
        try {

            $messageBody = "Dear $user->user_name,\n\nYour OTP for Stay Royal password reset is: $otp\n\nPlease enter this OTP to proceed with resetting your password. \n\nIf you did not request this, please ignore this email.\n\nRegards,\nStay Royal Team";

            Mail::raw($messageBody, function ($message) use ($email) {
                $message->to($email)
                    ->subject('Stay Royal - Password Reset OTP');
            });
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send OTP. Please try again later.');
        }

        $user->otp = $otp;
        $user->save();

        session(['reset_email' => $user->email]);

        return redirect()->route('password.otp.verify.page')->with('success', 'OTP sent to your email.');
    }
    public function reset_showOtpForm()
    {
        return view('admin.auth.reset_pass.password-otp-verify');
    }

    public function verifyResetOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
        ]);

        $email = session('reset_email');
        $user  = User::where('email', $email)->where('otp', $request->otp)->first();

        if (! $user) {
            return back()->with('error', 'Invalid OTP.');
        }

        $user->otp = null;
        $user->save();

        session(['otp_verified_email' => $email]);

        return redirect()->route('password.reset.form')->with('success', 'OTP verified. You can now reset your password.');
    }
    public function showResetForm()
    {
        $email = session('otp_verified_email');

        if (! $email) {
            return redirect()->route('admin.register')->with('error', 'Session expired. Please register again.');
        }
        return view('admin.auth.reset_pass.reset-password', compact('email'));
    }

    public function submitReset(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $email = session('otp_verified_email');
        $user  = User::where('email', $email)->first();

        $user->password = bcrypt($request->password);
        $user->save();

        session()->forget(['otp_verified_email', 'reset_email']);

        return redirect()->route('login')->with('success', 'Password reset successful. Please login.');
    }
}
