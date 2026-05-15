<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\OtpNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Show the registration form.
     */
    public function showRegister()
    {
        $timezoneIdentifiers = \DateTimeZone::listIdentifiers();
        $timezones = array_map(fn($tz) => ['id' => $tz, 'name' => $tz], $timezoneIdentifiers);

        return view('auth.register', compact('timezones'));
    }

    /**
     * Handle a registration request.
     */
    public function register(Request $request)
    {
        \Log::info('Register: Start');
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone_number' => ['required', 'string', 'max:20'],
            'country' => ['required', 'string'],
            'city' => ['required', 'string'],
            'timezone' => ['required', 'string'],
        ]);
        \Log::info('Register: Validation Passed');

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'country' => $request->country,
            'city' => $request->city,
            'timezone' => $request->timezone,
        ]);
        \Log::info('Register: User Created');

        $otp = $user->generateOtp();
        \Log::info('Register: OTP Generated');
        
        $user->notify(new OtpNotification($otp));
        \Log::info('Register: Notification Queued');

        session(['verify_user_id' => $user->id]);
        \Log::info('Register: Session Set');

        return redirect()->route('verification.notice');
    }

    /**
     * Show the OTP verification form.
     */
    public function showVerifyOtp()
    {
        // If user is logged in but not verified, use their ID
        if (Auth::check() && !Auth::user()->hasVerifiedEmail()) {
            session(['verify_user_id' => Auth::id()]);
        }

        if (!session('verify_user_id')) {
            return redirect()->route('register');
        }

        return view('auth.verify-otp');
    }

    /**
     * Handle an OTP verification request.
     */
    public function verifyOtp(Request $request)
    {
        // Rate limit: 5 attempts per minute per IP
        if (\RateLimiter::tooManyAttempts('verify-otp:'.$request->ip(), 5)) {
            $seconds = \RateLimiter::availableIn('verify-otp:'.$request->ip());
            return back()->withErrors(['otp' => "Too many attempts. Please try again in {$seconds} seconds."]);
        }

        $request->validate([
            'otp' => ['required', 'array', 'size:6'],
            'otp.*' => ['required', 'numeric', 'digits:1'],
        ]);

        $otp = implode('', $request->otp);
        $userId = session('verify_user_id');

        if (!$userId) {
            return redirect()->route('register');
        }

        $user = User::findOrFail($userId);

        if ($user->verifyOtp($otp)) {
            \RateLimiter::clear('verify-otp:'.$request->ip());
            // Re-fetch the user to ensure we have the absolute latest DB state
            $freshUser = User::find($user->id);
            
            Auth::login($freshUser, true);
            $request->session()->regenerate();
            session()->forget('verify_user_id');
            
            return redirect()->intended(route('dashboard'));
        }

        \RateLimiter::hit('verify-otp:'.$request->ip());
        return back()->withErrors(['otp' => 'The provided code is invalid or has expired.']);
    }

    /**
     * Resend the OTP verification code.
     */
    public function resendOtp(Request $request)
    {
        // Rate limit resending: 3 times per 5 minutes per IP
        if (\RateLimiter::tooManyAttempts('resend-otp:'.$request->ip(), 3)) {
            $seconds = \RateLimiter::availableIn('resend-otp:'.$request->ip());
            return back()->withErrors(['otp' => "Please wait {$seconds} seconds before requesting a new code."]);
        }

        $userId = session('verify_user_id');

        if (!$userId) {
            return redirect()->route('register');
        }

        $user = User::findOrFail($userId);
        $otp = $user->generateOtp();
        $user->notify(new OtpNotification($otp));

        \RateLimiter::hit('resend-otp:'.$request->ip(), 300); // 5 minute lockout

        return back()->with('status', 'A new verification code has been sent to your email.');
    }

    /**
     * Destroy an authenticated session.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
