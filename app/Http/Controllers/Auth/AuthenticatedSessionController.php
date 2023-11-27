<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Authenticate the user using the provided credentials
        $request->authenticate();

        // Check if the user is authenticated
        if (auth()->check()) {
            // Regenerate the session ID to prevent session fixation attacks
            $request->session()->regenerate();

            // Redirect the user to their intended route after login
            return redirect()->intended(route(auth()->user()->getRedirectRoute()));
        }

        // If authentication fails, handle accordingly (e.g., redirect back to login page)
        return redirect()->route('login')->with('error', 'Invalid credentials');
    }



    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
