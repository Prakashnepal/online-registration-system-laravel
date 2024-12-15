<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function loginIndex()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login.index')->with('success', 'Account registered successfully!');
    }

    public function loginAction(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|exists:users,email',
                'password' => 'required|min:8',
            ], [
                'email.required' => 'Please enter your email address.',
                'email.email' => 'Please enter a valid email address.',
                'email.exists' => 'This email is not registered in our system.',
                'password.required' => 'Please enter your password.',
                'password.min' => 'Your password must be at least 8 characters long.',
            ]);


            // Define the maximum number of attempts and the lockout duration (in seconds)
            $maxAttempts = 5;
            $lockoutDuration = 300; // 5 minutes (300 seconds)
            $throttleKey = $this->throttleKey($request);

            // Check if the user is locked out
            if (RateLimiter::tooManyAttempts($throttleKey, $maxAttempts)) {
                $seconds = RateLimiter::availableIn($throttleKey);
                throw ValidationException::withMessages([
                    'email' => trans('auth.throttle', ['seconds' => $seconds]),
                ]);
            }

            // Attempt to authenticate
            if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
                // Increment the failed login attempts counter
                RateLimiter::hit($throttleKey, $lockoutDuration);

                throw ValidationException::withMessages([
                    'email' => trans('auth.failed')
                ]);
            }

            // Clear login attempts and regenerate session upon successful login
            RateLimiter::clear($throttleKey);
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        } catch (\Exception $e) {
            Log::error('Login error: ' . $e->getMessage());
            throw $e;
        }
    }



    protected function throttleKey(Request $request)
    {
        return strtolower($request->input('email')) . '|' . $request->ip();
    }
}
